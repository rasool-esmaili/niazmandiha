<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class userController extends Controller
{
    public function markpost()
    {
        $userid=$_REQUEST['userid'];
        if(Auth::check())
        {
            $user = User::find(Auth::id());
            if(strpos($user->mark_post,$userid,1))
            {
                $user->mark_post= str_replace($userid.',', "", $user->mark_post);
                $user->save();
                return 'bookmark-post' ;
            }
            else
            {
                $user->mark_post =$user->mark_post.$userid."," ;
                $user->save();
                return 'bookmark-post enable';
            }
        }
        elseif(session('markpost'))
        {
            $spi=session('markpost');
            if(strpos($spi,$userid))
            {
                session(['markpost'=> str_replace(','.$userid , "",$spi )]);
                return 'bookmark-post' ;
            }
            else
            {
                session(['markpost'=>$spi.','.$userid]);
                return 'bookmark-post enable' ;
            }

        }
        else
        {
            session(['markpost'=>'0,'.$userid.',']);
            return 'bookmark-post enable' ;
        }



    }

    public function showmarkpost()
    {

        $id=User::select('mark_post')->where('id',Auth::id())->get();
        $id= explode(',',$id );
        $agahi = Post::find($id);

        return view('pages.user',compact('agahi')) ;
    }
    public function recentlypost()
    {
        $id=User::select('recent_post')->where('id',Auth::id())->get();
        $id= explode(',',$id );
        $agahi = Post::find($id);

        return view('pages.user',compact('agahi')) ;
    }

    public function setting()
    {
        $user=User::find(Auth::id());
        return view('pages.usersetting',compact('user')) ;
    }
    public function updatesetting(Request $r)
    {
        if ($r->password == $r->password_confirmation)
        {
            $user=User::find(Auth::id());
            $user->name = $r->name;
            $user->email = $r->email;
            $user->password = bcrypt($r->password);
            $user->save();
            return redirect()->action('controller@user');
        }
    }
}
