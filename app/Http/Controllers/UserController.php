<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Userp5;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function index()
    {
        $users = Userp5::all();
        return view('user.index',compact(['users']));
    }

    public function searchUser(Request $request){
        $users = UserP5::where('name','LIKE','%'.$request->search.'%')->get();
        $nama = [];
        foreach($users as $key => $user){
            $nama[$key]['id'] = $user->id;
            $nama[$key]['text'] = $user->name;
        }
        // dd($users);
        return response()->json(['results' => $nama]);
    }
}
