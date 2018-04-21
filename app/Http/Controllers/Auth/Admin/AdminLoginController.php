<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;

class AdminLoginController extends Controller
{

    public function _construct() {
        $this->middleware('guest:admin');
    }

    public function showLoginForm(){
//        return view('auth.admin-login');
        return view('auth.admin.login');
    }

    public function login() {
         return true;
    }
}
