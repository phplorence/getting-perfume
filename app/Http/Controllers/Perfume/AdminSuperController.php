<?php

namespace App\Http\Controllers\Perfume;

use App\Http\Controllers\Controller;
use App\Utilize\Helper;
use Auth;
use Illuminate\Http\Request;

class AdminSuperController extends Controller
{
    protected $helper;

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

    public function show()
    {
        if (Auth::guest()){
            return redirect()->intended(route('admin.login'));
        } else {
            return view('admin.super.add');
        }
    }

    public function add(Request $request)
    {
        $this->helper = new Helper();
        $this->helper->validateUsername($request);
        $this->helper->validatePassword($request);
    }
}
