<?php

namespace App\Http\Controllers;

class PublicController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('welcome');
    }
}
