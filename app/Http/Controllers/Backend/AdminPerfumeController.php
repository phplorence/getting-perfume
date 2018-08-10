<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Model\Perfumes;
use App\Utilize\Helper;
use Auth;
use Illuminate\Http\Request;
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
        $description = $request->description;
        $detail = $request->detail;
        $original_price = $request->original_price;
        $promotion_price = $request->promotion_price;
        $dore = $request->dore;
        $concentration = $request->concentration;
        $date_created = strftime("%Y-%m-%d %H:%M:%S", strtotime(strtr($request->date_created, '/', '-')));
        $date_created = $date_created == '1970-01-01 00:00:00' ? NULL : $date_created;
        $groupofincense = $request->incense;
        $style = $request->style;
        $bartender = $request->author;
        $status = $request->status;
        $count = $request->count;
        $typeofProduct = $request->typeperfume;
        $gender = $request->gender;
        $country = $request->country;
        $path_image = $target;
        $date_expiration = strftime("%Y-%m-%d %H:%M:%S", strtotime(strtr($request->date_expiration, '/', '-')));
        $date_expiration = $date_expiration == '1970-01-01 00:00:00' ? NULL : $date_expiration;

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

    public function show($id)
    {
        if($this->modelPerfume->getPerfume($id) != null) {
            $perfume = $this->modelPerfume->getPerfume($id);
            return json_encode(['perfume' => $perfume]);
        } else {
            alert()->error('Nước hoa đã không tồn tại trong hệ thống.', 'Lỗi!');
            return redirect()->intended(route('admin.perfume.index'));
        }
    }

    public function store(Request $request)
    {
        $image_path = '';
        if(!file_exists($_FILES['image']['tmp_name']) || !is_uploaded_file($_FILES['image']['tmp_name'])) {
        } else {
            $info = pathinfo($_FILES['image']['name']);
            $ext = $info['extension'];
            $newname = $request->name."_".time().$ext;
            $image_path = $newname;
            $target = 'perfume/' . $newname;
            move_uploaded_file($_FILES['image']['tmp_name'], $target);
        }
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
                if ($this->modelPerfume->addAll($this->getInfoPerfume($request, $image_path)) > 0) {
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

    public function delete($id_perfume) {
        if ($this->modelPerfume->deletePerfume($id_perfume) > 0) {
            $response_array = ([
                'perfume'      => [
                    'id'        =>  $id_perfume
                ],
                'message'       => [
                    'status'        => "success",
                    'description'   => "Xóa nước hoa thành công!"
                ]
            ]);
        } else {
            $response_array = ([
                'message'       => [
                    'status'        => "error",
                    'description'   => "Xóa nước hoa thất bại!"
                ]
            ]);
        }
        echo json_encode($response_array);
    }
}
