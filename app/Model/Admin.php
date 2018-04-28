<?php

namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
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

    public function addAll($data) {
        DB::table('admins')->insert($data);
    }

    public function existEmail($request) {
        $admin = DB::table('users')->where('email', '=', $request->email)->first();
        if ($admin == null) {
             $rules = [
                 'email_existed'    => 'Tài khoản đã tồn tại trong hệ thống'
             ];
             return Validator::make($request, $rules);
        }
    }

    public function existUsername() {

    }
}
