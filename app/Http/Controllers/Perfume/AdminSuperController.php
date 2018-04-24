<?php

namespace App\Http\Controllers\Perfume;

use App\Http\Controllers\Controller;
use Auth;

class AdminSuperController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        if (Auth::guest()){
            return redirect()->intended(route('admin.login'));
        } else {
            return view('admin.super.dashboard');
        }
    }

    public function superNew()
    {
        if (Auth::guest()){
            return redirect()->intended(route('admin.login'));
        } else {
            return view('admin.super.add');
        }
    }
}
