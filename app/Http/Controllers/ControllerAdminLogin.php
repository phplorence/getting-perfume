<?php

namespace App\Http\Controllers;

class ControllerAdminLogin extends Controller
{
    public function index(){
        return view('admin.login');
    }
}
