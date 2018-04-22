<?php

namespace App\Http\Controllers\Perfume;

use App\Http\Controllers\Controller;
use Auth;

class AdminHomeController extends Controller
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
            return view('admin.index');
        }
    }
}
