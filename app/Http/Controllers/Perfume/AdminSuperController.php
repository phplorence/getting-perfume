<?php

namespace App\Http\Controllers\Perfume;

use App\Http\Controllers\Controller;
use App\Model\Admin;
use App\Model\Roles;
use App\Utilize\Helper;
use App\Utilize\ImageUtils;
use Auth;
use Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AdminSuperController extends Controller
{
    protected $helper;
    protected $modelAdmin;
    protected $modelRole;
    protected $modelImageUtils;

    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->modelAdmin = new Admin();
        $this->helper = new Helper();
        $this->modelRole = new Roles();
        $this->modelImageUtils = new ImageUtils();
    }

    public function index()
    {
        if (Auth::guest()){
            return redirect()->intended(route('admin.login'));
        } else {
            $admins = $this->modelAdmin->getAllAdmins();
            $admin_paginations = $this->modelAdmin->getAdminPaginations();
            $indexArr = 0;
            $searchKey = null;
            return view('admin.super.index', compact('admins','admin_paginations', 'indexArr', 'searchKey'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        if (Auth::guest()){
            return redirect()->intended(route('admin.login'));
        } else {
            $roles = $this->modelRole->getAllRoles();
            return view('admin.super.create', compact('roles'));
        }
    }

    public function show($id_admin)
    {
        if($this->modelAdmin->getAdmin($id_admin) != null) {
            $roles = $this->modelRole->getAllRoles();
            $admin = $this->modelAdmin->getAdmin($id_admin);
            return view('admin.super.edit', compact('admin','roles'));
        } else {
            alert()->error('Người dùng đã không tồn tại trong hệ thống.', 'Lỗi!');
            return redirect()->intended(route('admin.super.index'));
        }
    }

    public function search(Request $reguest)
    {
        $admins = $this->modelAdmin->getAllAdmins();
        $admin_paginations = $this->modelAdmin->getResultSearch($reguest->search);
        if (count($admin_paginations) > 0) {
            $indexArr = 0;
            $searchKey = $reguest->search;
            return view('admin.super.index', compact('admins','admin_paginations', 'indexArr', 'searchKey'));
        } else {
            alert()->success('Không tìm thấy thông tin bạn cần.', 'Thông tin!');
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request)
    {
        $adminExistedDB = $this->modelAdmin->getAdmin($request->id);
        if (!empty($request->username)) {
            $this->helper->validateUsername($request);
            // Check Username or Email existed in Database
            if($this->modelAdmin->isExistUsernameCaseUpdated($request, $request->username)) {
                alert()->error('Tên người dùng đã tồn tại trong hệ thống.', 'Lỗi!');
                return redirect()->back()->withInput($request->only('username', 'email', 'activate', 'address', 'full_name', 'gender', 'phone_number','permission'));
            }
        } else  {
            $request->username = $adminExistedDB->username;
        }
        if (!empty($request->password)) {
            $this->helper->validatePassword($request);
            $this->helper->validateConfirmationPassword($request);
        } else {
            $request->password = $adminExistedDB->password;
        }
        if (!empty($request->email)) {
            $this->helper->validateEmail($request);
            if($this->modelAdmin->isExistEmailCaseUpdated($request, $request->email)) {
                alert()->error('Địa chỉ email đã tồn tại trong hệ thống.', 'Lỗi!');
                return redirect()->back()->withInput($request->only('username', 'email', 'activate', 'address', 'full_name', 'gender', 'phone_number','permission'));
            }
        } else {
            $request->email = $adminExistedDB->email;
        }

        // Attempt add update admin successfully
        if ($this->modelAdmin->updateAdmin($this->getInfoUserFromDB($request)) > 0) {
            alert()->success('Cập nhật người dùng cấp cao thành công.', 'Thông tin!');
            return redirect()->intended(route('admin.super.index'));
        } else {
            alert()->error('Cập nhật người dùng cấp cao thất bại.', 'Lỗi!');
            return redirect()->back()->withInput($request->only('username', 'email', 'activate', 'address', 'full_name', 'gender', 'phone_number','permission'));
        }
    }

    public function delete($id_admin) {
        if ($this->modelAdmin->deleteAdmin($id_admin) > 0) {
            alert()->success('Xóa người dùng cấp cao thành công.', 'Thông tin!');
            return redirect()->intended(route('admin.super.index'));
        } else {
            alert()->error('Xóa người dùng cấp cao thất bại.', 'Lỗi!');
        }
    }

    public function store(Request $request)
    {
        // I want to check all data are valid for inserting new user
        $this->helper->validateUsername($request);
        $this->helper->validatePassword($request);
        $this->helper->validateConfirmationPassword($request);
        $this->helper->validateEmail($request);
        $this->helper->validateRadioGender($request);

        // Insert database into mysql
        if($this->modelAdmin->isExistEmail($request) || $this->modelAdmin->isExistUsername($request)) {
            alert()->error('Người dùng đã tồn tại trong hệ thống. Vui lòng đăng nhập để bắt đầu phiên làm việc.', 'Lỗi!');
            return redirect()->back()->withInput($request->only('username', 'email', 'activate', 'address', 'full_name', 'gender', 'phone_number','permission'));
        }

        // Attempt add new database successfully
        if ($this->modelAdmin->addAll($this->getInfoUserFromDB($request)) > 0) {
            // If successful, then redirect to their intended location
            alert()->success('Thêm người dùng cấp cao thành công.', 'Thông tin!');
            return redirect()->intended(route('admin.super.index'));
        } else {
            alert()->error('Thêm người dùng cấp cao thất bại.', 'Lỗi!');
            return redirect()->back()->withInput($request->only('username', 'email', 'activate', 'address', 'full_name', 'gender', 'phone_number','permission'));
        }
    }

    public function getInfoUserFromDB(Request $request) {
        $username = $request->username;
        Log::info('Admin', ['username' => $username]);
        $password = Hash::make($request->password);
        Log::info('Admin', ['password' => $password]);
        $user_type = $request->permission;
        Log::info('Admin', ['user_type' => $user_type]);
        $email = $request->email;
        Log::info('Admin', ['email' => $email]);
        $gender = $request->gender;
        Log::info('Admin', ['gender' => $gender]);
        $full_name = $request->full_name;
        Log::info('Admin', ['full_name' => $full_name]);
        $activate = $request->activate;
        Log::info('Admin', ['activate' => $activate]);
        $phone_number = $request->phone_number;
        Log::info('Admin', ['phone_number' => $phone_number]);
        $address = $request->address;
        Log::info('Admin', ['address' => $address]);
        if (empty($request->id)) {
            $data = array([
                'username' => $username,
                'password' => $password,
                'user_type' => $user_type,
                'email' => $email,
                'gender' => $gender,
                'full_name' => $full_name,
                'active' => $activate == null ?"off":$activate,
                'address' => $address,
                'phone_number' => $phone_number
            ]);
        } else {
            $data = array([
                'id' => $request->id,
                'username' => $username,
                'password' => $password,
                'user_type' => $user_type,
                'email' => $email,
                'gender' => $gender,
                'full_name' => $full_name,
                'active' => $activate == null ?"off":$activate,
                'address' => $address,
                'phone_number' => $phone_number
            ]);
        }
        return $data;
    }
}
