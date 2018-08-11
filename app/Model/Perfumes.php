<?php

namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class Perfumes extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'description',
        'detail',
        'original_price',
        'promotion_price',
        'dore',
        'concentration',
        'date_created',
        'groupofincense',
        'style',
        'bartender',
        'status',
        'count',
        'typeofProduct',
        'gender',
        'country',
        'path_image',
        'date_expiration'
    ];

    public function addAll($data) {
        return DB::table('perfumes')->insert($data);
    }

    public function getAllPerfumes() {
        return DB::table('perfumes')->get();
    }

    public function isExistIncense($request) {
        $perfume = DB::table('perfumes')->where('name', '=', $request->name)->first();
        if ($perfume != null) {
            return true;
        }
        return false;
    }

    public function getPerfume($id_perfume){
        return DB::table('perfumes')->where('id', $id_perfume)->first();
    }

    public function getPerfumeByName($perfume_name){
        return DB::table('perfumes')->where('name', $perfume_name)->first();
    }

    public function isExistNameCaseUpdated($request, $name) {
        $perfume = DB::table('perfumes')
            ->where('name', '=', $name)
            ->where('id', '!=', $request->id)
            ->count();
        if ($perfume > 0) {
            return true;
        }
        return false;
    }

    public function updatePerfume($data) {
        return DB::table('perfumes')
            ->where('id', $data[0]['id'])
            ->update([
                'name' => $data[0]['name'],
                'description' => $data[0]['description'],
                'detail' => $data[0]['detail'],
                'original_price' => $data[0]['original_price'],
                'promotion_price' => $data[0]['promotion_price'],
                'dore' => $data[0]['dore'],
                'concentration' => $data[0]['concentration'],
                'date_created' => $data[0]['date_created'],
                'groupofincense' => $data[0]['groupofincense'],
                'style' => $data[0]['style'],
                'bartender' => $data[0]['bartender'],
                'status' => $data[0]['status'],
                'count' => $data[0]['count'],
                'typeofProduct' => $data[0]['typeofProduct'],
                'gender' => $data[0]['gender'],
                'country' => $data[0]['country'],
                'path_image' => $data[0]['path_image'],
                'date_expiration' => $data[0]['date_expiration']
            ]);
    }

    public function deletePerfume($id_perfume) {
        return DB::table('perfumes')
            ->where('id', $id_perfume)
            ->delete();
    }
}

