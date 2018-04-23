<?php

namespace App\Http\Controllers\Perfume;

use App\Http\Controllers\Controller;
use Auth;

class AdminPerfumeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function perfume()
    {
        if (Auth::guest()){
            return redirect()->intended(route('admin.login'));
        } else {
            return view('admin.perfume.perfume');
        }
    }

    public function perfumeNew()
    {
        if (Auth::guest()){
            return redirect()->intended(route('admin.login'));
        } else {
            return view('admin.perfume.add');
        }
    }
}
