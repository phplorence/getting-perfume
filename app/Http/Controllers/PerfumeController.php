<?php

namespace App\Http\Controllers;

use App\Model\Perfumes;

class PerfumeController extends Controller
{

    protected $modelPerfume;

    public function __construct()
    {
        $this->modelPerfume = new Perfumes();
    }

    public function index()
    {
        return view('perfume');
    }

    public function hot() {
        $hotPerfumes = $this->modelPerfume->getDetailPerfumes();
        $returnHTML = view('child.perfume_hot')->with(compact('hotPerfumes'))->render();
        $response_array = ([
            'success' => true,
            'html'      => $returnHTML
        ]);
        echo json_encode($response_array);
    }

    public function detail() {
        $returnHTML = view('child.perfume_detail')->render();
        $response_array = ([
            'success' => true,
            'html'      => $returnHTML
        ]);
        echo json_encode($response_array);
    }
}
