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

    public function incenseDataTables(){
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

    public function getInfoIncense(Request $request) {
        $name = $request->name;
        Log::info('Admin', ['name' => $name]);
        $description = $request->description;
        Log::info('Admin', ['description' => $description]);
        $detail = $request->detail;
        Log::info('Admin', ['detail' => $detail]);
        $link = $request->link;
        Log::info('Admin', ['link' => $link]);
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
        $incenseExistedDB = $this->modelIncense->getIncense($request->id);
        if (!empty($request->name)) {
            $this->helper->validateIncenseName($request);
            // Check name existed in Database
            if($this->modelIncense->isExistNameCaseUpdated($request, $request->name)) {
                alert()->error('Nhóm hương đã tồn tại trong hệ thống.', 'Lỗi!');
                return redirect()->back()->withInput($request->only('name', 'description', 'detail', 'link'));
            }
        } else  {
            $request->name = $incenseExistedDB->name;
        }

        // Attempt add update admin successfully
        if ($this->modelIncense->updateIncense($this->getInfoIncense($request)) >= 0) {
            alert()->success('Cập nhật nhóm hương thành công.', 'Thông tin!');
            return redirect()->intended(route('admin.perfume.incense.index'));
        } else {
            alert()->error('Cập nhật nhóm hương thất bại.', 'Lỗi!');
            return redirect()->back()->withInput($request->only('name', 'description', 'detail', 'link'));
        }
    }

    public function delete($id_incense) {
        if ($this->modelIncense->deleteIncense($id_incense) > 0) {
            alert()->success('Xóa nhóm hương thành công.', 'Thông tin!');
        } else {
            alert()->error('Xóa nhóm hương thất bại.', 'Lỗi!');
        }
        return redirect()->intended(route('admin.perfume.incense.index'));
    }
}
