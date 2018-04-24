<?php

namespace App\Http\Controllers\Perfume;

use App\Http\Controllers\Controller;
use Auth;

class AdminUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
}
