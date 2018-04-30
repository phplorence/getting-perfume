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

    public function getAdminPaginations() {
        $admins = DB::table('admins')->paginate(20);
        return $admins;
    }

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

    public function isExistUsernameCaseUpdated($request, $username) {
        $admin = DB::table('admins')
            ->where('username', '=', $username)
            ->where('id', '!=', $request->id)
            ->first();
        if ($admin != null) {
            return true;
        }
        return false;
    }

    public function isExistEmailCaseUpdated($request, $email) {
        $admin = DB::table('admins')
            ->where('email', '=', $email)
            ->where('id', '!=', $request->id)
            ->first();
        if ($admin != null) {
            return true;
        }
        return false;
    }

    public function getAdmin($id_admin){
        return DB::table('admins')->where('id', $id_admin)->first();
    }

    public function getResultSearch($keySearch) {
        return DB::table('admins')->where('username','like','%'.$keySearch.'%')
            ->orWhere('full_name','like','%'.$keySearch.'%')
            ->paginate(20);
    }

    public function updateAdmin($data) {
        return DB::table('admins')
            ->where('id', $data[0]['id'])
            ->update([
                'username' => $data[0]['username'],
                'password' => $data[0]['password'],
                'user_type' => $data[0]['user_type'],
                'email' => $data[0]['email'],
                'full_name' => $data[0]['full_name'],
                'gender' => $data[0]['gender'],
                'address' => $data[0]['address'],
                'active' => $data[0]['active'],
                'phone_number' => $data[0]['phone_number']
                ]);
    }

    public function deleteAdmin($id_admin) {
        return DB::table('admins')
            ->where('id', $id_admin)
            ->delete();
    }
}
