<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Storage;
use Validator;
use View;
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
        /* ORACLE
            SELECT COUNT(*) FROM  MISSION_USERS
            WHERE USER_ID  = $Authuser
        */

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
            "projectRealiser"=> $userProject,
            "userRating" => $userRating,
            "userSkill" => $userSkill,
            "userDiploma" => $userDiploma
        ]);
    }
    
    public function modifyPage(){
        //Utilisateur connecté
        $AuthUser =Auth::user();

        //Récupérer le nombre des missions réalisé par cet utilisateur
         $userProject = DB::table('MISSION_USERS')
                        ->where('USER_ID',$AuthUser->id)
                        ->count();
        /* ORACLE
            SELECT COUNT(*) FROM  MISSION_USERS
            WHERE USER_ID  = $Authuser
        */

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
        return view('profile.modify',[
            "projectRealiser"=> $userProject,
            "userRating" => $userRating,
            "userSkill" => $userSkill,
            "userDiploma" => $userDiploma
        ]);
    }


    public function logoutUser(){
        Auth::logout();
        return  redirect('/');
    }

    public function modifyProfile($data,Request $request){
        if($data == "userInfo") {
            $validator = Validator::make($request->all(), [
                'specialite' => 'required|max:255',
                'location' => 'required',
                'nom' => 'required',
                'prenom' => 'required',
            ]);
    
            if($validator->fails()){
                return response()->json([
                    "success"=> false,
                ]);
            }
            else{
                //Utilisateur connecté
                $utilisateur =Auth::user();
                DB::table('users')
                    ->where('id' ,'=' , $utilisateur->id)
                    ->update([
                            'nom' => $request->nom,
                            'prenom' => $request->prenom,
                            'location' => $request->location,
                            'specialite' => $request->specialite,
                            ]);
                  /*ORACLE
                    update table users set nom = $request->nom,
                                           prenom = $request->prenom,
                                           location = $request->location,
                                           speacilite = $request->speacilite,
                                           where id = $utilisateur
                  */
                
                 return response()->json([
                     "success"=> true,
                 ]);
            }
        }
        else if($data == "biographie") {
            $validator = Validator::make($request->all(), [
                'biographie' => 'required|max:255',
            ]);
    
            if($validator->fails()){
                return response()->json([
                    "success"=> false,
                ]);
            }
            else{
                //Utilisateur connecté
                $utilisateur =Auth::user();
                DB::table('users')
                    ->where('id' ,'=' , $utilisateur->id)
                    ->update([
                            'biographie' => $request->biographie,
                            ]);
                  /*ORACLE
                    update table users set biographie = $request->biographie,
                                           where id = $utilisateur
                  */
                
                 return response()->json([
                     "success"=> true,
                 ]);
            }
        }
        else if ($data == "skills") {
            $validator = Validator::make($request->all(), [
                'skill' => 'required|max:50',
            ]);
                
            if($validator->fails()){
                return response()->json([
                    "success"=> false,
                ]);
            }
            else{

                //Chercher dans la table skills if skill deja exist 
                $skill = DB::table('SKILLS')
                             ->select('skill_id')
                             ->where('skill_name' , '=' , $request->skill)
                             ->get();
                
                //Si la competence n'exist pas , creer un competence
                if($skill->count() == 0 ){
                   $insertSkill= DB::table('SKILLS')
                                 ->insert([
                                    'skill_name' => $request->skill, 
                                  ]);
                    
                    $skillID = DB::table('SKILLS')
                               ->select('skill_id')
                               ->where('skill_name', '=' , $request->skill)
                               ->get();
                    $skillID = $skillID[0]->skill_id;
                                                       
                }
                else {
                    //si la compétence exist 
                    $skillID =  $skill[0]->skill_id;
                }
                

                 //Utilisateur connecté
                 $utilisateur =Auth::user();

                //ajouter la compétence  a la table user_skill
                $addUserSkill = DB::table('USER_SKILLS')
                                   ->insert([
                                    'skill_id' => $skillID,  
                                    'user_id' => $utilisateur->id, 
                                   ]); 


                 return response()->json([
                     "success"=> true,
                 ]);
            }
        }
        else if($data == "diplome") {
             
            $validator = Validator::make($request->all(), [
                'diplomeName' => 'required|max:255',
                'annee' => 'required|max:255',
                'etablissement' => 'required|max:255',
            ]);
    
            if($validator->fails()){
                return response()->json([
                    "success"=> false,
                ]);
            }
            else{
                //Utilisateur connecté
                $utilisateur =Auth::user();
                DB::table('USER_DIPLOMAS')
                     ->insert([
                        'user_id' => $utilisateur->id,
                        'diploma_name' => $request->diplomeName,
                        'date_diploma' => $request->annee,
                        'etablissement' => $request->etablissement,
                     ]);
                  /*ORACLE
                    insert into USER_DIPLOMAS values ($request->diplomeName,$request->annee,$request->etablissmnet)
                  */
                
                 return response()->json([
                     "success"=> true,
                 ]);
            }
        }
    }
}
