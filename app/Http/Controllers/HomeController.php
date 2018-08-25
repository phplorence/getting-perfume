<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function home()
    {
        $returnHTML = view('child.main')->render();
        $response_array = ([
            'success' => true,
            'html' => $returnHTML
        ]);
        echo json_encode($response_array);
    }
}
