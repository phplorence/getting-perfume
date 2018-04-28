<?php

namespace App\Http\Controllers\Perfume;

use App\Http\Controllers\Controller;
use App\Model\Admin;
use App\Model\Roles;
use App\Utilize\Helper;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AdminSuperController extends Controller
{
    protected $helper;
    protected $modelAdmin;
    protected $modelRole;

    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->modelAdmin = new Admin();
        $this->helper = new Helper();
        $this->modelRole = new Roles();
    }

    public function index()
    {
        if (Auth::guest()){
            return redirect()->intended(route('admin.login'));
        } else {
            return view('admin.super.index');
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

    public function show($id)
    {
        //
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
        $this->modelAdmin->addAll($this->getInfoUserFromDB($request));

        // Attempt add new database successfully
        if (false) {
            // If successful, then redirect to their intended location
            return redirect()->intended(route('admin.super.dashboard'));
        } else {
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
        $data = array([
            'username' => $username,
            'password' => $password,
            'user_type' => $user_type,
            'email' => $email,
            'gender' => $gender,
            'full_name' => $full_name,
            'active' => $activate,
            'address' => $address,
            'phone_number' => $phone_number
        ]);
        return $data;
    }
}
