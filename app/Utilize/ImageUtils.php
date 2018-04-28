<?php
/**
 * Created by PhpStorm.
 * User: vuongluis
 * Date: 4/28/2018
 * Time: 6:45 PM
 */

namespace App\Utilize;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ImageUtils
{
    public function processsImageUpload(Request $request){
        if (Input::hasFile('avatar')) {
            $file = $request->avatar;
            echo '<img src"'.$file->getClientOriginalName().'"/>';
        } else {
            dd("No file");
        }
    }
}