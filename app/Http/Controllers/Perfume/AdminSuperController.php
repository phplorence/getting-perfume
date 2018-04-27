<?php

namespace App\Http\Controllers\Perfume;

use App\Http\Controllers\Controller;
use App\Utilize\Helper;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

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
        $this->helper->validateConfirmationPassword($request);
        $this->helper->validateEmail($request);
        $this->helper->validateRadioGender($request);

        // Attempt add new database successfully
        if (false) {
            // If successful, then redirect to their intended location
            return redirect()->intended(route('admin.super.dashboard'));
        } else {
            // if unsuccessful, then redirect back to the login with the form data
            return redirect()->back()->withInput($request->only('username', 'permission'));
        }
    }
}
