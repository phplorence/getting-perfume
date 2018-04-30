<?php

namespace App\Http\Controllers\Perfume;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminTablePerfumeController extends Controller
{
    //

    public function concentration() {
        return view('admin.tables.concentration');
    }
}
