<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SearchController extends Controller
{
    public function search(Request $r)
    {
        //validstion
        $rules=[
            'topic'     => 'string|max:50',
            'content'   =>'string',
            'area'      => 'string|max:30',

        ];
        $messages= [
            'string'=>':attribute: .باید متن وارد شود  ',
            'max'=>':attribute:   تعداد کاراکتر وارد شده برای این فیلد بیش از حد مجاز است ',
        ] ;
        $validator = Validator::make($r->all(), $rules, $messages);
        if ($validator->fails()) {
            return redirect('/new')
                ->withErrors($validator)
                ->withInput();
        }

        $agahi = Post::all()->where('verification',1);
        if($r->topic)
            return 'if ok';

        return view('home',compact('agahi'));
    }
}
