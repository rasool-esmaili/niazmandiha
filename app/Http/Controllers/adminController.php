<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function showpost()
    {
        $agahi=Post::all()->where('verification',0);
        return view('pages.user',compact('agahi'));
    }
    public function verify($id)
    {
        $agahi=Post::find($id);
        $agahi->verification=true;
        $agahi->save();
        return redirect('user/admin/verify');
    }
    public function reject($id)
    {
        $agahi=Post::find($id);
        $agahi->verification=2;
        $agahi->save();
        return redirect('user/admin/verify');
    }


}
