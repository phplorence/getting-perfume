<?php

namespace App\Http\Controllers\Backend\Tables;

use App\Model\Concentrations;
use App\Utilize\Helper;
use Illuminate\Http\Request;
use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

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
        if (Auth::guest()){
            return redirect()->intended(route('admin.login'));
        } else {
            $indexArr = 0;
            $concentrations = $this->modelConcentration->getAllConcentrations();
            return view('admin.tables.concentration.index', compact('indexArr','concentrations'));
        }
    }

    public function store(Request $request)
    {
        // I want to check all data are valid for inserting new user
        $this->helper->validateConcentrationName($request);

        // Insert database into mysql
        if($this->modelConcentration->isExistConcentration($request)) {
            alert()->error('Nồng độ đã tồn tại trong hệ thống.', 'Lỗi!');
            return redirect()->back()->withInput($request->only('name', 'description', 'detail', 'link'));
        }

        // Attempt add new database successfully
        if ($this->modelConcentration->addAll($this->getInfoConcentrationFromDB($request)) > 0) {
            // If successful, then redirect to their intended location
            alert()->success('Thêm nồng độ thành công.', 'Thông tin!');
            return redirect()->intended(route('admin.perfume.concentration.index'));
        } else {
            alert()->error('Thêm nồng độ thất bại.', 'Lỗi!');
            return redirect()->back()->withInput($request->only('name', 'description', 'detail', 'link'));
        }
    }

    public function update(Request $request)
    {
        $conExistedDB = $this->modelConcentration->getConcentration($request->id);
        if (!empty($request->name)) {
            $this->helper->validateConcentrationName($request);
            // Check name existed in Database
            if($this->modelConcentration->isExistNameCaseUpdated($request, $request->name)) {
                alert()->error('Nồng độ đã tồn tại trong hệ thống.', 'Lỗi!');
                return redirect()->back()->withInput($request->only('name', 'description', 'detail', 'link'));
            }
        } else  {
            $request->name = $conExistedDB->name;
        }

        // Attempt add update admin successfully
        if ($this->modelConcentration->updateConcentration($this->getInfoConcentrationFromDB($request)) >= 0) {
            alert()->success('Cập nhật nồng độ thành công.', 'Thông tin!');
            return redirect()->intended(route('admin.perfume.concentration.index'));
        } else {
            alert()->error('Cập nhật nồng độ thất bại.', 'Lỗi!');
            return redirect()->back()->withInput($request->only('name', 'description', 'detail', 'link'));
        }
    }

    public function delete($id) {
        if ($this->modelConcentration->deleteConcentration($id) > 0) {
            alert()->success('Xóa nồng độ thành công.', 'Thông tin!');
            return redirect()->intended(route('admin.perfume.concentration.index'));
        } else {
            alert()->error('Xóa nồng độ thất bại.', 'Lỗi!');
            return redirect()->intended(route('admin.perfume.concentration.index'));
        }
    }

    public function getInfoConcentrationFromDB(Request $request) {
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
}
