<?php

namespace App\Http\Controllers\Backend\Tables;

use App\Http\Controllers\Controller;
use App\Model\Incenses;
use App\Utilize\Helper;
use Illuminate\Http\Request;
use Auth;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Log;

class IncenseController extends Controller
{

    protected $modelIncense;
    protected $helper;

    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->modelIncense = new Incenses();
        $this->helper = new Helper();
    }

    public function index()
    {
        if (Auth::guest()){
            return redirect()->intended(route('admin.login'));
        } else {
            return view('admin.tables.incense.index');
        }
    }

    public function indexAll() {
        $incenses = $this->modelIncense->getAllIncenses();
        $returnHTML = view('custom.widget.selectoption_incense')->with(compact('incenses'))->render();
        $response_array = ([
            'success' => true,
            'html'      => $returnHTML
        ]);
        echo json_encode($response_array);
    }

    public function incenseDataTables() {
        $incenses = $this->modelIncense->getAllIncenses();
        $collections = collect();
        foreach ($incenses as $incense){
            $arr = array(
                'id' => $incense->id,
                'name'    => $incense->name,
                'description'   => $incense->description,
                'detail'   => $incense->detail,
                'link' => $incense->link,
                'manipulation' => $incense->id
            );
            $collections->push($arr);
        }
        return Datatables::collection($collections)->make();
    }

    public function getInfoIncense(Request $request) {
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
        if($this->helper->validateIncenseName($request)){
            $response_array = ([
                'message'       => [
                    'status'        => "invalid",
                    'description'   => "Tên nhóm hương không được bỏ trống!"
                ]
            ]);
        } else {
            if($this->modelIncense->isExistIncense($request)) {
                $response_array = ([
                    'message'       => [
                        'status'        => "existed",
                        'description'   => "Tên nhóm hương đã tồn tại trong hệ thống!"
                    ]
                ]);
            } else {
                if ($this->modelIncense->addAll($this->getInfoIncense($request)) > 0) {
                    $response_array = ([
                        'incense'      => $this->modelIncense->getIncenseByName($request->name),
                        'message'       => [
                            'status'        => "success",
                            'description'   => "Thêm nhóm hương thành công!"
                        ]
                    ]);
                } else {
                    $response_array = ([
                        'message'       => [
                            'status'        => "error",
                            'description'   => "Thêm nhóm hương thất bại!"
                        ]
                    ]);
                }
            }
        }
        echo json_encode($response_array);
    }

    public function show($id)
    {
        if($this->modelIncense->getIncense($id) != null) {
            $incense = $this->modelIncense->getIncense($id);
            return json_encode(['incense' => $incense]);
        } else {
            alert()->error('Tên nhóm hương đã không tồn tại trong hệ thống.', 'Lỗi!');
            return redirect()->intended(route('admin.perfume.incense.index'));
        }
    }

    public function update(Request $request)
    {
        if($this->helper->validateIncenseName($request)){
            $response_array = ([
                'message'       => [
                    'status'        => "invalid",
                    'description'   => "Tên nhóm hương không được bỏ trống!"
                ]
            ]);
        } else {
            if($this->modelIncense->isExistNameCaseUpdated($request, $request->name)) {
                $response_array = ([
                    'message'       => [
                        'status'        => "invalid",
                        'description'   => "Nhóm hương đã tồn tại trong hệ thống!"
                    ]
                ]);
            } else {
                if ($this->modelIncense->updateIncense($this->getInfoIncense($request)) >= 0) {
                    $response_array = ([
                        'incense'      => $this->modelIncense->getIncenseByName($request->name),
                        'message'       => [
                            'status'        => "success",
                            'description'   => "Cập nhật nhóm hương thành công!"
                        ]
                    ]);
                } else {
                    $response_array = ([
                        'message'       => [
                            'status'        => "error",
                            'description'   => "Cập nhật nhóm hương thất bại!"
                        ]
                    ]);
                }
            }
        }
        echo json_encode($response_array);
    }

    public function delete($id_incense) {
        if ($this->modelIncense->deleteIncense($id_incense) > 0) {
            $response_array = ([
                'incense'      => [
                    'id'        =>  $id_incense
                ],
                'message'       => [
                    'status'        => "success",
                    'description'   => "Xóa nhóm hương thành công!"
                ]
            ]);
        } else {
            $response_array = ([
                'message'       => [
                    'status'        => "error",
                    'description'   => "Xóa nhóm hương thất bại!"
                ]
            ]);
        }
        echo json_encode($response_array);
    }
}
