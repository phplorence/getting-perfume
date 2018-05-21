<?php

namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class TypePerfumes extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'name'
    ];

    public function getAllTypePerfumes() {
        return DB::table('typeperfumes')->get();
    }

    public function addAll($data) {
        return DB::table('typeperfumes')->insert($data);
    }

    public function isExistTypePerfume($request) {
        $type_perfume = DB::table('typeperfumes')->where('name', '=', $request->name)->first();
        if ($type_perfume != null) {
            return true;
        }
        return false;
    }

    public function getTypePerfume($id_type_perfume){
        return DB::table('typeperfumes')->where('id', $id_type_perfume)->first();
    }

    public function isExistNameCaseUpdated($request, $name) {
        $typePerfume = DB::table('typeperfumes')
            ->where('name', '=', $name)
            ->where('id', '!=', $request->id)
            ->first();
        if ($typePerfume != null) {
            return true;
        }
        return false;
    }

    public function updateTypePerfume($data) {
        return DB::table('typeperfumes')
            ->where('id', $data[0]['id'])
            ->update([
                'name' => $data[0]['name']
            ]);
    }

    public function deleteTypePerfume($id_type_perfume) {
        return DB::table('typeperfumes')
            ->where('id', $id_type_perfume)
            ->delete();
    }
}