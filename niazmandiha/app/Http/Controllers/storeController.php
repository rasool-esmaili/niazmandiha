<?php

namespace App\Http\Controllers;

use App\Electronic;
use App\Estate;
use App\Post;
use App\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use PhpParser\Error;


class storeController extends Controller
{
    public function postnewpost ( Request $request)
    {
        //validstion
        $rules=[
            'topic'     => 'string|required|max:50',
            'contents'   =>'string|required',
            'rooms'     => 'numeric',
            'price'     => 'numeric|required',
            'email'     => 'email|required',
            'tel'       => 'string|required',
            'area'      => 'string|max:30',
            'photo'     => 'image',
        ];
        $messages= [
            'numeric'=>':attribute: .باید عدد وارد شود ',
            'string'=>':attribute: .باید متن وارد شود  ',
            'required'=>':attribute: وارد کردن این فیلد الزامی است . ',
            'image'=>':attribute: فایل بارگذاری شده باید عکس باشد . ',
            'max'=>':attribute:   تعداد کاراکتر وارد شده برای این فیلد بیش از حد مجاز است ',
        ] ;
        $validator = Validator::make($request->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect('/new')
                ->withErrors($validator)
                ->withInput();
        }


        $path=null;
        switch(request()->cat1)
        {
            case 'estates' :

                $rentprice = null;
                if (request()->rooms == '') {
                    request()->rooms = null;
                }
                switch (request()->cat2) {
                    case 'by-home' :
                        $fild1 = 'home';
                        $fild2 = 'sale';
                        break;
                    case 'rental-home' :
                        $fild1 = 'home';
                        $fild2 = 'rental';
                        break;
                    case 'by-shop' :
                        $fild1 = 'shop';
                        $fild2 = 'sale';
                        break;
                    case 'rental-shop' :
                        $fild1 = 'shop';
                        $fild2 = 'rental';
                        $rentprice = request()->rentprice;
                        break;
                    case 'villa' :
                        $fild1 = 'villa';
                        $fild2 = 'sale';
                        break;
                    default :
                        $cat ='دسته مورد نظر به درستی انتخاب نشده است';
                        return view('pages.new',compact('cat'));                }


                if ($request->file('photo') != null) {
                $path = request()->file('photo')->store('photo');}
                $post = new Post();
                $post->topic = request()->topic;
                $post->content = request()->contents;
                $post->price = request()->price;
                $post->tel = request()->tel;
                $post->area = request()->area;
                $post->user_id = Auth::id();
                $post->photo = $path;
                $post->save();
                $id = $post->id;

                $estate = new Estate();
                $estate->rooms = $request->rooms;
                $estate->rent_price = $rentprice;
                $estate->$fild1 = true;
                $estate->$fild2 = true;
                $estate->post_id = $id;
                $estate->save();

                return redirect('/user');
                break;

            case 'electronics' :


                if (request()->brand==''){$brand=null;}
                switch(request()->cat2)
                {
                    case 'mobile' :
                        $fild1 = 'mobile'; $brand = request()->brand ;
                        break;
                    case 'simcart' :
                        $fild1 = 'simcart'; $brand = request()->brand ;
                        break;
                    case 'computer' :
                        $brand=request()->brand ;
                        $fild1 = 'computer';
                        break;
                    case 'consol' :
                        $brand=request()->brand ;
                        $fild1 = 'consol'  ;
                        break;
                    case 'phone' :
                        $brand=request()->brand ;
                        $fild1 = 'phone';
                        break;
                    default :
                        $cat ='دسته مورد نظر به درستی انتخاب نشده است';
                        return view('pages.new',compact('cat'));                }

                if($request->file('photo')!=null){$path =request()->file('photo')->store('photo');}

                $post=new Post() ;
                $post->topic = request()->topic ;   $post->content = request()->contents ;
                $post->price = request()->price ;   $post->tel = request()->tel ;
                $post->area = request()->area ;     $post->user_id = Auth::id();
                $post->photo = $path ;
                $post->save();
                $id= $post->id ;

                $e= new Electronic();
                $e->brand = $brand ; $e->post_id=$id ; $e->$fild1 = true ; $e->save();
                return redirect('/user');
                break;

            case 'vehicles' :



                switch(request()->cat2)

                {
                    case 'car' :
                        $fild1 = 'car';
                        break;
                    case 'heavy-car' :
                        $fild1 = 'heavy_car';
                        break;
                    case 'car-part' :
                        $fild1 = 'car_part';
                        break;
                    case 'motor' :
                        $fild1 = 'motor'  ;
                        break;
                    case 'boat' :
                        $fild1 = 'boat';
                        break;
                    default :
                        $cat ='دسته مورد نظر به درستی انتخاب نشده است';
                        return view('pages.new',compact('cat'));
                }
                if($request->file('photo')!=null){$path =request()->file('photo')->store('photo');}
                $post=new Post() ;
                $post->topic = request()->topic ;   $post->content = request()->contents ;
                $post->price = request()->price ;   $post->tel = request()->tel ;
                $post->area = request()->area ;     $post->user_id = Auth::id();
                $post->photo = $path ;
                $post->save();
                $id= $post->id ;

                $v= new Vehicle();
                $v->vehicle_brand = request()->brand_car; $v->kilometre=request()->kilometre ; $v->model = request()->model ;
                $v->post_id=$id ; $v->$fild1 = true ; $v->save();
                return redirect('/user');

                break;

            default:
                $cat ='دسته مورد نظر به درستی انتخاب نشده است';
                return view('pages.new',compact('cat'));

        }
    }
}
