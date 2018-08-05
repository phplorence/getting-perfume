<?php

namespace App\Http\Controllers\Backend\Tables;

use App\Http\Controllers\Controller;
use App\Model\TypePerfumes;
use App\Utilize\Helper;
use Auth;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class TypePerfumeController extends Controller
{

    protected $modelTypePerfume;
    protected $helper;

    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->modelTypePerfume = new TypePerfumes();
        $this->helper = new Helper();
    }

    public function index()
    {
        if (Auth::guest()){
            return redirect()->intended(route('admin.login'));
        } else {
            return view('admin.tables.typeperfume.index');
        }
    }

    public function typePerfumeDataTables(){
        $typePerfumes = $this->modelTypePerfume->getAllTypePerfumes();
        $collections = collect();
        foreach ($typePerfumes as $typePerfume){
            $arr = array(
                'id' => $typePerfume->id,
                'name'    => $typePerfume->name,
                'manipulation' => $typePerfume->id
            );
            $collections->push($arr);
        }
        return Datatables::collection($collections)->make();
    }

    public function getInfoTypePerfume(Request $request) {
        $name = $request->name;
        if (empty($request->id)) {
            $data = array([
                'name' => $name
            ]);
        } else {
            $data = array([
                'id' => $request->id,
                'name' => $name
            ]);
        }
        return $data;
    }

    public function store(Request $request)
    {
        if($this->helper->validateTypePerfumeName($request)){
            $response_array = ([
                'message'       => [
                    'status'        => "invalid",
                    'description'   => "Tên loại nước hoa không được bỏ trống!"
                ]
            ]);
        } else {
            if($this->modelTypePerfume->isExistTypePerfume($request)) {
                $response_array = ([
                    'message'       => [
                        'status'        => "existed",
                        'description'   => "Tên loại nước hoa đã tồn tại trong hệ thống!"
                    ]
                ]);
            } else {
                if ($this->modelTypePerfume->addAll($this->getInfoTypePerfume($request)) > 0) {
                    $response_array = ([
                        'typeperfume'      => $this->modelTypePerfume->getTypePerfumeByName($request->name),
                        'message'       => [
                            'status'        => "success",
                            'description'   => "Thêm loại nước hoa thành công!"
                        ]
                    ]);
                } else {
                    $response_array = ([
                        'message'       => [
                            'status'        => "error",
                            'description'   => "Thêm loại nước hoa thất bại!"
                        ]
                    ]);
                }
            }
        }
        echo json_encode($response_array);
    }

    public function show($id)
    {
        if($this->modelTypePerfume->getTypePerfume($id) != null) {
            $typeperfume = $this->modelTypePerfume->getTypePerfume($id);
            return json_encode(['typeperfume' => $typeperfume]);
        } else {
            alert()->error('Tên loại nước hoa đã không tồn tại trong hệ thống.', 'Lỗi!');
            return redirect()->intended(route('admin.perfume.typeperfume.index'));
        }
    }

    public function update(Request $request)
    {
        if($this->helper->validateTypePerfumeName($request)){
            $response_array = ([
                'message'       => [
                    'status'        => "invalid",
                    'description'   => "Tên loại nước hoa không được bỏ trống!"
                ]
            ]);
        } else {
            if($this->modelTypePerfume->isExistNameCaseUpdated($request, $request->name)) {
                $response_array = ([
                    'message'       => [
                        'status'        => "invalid",
                        'description'   => "Loại nước hoa đã tồn tại trong hệ thống!"
                    ]
                ]);
            } else {
                if ($this->modelTypePerfume->updateTypePerfume($this->getInfoTypePerfume($request)) >= 0) {
                    $response_array = ([
                        'typeperfume'      => $this->modelTypePerfume->getTypePerfumeByName($request->name),
                        'message'       => [
                            'status'        => "success",
                            'description'   => "Cập nhật loại nước hoa thành công!"
                        ]
                    ]);
                } else {
                    $response_array = ([
                        'message'       => [
                            'status'        => "error",
                            'description'   => "Cập nhật loại nước hoa thất bại!"
                        ]
                    ]);
                }
            }
        }
        echo json_encode($response_array);
    }

    public function delete($id_type_perfume) {
        if ($this->modelTypePerfume->deleteTypePerfume($id_type_perfume) > 0) {
            $response_array = ([
                'typeperfume'      => [
                    'id'        =>  $id_type_perfume
                ],
                'message'       => [
                    'status'        => "success",
                    'description'   => "Xóa loại nước hoa thành công!"
                ]
            ]);
        } else {
            $response_array = ([
                'message'       => [
                    'status'        => "error",
                    'description'   => "Xóa loại nước hoa thất bại!"
                ]
            ]);
        }
        echo json_encode($response_array);
    }
}