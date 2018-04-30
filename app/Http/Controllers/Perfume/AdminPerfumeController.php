<?php

namespace App\Http\Controllers\Perfume;

use App\Http\Controllers\Controller;
use App\Utilize\Helper;
use Auth;
use Illuminate\Http\Request;

class AdminPerfumeController extends Controller
{

    protected $helper;

    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->helper = new Helper();
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

    public function store(Request $request)
    {
        // Validate these fields force enter data
        $this->helper->validRequiredFields($request);
    }
}
