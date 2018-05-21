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

    public function store(Request $request)
    {
        $this->helper->validateTypePerfumeName($request);
        // Insert database into mysql
        if($this->modelTypePerfume->isExistTypePerfume($request)) {
            alert()->error('Tên loại nước hoa đã tồn tại trong hệ thống.', 'Lỗi!');
            return redirect()->back()->withInput($request->only('name'));
        }

        // Attempt add new database successfully
        if ($this->modelTypePerfume->addAll($this->getInfoTypePerfume($request)) > 0) {
            // If successful, then redirect to their intended location
            alert()->success('Thêm loại nước hoa thành công.', 'Thông tin!');
            return redirect()->intended(route('admin.perfume.typeperfume.index'));
        } else {
            alert()->error('Thêm loại nước hoa thất bại.', 'Lỗi!');
            return redirect()->back()->withInput($request->only('name'));
        }
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
        $typePerfumeExistedDB = $this->modelTypePerfume->getTypePerfume($request->id);
        if (!empty($request->name)) {
            $this->helper->validateTypePerfumeName($request);
            // Check name existed in Database
            if($this->modelTypePerfume->isExistNameCaseUpdated($request, $request->name)) {
                alert()->error('Loại nước hoa đã tồn tại trong hệ thống.', 'Lỗi!');
                return redirect()->back()->withInput($request->only('name'));
            }
        } else  {
            $request->name = $typePerfumeExistedDB->name;
        }

        // Attempt add update admin successfully
        if ($this->modelTypePerfume->updateTypePerfume($this->getInfoTypePerfume($request)) >= 0) {
            alert()->success('Cập nhật loại nước hoa thành công.', 'Thông tin!');
            return redirect()->intended(route('admin.perfume.typeperfume.index'));
        } else {
            alert()->error('Cập nhật loại nước hoa thất bại.', 'Lỗi!');
            return redirect()->back()->withInput($request->only('name'));
        }
    }

    public function delete($id_type_perfume) {
        if ($this->modelTypePerfume->deleteTypePerfume($id_type_perfume) > 0) {
            alert()->success('Xóa loại nước hoa thành công.', 'Thông tin!');
        } else {
            alert()->error('Xóa loại nước hoa thất bại.', 'Lỗi!');
        }
        return redirect()->intended(route('admin.perfume.typeperfume.index'));
    }
}