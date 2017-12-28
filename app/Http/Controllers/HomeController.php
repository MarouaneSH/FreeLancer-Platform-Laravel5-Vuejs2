<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mission = DB::table('missions')->get()->take(6);
        $user = DB::table('users')
                                ->take(5)
                                ->get();
        return view('home.index',[
            'users'=>$user,
            'missions'=>$mission
        ]);
    }
}
