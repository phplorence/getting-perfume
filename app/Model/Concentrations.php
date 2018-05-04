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
}
