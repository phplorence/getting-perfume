<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

class AdminLoginController extends Controller
{
    public function showLoginForm(){
        return view('auth.admin-login');
    }

    public function login() {
         return true;
    }
}
