<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Storage;

class ProfileController extends Controller
{
    public function __construct(){
     $this->middleware('auth');
    }

    public function index(){

        //Utilisateur connecté
        $AuthUser =Auth::user();

        //Récupérer le nombre des missions réalisé par cet utilisateur
         $userProject = DB::table('MISSION_USERS')
                        ->where('USER_ID',$AuthUser->id)
                        ->count();
        
        //Récupérer le nombre de vote (rating) pour cet utilisateur
         $userRating = DB::table('USER_RATINGS')
                      ->where('rated_user',$AuthUser->id)
                      ->avg('vote');

        //Récupérer les skills de cet utilisateur
         $userSkill = DB::table('USER_SKILLS')
                    ->join('SKILLS', 'USER_SKILLS.SKILL_ID', '=' , 'SKILLS.SKILL_ID')
                    ->where('USER_SKILLS.USER_ID',$AuthUser->id)
                    ->select('SKILLS.SKILL_NAME')
                    ->get();

        //Récupérer les diplomes de cet utilisateur
        $userDiploma = DB::table('USER_DIPLOMAS')
        ->where('USER_ID',$AuthUser->id)
        ->get();


        //Afficher la page profile
        return view('profile.index',[
            "user"=>$AuthUser,
            "projectRealiser"=> $userProject,
            "userRating" => $userRating,
            "userSkill" => $userSkill,
            "userDiploma" => $userDiploma
        ]);
    }
    
    public function modify(){
        //Utilisateur connecté
        $AuthUser =Auth::user();

        
        return view('profile.modify',[
            "user"=>$AuthUser,
        ]);
    }


    public function logoutUser(){
        Auth::logout();
        return  redirect('/');
    }
}
