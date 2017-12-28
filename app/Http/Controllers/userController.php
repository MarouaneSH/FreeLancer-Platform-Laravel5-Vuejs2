<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class userController extends Controller
{
    public function index(){
        $users = DB::table("users")->get();
        return view('users.index',[
            "users"=>$users
        ]);
    }

    public function userProfile($id){
        $user = DB::table("users")->where('id','=',$id)->first();
        return view('users.userProfile',[
            "user"=>$user
        ]);
    }
}

