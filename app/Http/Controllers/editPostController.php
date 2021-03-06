<?php

namespace App\Http\Controllers;

use App\Estate;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class editPostController extends Controller
{
    public function delete($id)
    {
        $post=Post::find($id);
        $users = User::all();
        if(Gate::allows('edit-post',$post))
        {
            //delete bookmark this post from user
            foreach($users as $user) {
                if (strpos($user->mark_post, $post->id, 1)) {$user->mark_post = str_replace($post->id . ',', "", $user->mark_post);                $users->save();
                    $user->save();
                }
            }
            Storage::delete($post->photo);
            $post->delete();
            return redirect('user');
        }
        else{return view('pages.404');}
    }
    public function deletePhoto()
    {
        $id = request()->id ;
        $post = Post::find($id);
        if( Gate::allows('edit-post', $post))
        {
            $post->photo ="";
            return 'عکس حذف شد ';
        }
        else{return 'ooops';}
    }
    public function update(Request $r)
    {
        $post= Post::find($r->id);
        //update post table
        $post->topic = $r->topic ;
        $post->content = $r->content;
        $post->price = $r->price;
        $post->tel= $r->tel;
        $post->area= $r->area;
        $post->verification= 2;
        //update estate table

        if(Post::findOrFail($r->id)->estate()->get()!='[]')
        {
            $post->estate->rooms = $r->rooms ;
            $post->estate->rent_price = $r->rent_price ;
            $post->estate->save();
        }
        //update electronic table
        if(Post::findOrFail($r->id)->electronic()->get() !='[]')
        {
            $post->electronic->brand = $r->brand ;
        }
        //update vehicle table
        if(Post::findOrFail($r->id)->vehicle()->get()!='[]')
        {
            $post->vehicle->brand = $r->brand ;
            $post->vehicle->model = $r->model ;
            $post->vehicle->kilometre = $r->kilometre ;
            $post->vehicle->save();


        }
        $post->save();
        return Redirect::back() ;
    }
}
