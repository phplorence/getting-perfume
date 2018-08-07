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
            ['email.required' => 'Trường Email không được bỏ trống']
        );

        // This e-mail address is not valid
        $this->validate(
            $request,
            ['email' => 'regex:/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/'],
            ['email.regex' => 'Địa chỉ email này không hợp lệ']
        );
    }

    public function validatePassword($request) {
        $this->validate(
            $request,
            ['password' => 'required'],
            ['password.required' => 'Trường mật khẩu không được bỏ trống']
        );

        $this->validate(
            $request,
            ['password' => 'required|min:6'],
            ['password.min' => 'Mật khẩu phải có ít nhất 6 ký tự']
        );

        $this->validate(
            $request,
            ['password' => 'regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{6,}$/'],
            ['password.regex' => 'Mật khẩu không đủ mạnh (chứa ký tự in hoa, chữ số và ký tự đặc biệt)']
        );
    }

    public function validateConfirmationPassword($request) {
        $this->validate(
            $request,
            ['password_confirmation' => 'required'],
            ['password_confirmation.required' => 'Trường xác nhận mật khẩu không được bỏ trống']
        );
    }

    public function validateUsername($request) {
        $this->validate(
            $request,
            ['username' => 'required'],
            ['username.required' => 'Trường tên đăng nhập không được bỏ trống']
        );

        $this->validate(
            $request,
            ['username' => 'regex:/^[A-Za-z0-9]+(?:[ _-][A-Za-z0-9]+)*$/'],
            ['username.regex' => 'Tên đăng nhập chỉ có chữ cái in hoa, thường, ký tự gạch dưới và số']
        );
    }

    public function validateRadioGender($request) {
        $this->validate(
            $request,
            ['gender' => 'required|in:Nam,Nữ'],
            ['gender.required' => 'Vui lòng chọn giới tính']
        );
    }

    public function validRequiredFields($request) {
        $this->validate(
            $request,
            ['name' => 'required'],
            ['name.required' => 'Trường tên sản phẩm không được bỏ trống']
        );

        $this->validate(
            $request,
            ['description' => 'required'],
            ['description.required' => 'Trường mô tả sản phẩm không được bỏ trống']
        );
    }

    public function validateConcentrationName($request) {
        $this->validate(
            $request,
            ['name' => 'required'],
            ['name.required' => 'Tên nồng độ không được bỏ trống']
        );
    }

    public function validateIncenseName($request) {
        $this->validate(
            $request,
            ['name' => 'required'],
            ['name.required' => 'Tên nhóm hương không được bỏ trống']
        );
    }

    public function validatePerfumeName($request) {
        $this->validate(
            $request,
            ['name' => 'required'],
            ['name.required' => 'Tên nước hoa không được bỏ trống']
        );
    }

    public function validateStyleName($request) {
        $this->validate(
            $request,
            ['name' => 'required'],
            ['name.required' => 'Tên phong cách không được bỏ trống']
        );
    }

    public function validateAuthorName($request) {
        $this->validate(
            $request,
            ['name' => 'required'],
            ['name.required' => 'Tên nhà pha chế không được bỏ trống']
        );
    }

    public function validateTypePerfumeName($request) {
        $this->validate(
            $request,
            ['name' => 'required'],
            ['name.required' => 'Tên loại nước hoa không được bỏ trống']
        );
    }
}