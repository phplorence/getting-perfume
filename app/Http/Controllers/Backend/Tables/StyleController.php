<?php

namespace App\Http\Controllers\Backend\Tables;

use App\Http\Controllers\Controller;
use App\Model\Styles;
use App\Utilize\Helper;
use Illuminate\Http\Request;
use Auth;
use Yajra\DataTables\Facades\DataTables;

class StyleController extends Controller
{

    protected $modelStyle;
    protected $helper;

    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->modelStyle = new Styles();
        $this->helper = new Helper();
    }

    public function index()
    {
        if (Auth::guest()){
            return redirect()->intended(route('admin.login'));
        } else {
            return view('admin.tables.style.index');
        }
    }

    public function indexAll() {
        $styles = $this->modelStyle->getAllStyles();
        $returnHTML = view('custom.widget.selectoption_style')->with(compact('styles'))->render();
        $response_array = ([
            'success' => true,
            'html'      => $returnHTML
        ]);
        echo json_encode($response_array);
    }

    public function styleDataTables(){
        $styles = $this->modelStyle->getAllStyles();
        $collections = collect();
        foreach ($styles as $style){
            $arr = array(
                'id' => $style->id,
                'name'    => $style->name,
                'description'   => $style->description,
                'detail'   => $style->detail,
                'link' => $style->link,
                'manipulation' => $style->id
            );
            $collections->push($arr);
        }
        return Datatables::collection($collections)->make();
    }

    public function getInfoStyle(Request $request) {
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
        if($this->helper->validateStyleName($request)){
            $response_array = ([
                'message'       => [
                    'status'        => "invalid",
                    'description'   => "Tên phong cách không được bỏ trống!"
                ]
            ]);
        } else {
            if($this->modelStyle->isExistStyle($request)) {
                $response_array = ([
                    'message'       => [
                        'status'        => "existed",
                        'description'   => "Tên phong cách đã tồn tại trong hệ thống!"
                    ]
                ]);
            } else {
                if ($this->modelStyle->addAll($this->getInfoStyle($request)) > 0) {
                    $response_array = ([
                        'style'      => $this->modelStyle->getStyleByName($request->name),
                        'message'       => [
                            'status'        => "success",
                            'description'   => "Thêm phong cách thành công!"
                        ]
                    ]);
                } else {
                    $response_array = ([
                        'message'       => [
                            'status'        => "error",
                            'description'   => "Thêm phong cách thất bại!"
                        ]
                    ]);
                }
            }
        }
        echo json_encode($response_array);
    }

    public function show($id)
    {
        if($this->modelStyle->getStyle($id) != null) {
            $style = $this->modelStyle->getStyle($id);
            return json_encode(['style' => $style]);
        } else {
            alert()->error('Tên phong cách đã không tồn tại trong hệ thống.', 'Lỗi!');
            return redirect()->intended(route('admin.perfume.style.index'));
        }
    }

    public function update(Request $request)
    {
        if($this->helper->validateStyleName($request)){
            $response_array = ([
                'message'       => [
                    'status'        => "invalid",
                    'description'   => "Tên phong cách không được bỏ trống!"
                ]
            ]);
        } else {
            if($this->modelStyle->isExistNameCaseUpdated($request, $request->name)) {
                $response_array = ([
                    'message'       => [
                        'status'        => "invalid",
                        'description'   => "Phong cách đã tồn tại trong hệ thống!"
                    ]
                ]);
            } else {
                if ($this->modelStyle->updateStyle($this->getInfoStyle($request)) >= 0) {
                    $response_array = ([
                        'style'      => $this->modelStyle->getStyleByName($request->name),
                        'message'       => [
                            'status'        => "success",
                            'description'   => "Cập nhật phong cách thành công!"
                        ]
                    ]);
                } else {
                    $response_array = ([
                        'message'       => [
                            'status'        => "error",
                            'description'   => "Cập nhật phong cách thất bại!"
                        ]
                    ]);
                }
            }
        }
        echo json_encode($response_array);
    }

    public function delete($id_style) {
        if ($this->modelStyle->deleteStyle($id_style) > 0) {
            $response_array = ([
                'style'      => [
                    'id'        =>  $id_style
                ],
                'message'       => [
                    'status'        => "success",
                    'description'   => "Xóa phong cách thành công!"
                ]
            ]);
        } else {
            $response_array = ([
                'message'       => [
                    'status'        => "error",
                    'description'   => "Xóa phong cách thất bại!"
                ]
            ]);
        }
        echo json_encode($response_array);
    }
}