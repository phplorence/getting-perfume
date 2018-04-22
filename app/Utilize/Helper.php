<?php

namespace App\Utilize;

use App\Http\Controllers\Controller;
use Validator;
/**
 * Created by PhpStorm.
 * User: vuongluis
 * Date: 4/22/2018
 * Time: 3:10 PM
 */
class Helper extends Controller
{
    public function validateEmail($request) {
        $this->validate(
            $request,
            ['email' => 'required'],
            ['email.required' => 'Nhập email của bạn vào ô trống']
        );

        // This e-mail address is not valid
        $this->validate(
            $request,
            ['email' => 'email'],
            ['email.email' => 'Địa chỉ email này không hợp lệ']
        );
    }

    public function validatePassword($request) {
        $this->validate(
            $request,
            ['password' => 'required'],
            ['password.required' => 'Nhập mật khẩu của bạn vào ô trống']
        );

        // Passwords must be at least 10 characters
        $this->validate(
            $request,
            ['password' => 'required|min:6'],
            ['password.required' => 'Mật khẩu phải có ít nhất 6 ký tự']
        );
    }
}