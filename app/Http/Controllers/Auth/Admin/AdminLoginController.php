<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Utilize\Helper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\Hash;

class AdminLoginController extends Controller
{
    protected $helper;

    public function _construct() {
        parent::__construct();
        $this->middleware('guest:admin');
    }

    public function showLoginForm(){
        return view('auth.admin.login');
    }

    /**
     * @param Request $request
     * @return $this|\Illuminate\Http\RedirectResponse
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
