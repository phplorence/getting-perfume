<?php

namespace App\Http\Controllers\Backend\Manager\Super;

use App\Http\Controllers\Controller;
use App\Model\Admin;
use App\Model\Roles;
use App\Utilize\Helper;
use App\Utilize\ImageUtils;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;

class SuperController extends Controller
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
            return view('admin.super.index');
        }
    }

    public function superDataTables() {
        $admins = $this->modelAdmin->getAllAdmins();
        $collections = collect();
        foreach ($admins as $admin){
            $arr = array(
                'id' => $admin->id,
                'username'    => $admin->username,
                'user_type'   => $admin->user_type,
                'email'   => $admin->email,
                'full_name' => $admin->full_name,
                'phone_number' => $admin->phone_number,
                'address' => $admin->address,
                'path_image' => $admin->path_image
            );
            $collections->push($arr);
        }
        return Datatables::collection($collections)->make();
    }

    public function getInfoSuper(Request $request, $target)
    {
//        $name = $request->name;
//        $description = $request->description;
//        $detail = $request->detail;
//        $original_price = $request->original_price;
//        $promotion_price = $request->promotion_price;
//        $dore = $request->dore;
//        $concentration = $request->concentration;
//        $date_created = strftime("%Y-%m-%d %H:%M:%S", strtotime(strtr($request->date_created, '/', '-')));
//        $date_created = $date_created == '1970-01-01 00:00:00' ? NULL : $date_created;
//        $groupofincense = $request->incense;
//        $style = $request->style;
//        $bartender = $request->author;
//        $status = $request->status;
//        $count = $request->count;
//        $typeofProduct = $request->typeperfume;
//        if (empty($request->id)) {
//            $gender = $request->gender;
//        } else {
//            $gender = $request->optradio;
//        }
//        $country = $request->country;
//        $path_image = $target;
//        $date_expiration = strftime("%Y-%m-%d %H:%M:%S", strtotime(strtr($request->date_expiration, '/', '-')));
//        $date_expiration = $date_expiration == '1970-01-01 00:00:00' ? NULL : $date_expiration;
//        if (empty($request->id)) {
//            $data = array([
//                'name' => $name == NULL ? '': $name,
//                'description' => $description == NULL ? '' : $description,
//                'detail' => $detail == NULL ? '' : $detail,
//                'original_price' => $original_price == NULL ? '' : $original_price,
//                'promotion_price' => $promotion_price == NULL ? '' : $promotion_price,
//                'dore' => $dore == NULL ? '' : $dore,
//                'concentration' => $concentration,
//                'date_created' => $date_created,
//                'groupofincense' => $groupofincense == NULL ? '' : $groupofincense,
//                'style' => $style == NULL ? '' : $style,
//                'bartender' => $bartender == NULL ? '' : $bartender,
//                'status' => $status,
//                'count' => $count == NULL ? 0 : $count,
//                'typeofProduct' => $typeofProduct,
//                'gender' => $gender,
//                'country' => $country,
//                'path_image' => $path_image,
//                'date_expiration' => $date_expiration
//            ]);
//        } else {
//            $data = array([
//                'id' => $request->id,
//                'name' => $name,
//                'description' => $description == NULL ? '' : $description,
//                'detail' => $detail == NULL ? '' : $detail,
//                'original_price' => $original_price,
//                'promotion_price' => $promotion_price,
//                'dore' => $dore == NULL ? '' : $dore,
//                'concentration' => $concentration,
//                'date_created' => $date_created,
//                'groupofincense' => $groupofincense == NULL ? '' : $groupofincense,
//                'style' => $style == NULL ? '' : $style,
//                'bartender' => $bartender == NULL ? '' : $bartender,
//                'status' => $status,
//                'count' => $count == NULL ? 0 : $count,
//                'typeofProduct' => $typeofProduct,
//                'gender' => $gender,
//                'country' => $country,
//                'path_image' => $path_image,
//                'date_expiration' => $date_expiration
//            ]);
//        }
        return $data;
    }

    public function store(Request $request)
    {
        // Validate from server
        $this->helper->validateUsername($request);
        $this->helper->validatePassword($request);
        $this->helper->validateConfirmationPassword($request);
        $this->helper->validateEmail($request);
        $this->helper->validateRadioGender($request);

        $image_path = '';
        if(!file_exists($_FILES['image']['tmp_name']) || !is_uploaded_file($_FILES['image']['tmp_name'])) {
        } else {
            $info = pathinfo($_FILES['image']['name']);
            $ext = $info['extension'];
            $newname = trim(strtolower($request->name))."_".time().".".$ext;
            $image_path = $newname;
            $target = 'avatar/' . $newname;
            move_uploaded_file($_FILES['image']['tmp_name'], $target);
        }
        if ($this->modelAdmin->isExistUsername($request)) {
            $response_array = ([
                'message' => [
                    'status' => "existed",
                    'description' => "Tên người dùng đã tồn tại trong hệ thống!"
                ]
            ]);
        } else {
            if ($this->modelAdmin->addAll($this->getInfoSuper($request, $image_path)) > 0) {
                $response_array = ([
                    'admin' => $this->modelAdmin->getAdminByName($request->username),
                    'message' => [
                        'status' => "success",
                        'description' => "Thêm người dùng thành công!"
                    ]
                ]);
            } else {
                $response_array = ([
                    'message' => [
                        'status' => "error",
                        'description' => "Thêm người dùng thất bại!"
                    ]
                ]);
            }
        }
        echo json_encode($response_array);
    }

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
            return redirect()->intended(route('admin.super.index'));
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
        if ($this->modelAdmin->updateAdmin($this->getInfoUserFromDB($request, true)) > 0) {
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
            return redirect()->intended(route('admin.super.index'));
        }
    }

    public function getInfoUserFromDB(Request $request, $isUpdated) {
        $username = $request->username;
        Log::info('Admin', ['username' => $username]);
        Log::info('Admin', ['password' => $request->password]);
        $password = $request->password;
        if ($isUpdated) {
            if(!empty($password)) {
                $password =  Hash::make($request->password);
            } else {
                $password = $this->modelAdmin->getAdmin($request->id)->password;
            }
        } else {
            $password = Hash::make($password);
        }
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
