<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddAdminController extends Controller
{
    public function showuser()
    {
        $users=User::all();

       return view('pages.AddAdmin',compact('users'));
    }


    public function addadmin($id)
    {
        $user=User::find($id);
        $user->admin=1;
        $user->save();
        return redirect('/user/superadmin/addadmin');
    }
}
