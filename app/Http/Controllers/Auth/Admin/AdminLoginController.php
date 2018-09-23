<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use App\Utilize\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    protected $helper;

    public function _construct() {
        $this->middleware('guest:admin');
    }

    public function showLoginForm(){
        return view('auth.admin.login');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request) {
        $this->helper = new Helper();
        $this->helper->validateEmail($request);
        $this->helper->validatePassword($request);
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            $response_array = ([
                'message' => [
                    'status' => "success",
                    'description' => "Đăng nhập thành công!"
                ]
            ]);
        } else {
            $response_array = ([
                'account' => [
                    'email' => $request->email,
                    'password' => $request->password,
                    'remember' => $request->remember
                ],
                'message' => [
                    'status' => "error",
                    'description' => "Thông tin sai!"
                ]
            ]);
        }
        echo json_encode($response_array);
    }

    /**
     * @return $this|\Illuminate\Http\RedirectResponse
     */
    public function logout() {
        // Attempt to log the user in
        Auth('admin')->logout();
        return redirect()->intended(route('admin.login'));
    }
}
