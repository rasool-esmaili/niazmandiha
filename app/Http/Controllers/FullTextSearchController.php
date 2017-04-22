<?php

namespace App\Http\Controllers;

use App\Estate;
use App\Post;
use Illuminate\Http\Request;

class FullTextSearchController extends Controller
{
    public function search(){
        $agahi =Post::search(request()->search)->where('verification','1')->get();

        return view('home',compact('agahi'));
    }
}
