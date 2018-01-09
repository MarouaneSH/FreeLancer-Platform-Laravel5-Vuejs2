<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class userController extends Controller
{
    public function index(){
        $users = DB::table("users")->get();
        return view('users.index',[
            "users"=>$users
        ]);
    }
    public function adduserRating(Request $req){
        $user = DB::table('user_ratings')
                ->insert([
                    "rated_user"=> $req->user,
                    "rater_user"=>Auth::user()->id,
                    "vote"=>$req->rating
                ]);

            return response()->json([
                "success"=>true
            ]);
    }
}

