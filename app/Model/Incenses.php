<?php

namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class Incenses extends Authenticatable
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

    public function getAllIncenses() {
        return DB::table('incenses')->get();
    }

    public function addAll($data) {
        return DB::table('incenses')->insert($data);
    }

    public function isExistIncense($request) {
        $incense = DB::table('incenses')->where('name', '=', $request->name)->first();
        if ($incense != null) {
            return true;
        }
        return false;
    }

    public function getIncense($id_incense){
        return DB::table('incenses')->where('id', $id_incense)->first();
    }

    public function isExistNameCaseUpdated($request, $name) {
        $concentration = DB::table('incenses')
            ->where('name', '=', $name)
            ->where('id', '!=', $request->id)
            ->first();
        if ($concentration != null) {
            return true;
        }
        return false;
    }

    public function updateIncense($data) {
        return DB::table('incenses')
            ->where('id', $data[0]['id'])
            ->update([
                'name' => $data[0]['name'],
                'description' => $data[0]['description'],
                'detail' => $data[0]['detail'],
                'link' => $data[0]['link']
            ]);
    }

    public function deleteIncense($id_incense) {
        return DB::table('incenses')
            ->where('id', $id_incense)
            ->delete();
    }
}
