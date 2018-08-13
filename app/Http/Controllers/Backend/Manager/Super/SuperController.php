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
                'activate' => $admin->active,
                'phone_number' => $admin->phone_number,
                'path_image' => $admin->path_image,
                'manipulation' => $admin->id
            );
            $collections->push($arr);
        }
        return Datatables::collection($collections)->make();
    }

    public function getInfoSuper(Request $request, $target)
    {
        $username = $request->username;
        $password = Hash::make($request->password);
        $user_type = $request->user_type;
        $email = $request->email;
        $full_name = $request->full_name;
        $gender = $request->gender;
        $address = $request->address;
        if(empty($request->activate)) {
            $activate = 'off';
        } else {
            $activate = $request->activate;
        }
        $phone_number = $request->phone_number;
        $path_image = $target;
        if (empty($request->id)) {
            $data = array([
                'username' => $username,
                'password' => $password,
                'user_type' => $user_type,
                'email' => $email,
                'full_name' => $full_name,
                'gender' => $gender,
                'address' => $address,
                'active' => $activate,
                'phone_number' => $phone_number,
                'path_image' => $path_image
            ]);
        } else {
            $data = array([
                'id' => $request->id,
                'username' => $username,
                'password' => $password,
                'user_type' => $user_type,
                'email' => $email,
                'full_name' => $full_name,
                'gender' => $gender,
                'address' => $address,
                'active' => $activate,
                'phone_number' => $phone_number,
                'path_image' => $path_image
            ]);
        }
        return $data;
    }

    public function store(Request $request)
    {
        $image_path = '';
        if(!file_exists($_FILES['image']['tmp_name']) || !is_uploaded_file($_FILES['image']['tmp_name'])) {
        } else {
            $info = pathinfo($_FILES['image']['name']);
            $ext = $info['extension'];
            $newname = trim(strtolower($request->username))."_".time().".".$ext;
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
            if ($this->modelAdmin->isExistEmail($request)) {
                $response_array = ([
                    'message' => [
                        'status' => "existed",
                        'description' => "Địa chỉ email đã tồn tại trong hệ thống!"
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
        }
        echo json_encode($response_array);
    }

    public function delete($id) {
        Log::info($id);
        if ($this->modelAdmin->deleteAdmin($id) > 0) {
            $response_array = ([
                'admin'      => [
                    'id'        =>  $id
                ],
                'message'       => [
                    'status'        => "success",
                    'description'   => "Xóa người dùng thành công!"
                ]
            ]);
        } else {
            $response_array = ([
                'message'       => [
                    'status'        => "error",
                    'description'   => "Xóa người dùng thất bại!"
                ]
            ]);
        }
        echo json_encode($response_array);
    }

    public function show($id)
    {
        if($this->modelAdmin->getAdmin($id) != null) {
            $admin = $this->modelAdmin->getAdmin($id);
            return json_encode(['admin' => $admin]);
        } else {
            alert()->error('Người dùng đã không tồn tại trong hệ thống!', 'Lỗi!');
            return redirect()->intended(route('admin.super.index'));
        }
    }

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
}
