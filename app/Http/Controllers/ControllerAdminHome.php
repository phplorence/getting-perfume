<?php

namespace App\Http\Controllers;

class ControllerAdminHome extends Controller
{
    public function index(){
        return view('admin.index');
    }
}
