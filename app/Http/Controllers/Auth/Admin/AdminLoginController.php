<?php

namespace App\Http\Controllers\Auth\Admin;

use Alert;
use App\Http\Controllers\Controller;
use App\Utilize\Helper;
use Auth;
use Illuminate\Http\Request;

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
        // Attempt to log the user in
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            // If successful, then redirect to their intended location
            return redirect()->intended(route('admin.dashboard'));
        } else {
            // if unsuccessful, then redirect back to the login with the form data
            alert()->error('Đăng nhập hệ thống thất bại. Vui lòng thử lại', 'Lỗi!');
            return redirect()->back()->withInput($request->only('email', 'remember'));
        }
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
