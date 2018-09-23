<?php

namespace App\Http\Controllers\Gui\ImageSlider;

use App\Http\Controllers\Controller;

class ImageSliderController extends Controller
{
    public function index()
    {
        return view('gui.slide');
    }
}
