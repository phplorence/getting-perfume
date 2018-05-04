<?php

namespace App\Http\Controllers\Backend\Tables;

use App\Model\Concentrations;
use App\Utilize\Helper;
use Illuminate\Http\Request;
use Auth;
use App\Http\Controllers\Controller;

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

    public function getInfoConcentrationFromDB(Request $request) {
        $name = $request->name;
        Log::info('Admin', ['name' => $name]);
        $description = $request->description;
        Log::info('Admin', ['description' => $description]);
        $detail = $request->detail;
        Log::info('Admin', ['detail' => $detail]);
        $link = $request->link;
        Log::info('Admin', ['link' => $link]);
        $data = array([
            'name' => $name,
            'description' => $description,
            'detail' => $detail,
            'link' => $link
        ]);
        return $data;
    }
}
