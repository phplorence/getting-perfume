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
            return view('admin.perfume.index');
        }
    }

    public function create()
    {
        if (Auth::guest()){
            return redirect()->intended(route('admin.login'));
        } else {
            return view('admin.perfume.create');
        }
    }
}
