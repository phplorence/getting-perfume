<?php

namespace App\Model;

use Illuminate\Http\Request;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

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

    public function insert(Request $request) {
        $username = $request->username;
        $password = $request->password;
        $user_type = $request->user_type;
        $email = $request->email;
        $fullname = $request->fullname;
    }
}
