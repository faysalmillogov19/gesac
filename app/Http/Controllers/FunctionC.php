<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FunctionC extends Controller
{
    public static function infos($data, $var){

        return compact('data', 'var');
    }

}
