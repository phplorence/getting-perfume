<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Perfumes;
use App\Utilize\Helper;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Yajra\DataTables\Facades\DataTables;

class AdminPerfumeController extends Controller
{

    protected $modelPerfume;
    protected $helper;

    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->modelPerfume = new Perfumes();
        $this->helper = new Helper();
    }

    public function index()
    {
        if (Auth::guest()){
            return redirect()->intended(route('admin.login'));
        } else {
            return view('admin.perfume.index');
        }
    }

    public function perfumeDataTables()
    {
        $perfumes = $this->modelPerfume->getAllPerfumes();
        Log::info($perfumes);
        $collections = collect();
        foreach ($perfumes as $perfume) {
            $arr = array(
                'id' => $perfume->id,
                'name' => $perfume->name,
                'original_price' => $perfume->original_price,
                'promotion_price' => $perfume->promotion_price,
                'dore' => $perfume->dore,
                'typeofProduct' => $perfume->typeofProduct,
                'status' => $perfume->status,
                'count' => $perfume->status,
                'path_image' => $perfume->path_image,
                'manipulation' => $perfume->id
            );
            $collections->push($arr);
        }
        return Datatables::collection($collections)->make();
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
