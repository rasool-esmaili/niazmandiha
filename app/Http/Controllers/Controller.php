<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function home ()
    {

       $agahi=Post::all()->where('verification', 1);
       return view('home', compact('agahi'));
    }




    public function user ()
    {
        $agahi=DB::table('posts')->where('user_id','=',Auth::id())->get();
        return view('pages.user', compact('agahi'));
    }

    public function getnewpost (){return view('pages.new');}

    public function show ($id)
        {
            //sabte akharin bazdid haye karbar
            // 2 halat darad ya login karde ya na

            if(Auth::check())
            {
                $user =User::find(Auth::id());
                if(strpos($user->recent_post,$id,1 )== false)
                {
                    $user->recent_post = $user->recent_post.$id."," ;
                    $user->save();
                }
            }
            

        $result = DB::table('posts')
            ->leftjoin('vehicles','posts.id','=', 'vehicles.post_id')
            ->leftjoin('electronics','posts.id','=', 'electronics.post_id')
            ->leftjoin('estates','posts.id','=', 'estates.post_id')
            ->where('posts.id','=',$id )
            ->get();
            return view('pages.show',compact('result','id'));

    }
    


}
