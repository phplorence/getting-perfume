<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Perfumes;
use App\Utilize\Helper;
use Auth;
use DateTime;
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
        if (Auth::guest()) {
            return redirect()->intended(route('admin.login'));
        } else {
            return view('admin.perfume.index');
        }
    }

    public function perfumeDataTables()
    {
        $perfumes = $this->modelPerfume->getAllPerfumes();
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
        if (Auth::guest()) {
            return redirect()->intended(route('admin.login'));
        } else {
            return view('admin.perfume.create');
        }
    }

    public function getInfoPerfume(Request $request, $target)
    {
        $name = $request->name;
        Log::info($name);
        $description = $request->description;
        Log::info($description);
        $detail = $request->detail;
        Log::info($detail);
        $original_price = $request->original_price;
        Log::info($original_price);
        $promotion_price = $request->promotion_price;
        Log::info($promotion_price);
        $dore = $request->dore;
        Log::info($dore);
        $concentration = $request->concentration;
        Log::info($concentration);
        $date_created = strftime("%Y-%m-%d %H:%M:%S", strtotime(strtr($request->date_created, '/', '-')));
        $date_created = $date_created == '1970-01-01 00:00:00' ? NULL : $date_created;
        Log::info($date_created);
        $groupofincense = $request->groupofincense;
        Log::info($groupofincense);
        $style = $request->style;
        Log::info($style);
        $bartender = $request->author;
        Log::info($bartender);
        $status = $request->status;
        Log::info($status);
        $count = $request->count;
        Log::info($count);
        $typeofProduct = $request->typeperfume;
        Log::info($typeofProduct);
        $gender = $request->gender;
        Log::info($gender);
        $country = $request->country;
        Log::info($country);
        $path_image = $target;
        Log::info($path_image);
        $date_expiration = strftime("%Y-%m-%d %H:%M:%S", strtotime(strtr($request->date_expiration, '/', '-')));
        $date_expiration = $date_expiration == '1970-01-01 00:00:00' ? NULL : $date_expiration;
        Log::info($date_expiration);

        if (empty($request->id)) {
            $data = array([
                'name' => $name == NULL ? '': $name,
                'description' => $description == NULL ? '' : $description,
                'detail' => $detail == NULL ? '' : $detail,
                'original_price' => $original_price == NULL ? '' : $original_price,
                'promotion_price' => $promotion_price == NULL ? '' : $promotion_price,
                'dore' => $dore == NULL ? '' : $dore,
                'concentration' => $concentration,
                'date_created' => $date_created,
                'groupofincense' => $groupofincense == NULL ? '' : $groupofincense,
                'style' => $style == NULL ? '' : $style,
                'bartender' => $bartender,
                'status' => $status,
                'count' => $count == NULL ? 0 : $count,
                'typeofProduct' => $typeofProduct,
                'gender' => $gender,
                'country' => $country,
                'path_image' => $path_image,
                'date_expiration' => $date_expiration
            ]);
        } else {
            $data = array([
                'id' => $request->id,
                'name' => $name,
                'description' => $description,
                'detail' => $detail,
                'original_price' => $original_price,
                'promotion_price' => $promotion_price,
                'dore' => $dore,
                'concentration' => $concentration,
                'date_created' => $date_created,
                'groupofincense' => $groupofincense,
                'style' => $style,
                'bartender' => $bartender,
                'status' => $status,
                'count' => $count,
                'typeofProduct' => $typeofProduct,
                'gender' => $gender,
                'country' => $country,
                'path_image' => $path_image,
                'date_expiration' => $date_expiration
            ]);
        }
        return $data;
    }

    public function store(Request $request)
    {
        $target = '';
        if ($_FILES['image']['size'] != 0 && $_FILES['image']['error'] != 0) {
            $info = pathinfo($_FILES['image']['name']);
            $ext = $info['extension'];
            $newname = "newname." . $ext;

            $target = 'perfume/' . $newname;
            move_uploaded_file($_FILES['image']['tmp_name'], $target);
        }
        Log::info($target);
        if ($this->helper->validatePerfumeName($request)) {
            $response_array = ([
                'message' => [
                    'status' => "invalid",
                    'description' => "Tên nước hoa không được bỏ trống!"
                ]
            ]);
        } else {
            if ($this->modelPerfume->isExistIncense($request)) {
                $response_array = ([
                    'message' => [
                        'status' => "existed",
                        'description' => "Tên nước hoa đã tồn tại trong hệ thống!"
                    ]
                ]);
            } else {
                if ($this->modelPerfume->addAll($this->getInfoPerfume($request, $target)) > 0) {
                    $response_array = ([
                        'perfume' => $this->modelPerfume->getPerfumeByName($request->name),
                        'message' => [
                            'status' => "success",
                            'description' => "Thêm nước hoa thành công!"
                        ]
                    ]);
                } else {
                    $response_array = ([
                        'message' => [
                            'status' => "error",
                            'description' => "Thêm nhóm hương thất bại!"
                        ]
                    ]);
                }
            }
        }
        echo json_encode($response_array);
    }
}
