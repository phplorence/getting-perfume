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

    public function store(Request $request)
    {
        $this->helper->validateAuthorName($request);
        // Insert database into mysql
        if($this->modelAuthor->isExistAuthor($request)) {
            alert()->error('Tên nhà pha chế đã tồn tại trong hệ thống.', 'Lỗi!');
            return redirect()->back()->withInput($request->only('name'));
        }

        // Attempt add new database successfully
        if ($this->modelAuthor->addAll($this->getInfoAuthor($request)) > 0) {
            // If successful, then redirect to their intended location
            alert()->success('Thêm nhà pha chế thành công.', 'Thông tin!');
            return redirect()->intended(route('admin.perfume.author.index'));
        } else {
            alert()->error('Thêm nhà pha chế thất bại.', 'Lỗi!');
            return redirect()->back()->withInput($request->only('name'));
        }
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
        $authorExistedDB = $this->modelAuthor->getAuthor($request->id);
        if (!empty($request->name)) {
            $this->helper->validateAuthorName($request);
            // Check name existed in Database
            if($this->modelAuthor->isExistNameCaseUpdated($request, $request->name)) {
                alert()->error('Nhà pha chế đã tồn tại trong hệ thống.', 'Lỗi!');
                return redirect()->back()->withInput($request->only('name'));
            }
        } else  {
            $request->name = $authorExistedDB->name;
        }

        // Attempt add update admin successfully
        if ($this->modelAuthor->updateAuthor($this->getInfoAuthor($request)) > 0) {
            alert()->success('Cập nhật nhà pha chế thành công.', 'Thông tin!');
            return redirect()->intended(route('admin.perfume.author.index'));
        } else {
            alert()->error('Cập nhật nhà pha chế thất bại.', 'Lỗi!');
            return redirect()->back()->withInput($request->only('name'));
        }
    }

    public function delete($id_author) {
        if ($this->modelAuthor->deleteAuthor($id_author) > 0) {
            alert()->success('Xóa nhà pha chế thành công.', 'Thông tin!');
        } else {
            alert()->error('Xóa nhà pha chế thất bại.', 'Lỗi!');
        }
        return redirect()->intended(route('admin.perfume.author.index'));
    }
}