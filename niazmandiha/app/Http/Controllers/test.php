<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class test extends Controller
{

    public function showtest()
    {
        return view('test');
    }

    public function test()
    {
        return request()->file('photo');
    }

}
