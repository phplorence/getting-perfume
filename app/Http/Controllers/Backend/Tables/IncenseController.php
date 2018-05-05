<?php

namespace App\Http\Controllers\Backend\Tables;

use App\Http\Controllers\Controller;
use App\Model\Incenses;
use App\Utilize\Helper;
use Auth;
use Yajra\DataTables\Facades\DataTables;

class IncenseController extends Controller
{

    protected $modelIncense;
    protected $helper;

    public function __construct()
    {
        $this->middleware('auth:admin');
        $this->modelIncense = new Incenses();
        $this->helper = new Helper();
    }

    public function index()
    {
        if (Auth::guest()){
            return redirect()->intended(route('admin.login'));
        } else {
            return view('admin.tables.incense.index');
        }
    }

    public function incenseDataTables(){
        $incenses = $this->modelIncense->getAllIncenses();
        $collections = collect();
        foreach ($incenses as $incense){
            $arr = array(
                /**
                 * From server: Name of object is Name of table in database Laravel
                 */
                'id' => $incense->id,
                'name'    => $incense->name,
                'description'   => $incense->description,
                'detail'   => $incense->detail,
                'link' => $incense->link,
                'manipulation' => $incense->id
            );
            $collections->push($arr);
        }
        return Datatables::collection($collections)->make();
    }
}
