<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use View;


class MissionController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
       }


    public function index(){
        return view('missions.index');
    }
}
