<?php

namespace App\Http\Controllers\Backend\Tables;

use App\Http\Controllers\Controller;
use App\Model\Concentrations;
use App\Utilize\Helper;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;

class ConcentrationController extends Controller
{

    protected $modelConcentration;
    protected $helper;

    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->modelConcentration = new Concentrations();
        $this->helper = new Helper();
    }

    public function index()
    {
        Log::info("Me!!");
        if (Auth::guest()) {
            return redirect()->intended(route('admin.login'));
        } else {
            return view('admin.tables.concentration.index');
        }
    }

    public function indexAll() {
        $concentrations = $this->modelConcentration->getAllConcentrations();
        $returnHTML = view('custom.widget.selectoption_concentration')->with(compact('concentrations'))->render();
        $response_array = ([
            'success' => true,
            'html'      => $returnHTML
        ]);
        echo json_encode($response_array);
    }

    public function concentrationDataTables()
    {
        $concentrations = $this->modelConcentration->getAllConcentrations();
        $collections = collect();
        foreach ($concentrations as $concentration) {
            $arr = array(
                'id' => $concentration->id,
                'name' => $concentration->name,
                'description' => $concentration->description,
                'detail' => $concentration->detail,
                'link' => $concentration->link,
                'manipulation' => $concentration->id
            );
            $collections->push($arr);
        }
        return Datatables::collection($collections)->make();
    }

    public function getInfoConcentrationFromDB(Request $request)
    {
        $name = $request->name;
        $description = $request->description;
        $detail = $request->detail;
        $link = $request->link;
        if (empty($request->id)) {
            $data = array([
                'name' => $name,
                'description' => $description,
                'detail' => $detail,
                'link' => $link
            ]);
        } else {
            $data = array([
                'id' => $request->id,
                'name' => $name,
                'description' => $description,
                'detail' => $detail,
                'link' => $link
            ]);
        }
        return $data;
    }

    public function store(Request $request)
    {
        if ($this->helper->validateConcentrationName($request)) {
            $response_array = ([
                'message' => [
                    'status' => "invalid",
                    'description' => "Tên nồng độ không được bỏ trống!"
                ]
            ]);
        } else {
            if ($this->modelConcentration->isExistConcentration($request)) {
                $response_array = ([
                    'message' => [
                        'status' => "existed",
                        'description' => "Tên nồng độ đã tồn tại trong hệ thống!"
                    ]
                ]);
            } else {
                if ($this->modelConcentration->addAll($this->getInfoConcentrationFromDB($request)) > 0) {
                    $response_array = ([
                        'concentration' => $this->modelConcentration->getConcentrationByName($request->name),
                        'message' => [
                            'status' => "success",
                            'description' => "Thêm nồng độ thành công!"
                        ]
                    ]);
                } else {
                    $response_array = ([
                        'message' => [
                            'status' => "error",
                            'description' => "Thêm nồng độ thất bại!"
                        ]
                    ]);
                }
            }
        }
        echo json_encode($response_array);
    }

    public function show($id)
    {
        if ($this->modelConcentration->getConcentration($id) != null) {
            $concentration = $this->modelConcentration->getConcentration($id);
            return json_encode(['concentration' => $concentration]);
        } else {
            alert()->error('Tên nồng độ đã không tồn tại trong hệ thống.', 'Lỗi!');
            return redirect()->intended(route('admin.perfume.concentration.index'));
        }
    }

    public function update(Request $request)
    {
        if ($this->helper->validateConcentrationName($request)) {
            $response_array = ([
                'message' => [
                    'status' => "invalid",
                    'description' => "Tên nồng độ không được bỏ trống!"
                ]
            ]);
        } else {
            if ($this->modelConcentration->isExistNameCaseUpdated($request, $request->name)) {
                $response_array = ([
                    'message' => [
                        'status' => "invalid",
                        'description' => "Nồng độ đã tồn tại trong hệ thống!"
                    ]
                ]);
            } else {
                if ($this->modelConcentration->updateConcentration($this->getInfoConcentrationFromDB($request)) >= 0) {
                    $response_array = ([
                        'concentration' => $this->modelConcentration->getConcentrationByName($request->name),
                        'message' => [
                            'status' => "success",
                            'description' => "Cập nhật nồng độ thành công!"
                        ]
                    ]);
                } else {
                    $response_array = ([
                        'message' => [
                            'status' => "error",
                            'description' => "Cập nhật nồng độ thất bại!"
                        ]
                    ]);
                }
            }
        }
        echo json_encode($response_array);
    }

    public function delete($id)
    {
        if ($this->modelConcentration->deleteConcentration($id) > 0) {
            $response_array = ([
                'concentration' => [
                    'id' => $id
                ],
                'message' => [
                    'status' => "success",
                    'description' => "Xóa nồng độ thành công!"
                ]
            ]);
        } else {
            $response_array = ([
                'message' => [
                    'status' => "error",
                    'description' => "Xóa nồng độ thất bại!"
                ]
            ]);
        }
        echo json_encode($response_array);
    }
}
