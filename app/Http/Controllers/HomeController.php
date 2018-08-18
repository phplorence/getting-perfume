<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('web');
    }

    public function index()
    {
        if(Auth::check())
        {
            return view('auth.login');
        }
        return view('home');
    }

    public function home()
    {
        $returnHTML = view('child.main')->render();
        $response_array = ([
            'success' => true,
            'html'      => $returnHTML
        ]);
        echo json_encode($response_array);
    }
}
