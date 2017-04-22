<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class categoriesController extends Controller
{


    public function categories($what)
    {
        switch ($what) {
            case 'by-home' :
                $agahi = DB::table('posts')->join('estates', 'posts.id', '=', 'estates.post_id')->where('estates.sale', '=', '1')->where('estates.home', '=', '1')->get();
                return view('home', compact('agahi'));
                break;
            case 'rental-home' :
                $agahi = DB::table('posts')->join('estates', 'posts.id', '=', 'estates.post_id')->where('estates.rental', '=', '1')->where('estates.home', '=', '1')->get();
                return view('home', compact('agahi'));
                break;
            case 'by-shop' :
                $agahi = DB::table('posts')->join('estates', 'posts.id', '=', 'estates.post_id')->where('estates.sale', '=', '1')->where('estates.shop', '=', '1')->get();
                return view('home', compact('agahi'));
                break;
            case 'rental-shop' :
                $agahi = DB::table('posts')->join('estates', 'posts.id', '=', 'estates.post_id')->where('estates.rental', '=', '1')->where('estates.shop', '=', '1')->get();
                return view('home', compact('agahi'));
                break;
            case 'villa' :
                $agahi = DB::table('posts')->join('estates', 'posts.id', '=', 'estates.post_id')->where('estates.villa', '=', '1')->get();
                return view('home', compact('agahi'));
                break;


            case 'mobile&tablet' :
                $agahi = DB::table('posts')->join('electronics', 'posts.id', '=', 'electronics.post_id')->where('electronics.mobile', '=', '1')->get();
                return view('home', compact('agahi'));
                break;
            case 'computer' :
                $agahi = DB::table('posts')->join('electronics', 'posts.id', '=', 'electronics.post_id')->where('electronics.computer', '=', '1')->get();
                return view('home', compact('agahi'));
                break;
            case 'simcart' :
                $agahi = DB::table('posts')->join('electronics', 'posts.id', '=', 'electronics.post_id')->where('electronics.computer', '=', '1')->get();
                return view('home', compact('agahi'));
                break;
            case 'multimedia' :
                $agahi = DB::table('posts')->join('electronics', 'posts.id', '=', 'electronics.post_id')->where('electronics.multimedia', '=', '1')->get();
                return view('home', compact('agahi'));
                break;
            case 'consol' :
                $agahi = DB::table('posts')->join('electronics', 'posts.id', '=', 'electronics.post_id')->where('electronics.consol', '=', '1')->get();
                return view('home', compact('agahi'));
                break;
            case 'phone' :
                $agahi = DB::table('posts')->join('electronics', 'posts.id', '=', 'electronics.post_id')->where('electronics.phone', '=', '1')->get();
                return view('home', compact('agahi'));
                break;

            case 'car' :
                $agahi=DB::table('posts')->join('vehicles','posts.id','=','vehicles.post_id')->where('vehicles.car','=','true')->get();
                return view('home',compact('agahi'));
            case 'car-part' :
                $agahi=DB::table('posts')->join('vehicles','posts.id','=','vehicles.post_id')->where('vehicles.car_part','=','true')->get();
                return view('home',compact('agahi'));
            case 'motor' :
                $agahi=DB::table('posts')->join('vehicles','posts.id','=','vehicles.post_id')->where('vehicles.motor','=','true')->get();
                return view('home',compact('agahi'));
            case 'boat' :
                $agahi=DB::table('posts')->join('vehicles','posts.id','=','vehicles.post_id')->where('vehicles.boat','=','true')->get();
                return view('home',compact('agahi'));
            case 'heavy_car' :
                $agahi=DB::table('posts')->join('vehicles','posts.id','=','vehicles.post_id')->where('vehicles.heavy_car','=','true')->get();
                return view('home',compact('agahi'));
            default :
                return "no wey";


        }
    }
}