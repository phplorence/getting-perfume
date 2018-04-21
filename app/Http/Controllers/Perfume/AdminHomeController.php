<?php

namespace App\Http\Controllers\Perfume;

use App\Http\Controllers\Controller;

class AdminHomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('admin.index');
    }
}
