<?php

namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class Concentrations extends Authenticatable
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
        'link'
    ];

    public function getAllConcentrations() {
        return DB::table('concentrations')->get();
    }

    public function isExistConcentration($request) {
        $concentration = DB::table('concentrations')->where('name', '=', $request->name)->first();
        if ($concentration != null) {
            return true;
        }
        return false;
    }

    public function addAll($data) {
        return DB::table('concentrations')->insert($data);
    }

    public function getConcentration($id_concentration){
        return DB::table('concentrations')->where('id', $id_concentration)->first();
    }

    public function getConcentrationByName($concentration_name){
        return DB::table('concentrations')->where('name', $concentration_name)->first();
    }

    public function isExistNameCaseUpdated($request, $name) {
        $concentration = DB::table('concentrations')
            ->where('name', '=', $name)
            ->where('id', '!=', $request->id)
            ->first();
        if ($concentration != null) {
            return true;
        }
        return false;
    }

    public function updateConcentration($data) {
        return DB::table('concentrations')
            ->where('id', $data[0]['id'])
            ->update([
                'name' => $data[0]['name'],
                'description' => $data[0]['description'],
                'detail' => $data[0]['detail'],
                'link' => $data[0]['link']
            ]);
    }

    public function deleteConcentration($id) {
        return DB::table('concentrations')
            ->where('id', $id)
            ->delete();
    }
}
