<?php

namespace App\Http\Controllers;

use App\Estate;
use App\Post;
use Illuminate\Http\Request;

class ORMsearchcontroller extends Controller
{
    public function estrates (Request $request )
    {
        if(request()->rooms == ''){request()->rooms='*';}
        if(request()->rent_price == ''){request()->rent_price='*';}
        $posts = Post::whereHas('estate', function($query){$query
            ->where( request()->cat2 , '=', '1')
            ->where( request()->type , '=', '1')
            ->where( 'rooms',request()->rooms)
            ->where('rent_price',request()->rent_price)
        ;})
//            ->where('price','<',request()->maxprice)
//            ->where('price','>',request()->mixprice)
//            ->where('topic','LIKE','%'. request()->topic .'%')
            ->get();
        return $posts  ;
    }

     public function electronic ()
    {
        if(request()->brand == ''){request()->brand='*';}

        $posts = Post::whereHas('electronic', function($query){$query
            ->where( request()->cat_electronic , '=', '1')
            ->where( request()->type , '=', '1')
            ->where( 'brand',request()->brand)
        ;})
//            ->where('price','<',request()->maxprice)
//            ->where('price','>',request()->mixprice)
//            ->where('topic','LIKE','%'. request()->topic .'%')
            ->get();
        return $posts  ;
    }

     public function vehicle ()
    {
        if(request()->rooms == ''){request()->rooms='*';}
        if(request()->rent_price == ''){request()->rent_price='*';}
        
        $posts = Post::whereHas('vehicle', function($query){$query
            ->where( request()->cat_vehicle , '=', '1')
            ->where( request()->type , '=', '1')
            ->where( 'brand',request()->brand_car)
            ->where('kilometre',request()->kilometre)
            ->where('model',request()->model)
        ;})
//            ->where('price','<',request()->maxprice)
//            ->where('price','>',request()->mixprice)
//            ->where('topic','LIKE','%'. request()->topic .'%')
            ->get();
        return $posts  ;
    }












}
