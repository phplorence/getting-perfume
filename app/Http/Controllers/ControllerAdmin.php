<?php
/**
 * Created by PhpStorm.
 * User: vuongluis
 * Date: 4/21/2018
 * Time: 1:35 PM
 */

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;

class ControllerAdmin extends BaseController
{
    public function index(){
        return 'Controller Admin';
    }
}