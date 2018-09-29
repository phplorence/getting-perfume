<?php

namespace App\Http\Controllers;

class PerfumeController extends Controller
{
    public function index()
    {
        return view('perfume');
    }

    public function hot() {
        $returnHTML = view('child.hot_perfume')->render();
        $response_array = ([
            'success' => true,
            'html'      => $returnHTML
        ]);
        echo json_encode($response_array);
    }
}
