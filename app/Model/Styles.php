<?php

namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class Styles extends Authenticatable
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

    public function getAllStyles() {
        return DB::table('styles')->get();
    }

    public function addAll($data) {
        return DB::table('styles')->insert($data);
    }

    public function isExistStyle($request) {
        $incense = DB::table('styles')->where('name', '=', $request->name)->first();
        if ($incense != null) {
            return true;
        }
        return false;
    }

    public function getStyle($id_style){
        return DB::table('styles')->where('id', $id_style)->first();
    }

    public function isExistNameCaseUpdated($request, $name) {
        $concentration = DB::table('styles')
            ->where('name', '=', $name)
            ->where('id', '!=', $request->id)
            ->first();
        if ($concentration != null) {
            return true;
        }
        return false;
    }

    public function updateStyle($data) {
        return DB::table('styles')
            ->where('id', $data[0]['id'])
            ->update([
                'name' => $data[0]['name'],
                'description' => $data[0]['description'],
                'detail' => $data[0]['detail'],
                'link' => $data[0]['link']
            ]);
    }

    public function deleteStyle($id_style) {
        return DB::table('styles')
            ->where('id', $id_style)
            ->delete();
    }
}