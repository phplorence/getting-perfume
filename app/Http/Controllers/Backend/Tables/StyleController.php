<?php

namespace App\Http\Controllers\Backend\Tables;

use App\Http\Controllers\Controller;
use App\Model\Styles;
use App\Utilize\Helper;
use Illuminate\Http\Request;
use Auth;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Log;

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

    public function store(Request $request)
    {
        $this->helper->validateStyleName($request);
        // Insert database into mysql
        if($this->modelStyle->isExistStyle($request)) {
            alert()->error('Tên phong cách đã tồn tại trong hệ thống.', 'Lỗi!');
            return redirect()->back()->withInput($request->only('name', 'description', 'detail', 'link'));
        }

        // Attempt add new database successfully
        if ($this->modelStyle->addAll($this->getInfoStyle($request)) > 0) {
            // If successful, then redirect to their intended location
            alert()->success('Thêm phong cách thành công.', 'Thông tin!');
            return redirect()->intended(route('admin.perfume.style.index'));
        } else {
            alert()->error('Thêm phong cách thất bại.', 'Lỗi!');
            return redirect()->back()->withInput($request->only('name', 'description', 'detail', 'link'));
        }
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
        $styleExistedDB = $this->modelStyle->getStyle($request->id);
        if (!empty($request->name)) {
            $this->helper->validateStyleName($request);
            // Check name existed in Database
            if($this->modelStyle->isExistNameCaseUpdated($request, $request->name)) {
                alert()->error('Phong cách đã tồn tại trong hệ thống.', 'Lỗi!');
                return redirect()->back()->withInput($request->only('name', 'description', 'detail', 'link'));
            }
        } else  {
            $request->name = $styleExistedDB->name;
        }

        // Attempt add update admin successfully
        if ($this->modelStyle->updateStyle($this->getInfoStyle($request)) >= 0) {
            alert()->success('Cập nhật phong cách thành công.', 'Thông tin!');
            return redirect()->intended(route('admin.perfume.style.index'));
        } else {
            alert()->error('Cập nhật phong cách thất bại.', 'Lỗi!');
            return redirect()->back()->withInput($request->only('name', 'description', 'detail', 'link'));
        }
    }

    public function delete($id_style) {
        if ($this->modelStyle->deleteStyle($id_style) > 0) {
            alert()->success('Xóa phong cách thành công.', 'Thông tin!');
        } else {
            alert()->error('Xóa phong cách thất bại.', 'Lỗi!');
        }
        return redirect()->intended(route('admin.perfume.style.index'));
    }
}