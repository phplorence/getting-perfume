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
}
