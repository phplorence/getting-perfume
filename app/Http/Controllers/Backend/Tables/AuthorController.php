<?php

namespace App\Http\Controllers\Backend\Tables;

use App\Http\Controllers\Controller;
use App\Model\Authors;
use App\Utilize\Helper;
use Auth;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AuthorController extends Controller
{

    protected $modelAuthor;
    protected $helper;

    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->modelAuthor = new Authors();
        $this->helper = new Helper();
    }

    public function index()
    {
        if (Auth::guest()){
            return redirect()->intended(route('admin.login'));
        } else {
            return view('admin.tables.author.index');
        }
    }

    public function authorDataTables(){
        $authors = $this->modelAuthor->getAllAuthors();
        $collections = collect();
        foreach ($authors as $author){
            $arr = array(
                'id' => $author->id,
                'name'    => $author->name,
                'manipulation' => $author->id
            );
            $collections->push($arr);
        }
        return Datatables::collection($collections)->make();
    }

    public function getInfoAuthor(Request $request) {
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
        if($this->helper->validateAuthorName($request)){
            $response_array = ([
                'message'       => [
                    'status'        => "invalid",
                    'description'   => "Tên nhà pha chế không được bỏ trống!"
                ]
            ]);
        } else {
            if($this->modelAuthor->isExistAuthor($request)) {
                $response_array = ([
                    'message'       => [
                        'status'        => "existed",
                        'description'   => "Tên nhà pha chế đã tồn tại trong hệ thống!"
                    ]
                ]);
            } else {
                if ($this->modelAuthor->addAll($this->getInfoAuthor($request)) > 0) {
                    $response_array = ([
                        'author'      => $this->modelAuthor->getAuthorByName($request->name),
                        'message'       => [
                            'status'        => "success",
                            'description'   => "Thêm nhà pha chế thành công!"
                        ]
                    ]);
                } else {
                    $response_array = ([
                        'message'       => [
                            'status'        => "error",
                            'description'   => "Thêm nhà pha chế thất bại!"
                        ]
                    ]);
                }
            }
        }
        echo json_encode($response_array);
    }

    public function show($id)
    {
        if($this->modelAuthor->getAuthor($id) != null) {
            $author = $this->modelAuthor->getAuthor($id);
            return json_encode(['author' => $author]);
        } else {
            alert()->error('Tên nhà pha chế đã không tồn tại trong hệ thống.', 'Lỗi!');
            return redirect()->intended(route('admin.perfume.author.index'));
        }
    }

    public function update(Request $request)
    {
        if($this->helper->validateAuthorName($request)){
            $response_array = ([
                'message'       => [
                    'status'        => "invalid",
                    'description'   => "Tên nhà pha chế không được bỏ trống!"
                ]
            ]);
        } else {
            if($this->modelAuthor->isExistNameCaseUpdated($request, $request->name)) {
                $response_array = ([
                    'message'       => [
                        'status'        => "invalid",
                        'description'   => "Nhà pha chế đã tồn tại trong hệ thống!"
                    ]
                ]);
            } else {
                if ($this->modelAuthor->updateAuthor($this->getInfoAuthor($request)) >= 0) {
                    $response_array = ([
                        'author'      => $this->modelAuthor->getAuthorByName($request->name),
                        'message'       => [
                            'status'        => "success",
                            'description'   => "Cập nhật nhà pha chế thành công!"
                        ]
                    ]);
                } else {
                    $response_array = ([
                        'message'       => [
                            'status'        => "error",
                            'description'   => "Cập nhật nhà pha chế thất bại!"
                        ]
                    ]);
                }
            }
        }
        echo json_encode($response_array);
    }

    public function delete($id_author) {
        if ($this->modelAuthor->deleteAuthor($id_author) > 0) {
            $response_array = ([
                'style'      => [
                    'id'        =>  $id_author
                ],
                'message'       => [
                    'status'        => "success",
                    'description'   => "Xóa nha pha chế thành công!"
                ]
            ]);
        } else {
            $response_array = ([
                'message'       => [
                    'status'        => "error",
                    'description'   => "Xóa nhà pha chế thất bại!"
                ]
            ]);
        }
        echo json_encode($response_array);
    }
}