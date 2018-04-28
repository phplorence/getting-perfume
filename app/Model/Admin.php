<?php

namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;
use Validator;

class Admin extends Authenticatable
{
    use Notifiable;

    protected $guard = 'admin';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'password',
        'user_type',
        'email',
        'first_name',
        'last_name',
        'gender',
        'district',
        'address',
        'postcode',
        'active',
        'telephone',
        'path_image',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getAllAdmins() {
        return DB::table('admins')->get();
    }

    public function addAll($data) {
        return DB::table('admins')->insert($data);
    }

    public function isExistEmail($request) {
        $admin = DB::table('admins')->where('email', '=', $request->email)->first();
        if ($admin != null) {
            return true;
        }
        return false;
    }

    public function isExistUsername($request) {
        $admin = DB::table('admins')->where('username', '=', $request->username)->first();
        if ($admin != null) {
            return true;
        }
        return false;
    }
}
