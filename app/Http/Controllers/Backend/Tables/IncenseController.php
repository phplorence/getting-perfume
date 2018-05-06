<?php

namespace App\Http\Controllers\Backend\Tables;

use App\Http\Controllers\Controller;
use App\Model\Incenses;
use App\Utilize\Helper;
use Illuminate\Http\Request;
use Auth;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Log;

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

    public function store(Request $request)
    {
        $this->helper->validateIncenseName($request);
        // Insert database into mysql
        if($this->modelIncense->isExistIncense($request)) {
            alert()->error('Tên nhóm hương đã tồn tại trong hệ thống.', 'Lỗi!');
            return redirect()->back()->withInput($request->only('name', 'description', 'detail', 'link'));
        }

        // Attempt add new database successfully
        if ($this->modelIncense->addAll($this->getInfoIncense($request)) > 0) {
            // If successful, then redirect to their intended location
            alert()->success('Thêm nhóm hương thành công.', 'Thông tin!');
            return redirect()->intended(route('admin.perfume.incense.index'));
        } else {
            alert()->error('Thêm nhóm hương thất bại.', 'Lỗi!');
            return redirect()->back()->withInput($request->only('name', 'description', 'detail', 'link'));
        }
    }

    public function getInfoIncense(Request $request) {
        $name = $request->name;
        Log::info('Admin', ['name' => $name]);
        $description = $request->description;
        Log::info('Admin', ['description' => $description]);
        $detail = $request->detail;
        Log::info('Admin', ['detail' => $detail]);
        $link = $request->link;
        Log::info('Admin', ['link' => $link]);
        if (empty($request->id)) {
            $data = array([
                'name' => $name,
                'description' => $description,
                'detail' => $detail,
                'link' => $link
            ]);
        } else {
            $data = array([
                'id' => $request->id,
                'name' => $name,
                'description' => $description,
                'detail' => $detail,
                'link' => $link
            ]);
        }
        return $data;
    }
}
