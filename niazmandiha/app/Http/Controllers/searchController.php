<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class searchController extends Controller
{
    public function search()
    {
//        if (request()->rooms = null) {request()->rooms = '*';}
//        if (request()->kilometre = null) {request()->kilometre = '*';}
//        if (request()->pricemax = null) {request()->pricemax = '*';}
//        if (request()->pricemin = null) {request()->pricemin = '*';}

        switch (request()->cat1)
        {
            case 'estates':
                switch (request()->cat2)
                {
                    case 'by-home':
                        $agahi = DB::table('posts')
                            ->join('estates', 'posts.id', '=', 'estates.post_id')
                            ->where(
                                'estates.sale', '=', true, 'AND',
                                'estates.home', '=', true, 'AND' ,
                                'estates.rooms', '=', request()->rooms
                            // 'posts.area', '=', request()->area, 'AND',
                            //        'estates.rent_price', '=', request()->rentprice
                            )
                            ->get();
                        return view('home', compact('agahi'));
                }
            case'electronics':
                $agahi = DB::table('posts')
                    ->join('electronics', 'posts.id', '=', 'electronics.post_id')
                    ->where('posts.price', '<=', request()->pricemax, 'AND',
                            'posts.price', '>=', request()->pricemin, 'AND',
                            'posts.area', '<=', request()->area, 'AND',
                            'electronics.brand', '=', request()->brand, 'AND'
                            )
                    ->get();
                return view('home', compact('agahi'));

            case'vehicles':
                $agahi = DB::table('posts')
                    ->join('vehicle', 'posts.id', '=', 'estates.post_id')
                    ->where('posts.price', '<=', request()->pricemax, 'AND',
                            'posts.price', '>=', request()->pricemin, 'AND',
                            'posts.area', '<=', request()->area, 'AND',
                            'vehicles.model', '=', request()->model, 'AND',
                            'vehicles.brand', '=', request()->brand, 'AND',
                            'vehicles.kilometre', '=', request()->kilometre, 'AND')
                    ->get();
                return view('home', compact('agahi'));


        }//end of switch

        return 'yaft mashod';

    }
}

//->leftjoin('electronics', 'posts.id', '=', 'electronics.post_id')
//->leftjoin('vehicles', 'posts.id', '=', 'vehicles.post_id')
//'vehicles.kilometre', '=', request()->kilometre, 'AND'