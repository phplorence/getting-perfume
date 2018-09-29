<?php

namespace App\Http\Controllers;

use App\Model\Perfumes;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    protected $modelPerfume;

    public function __construct()
    {
        $this->modelPerfume = new Perfumes();
    }

    public function index()
    {
        $hotPerfumes = $this->modelPerfume->getFourPerfumes();
        $newPerfumes = $this->modelPerfume->getNewPerfumes();
        return view('home', ['hotPerfumes'=>$hotPerfumes,'newPerfumes'=>$newPerfumes]);
    }

    public function home()
    {
        $hotPerfumes = $this->modelPerfume->getFourPerfumes();
        $newPerfumes = $this->modelPerfume->getNewPerfumes();
        $returnHTML = view('child.main')->with(compact('hotPerfumes', 'newPerfumes'))->render();
        $response_array = ([
            'success' => true,
            'html' => $returnHTML
        ]);
        echo json_encode($response_array);
    }

}
