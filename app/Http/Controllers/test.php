<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class test extends Controller
{
    public function __construct(){
        $this->middleware('auth');
        
       }

       public function index(){
       
       }
}
