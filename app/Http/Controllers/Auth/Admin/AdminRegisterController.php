<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;

class AdminRegisterController extends Controller
{
    public function showRegisterForm(){
        return view('auth.admin-register');
    }
}
