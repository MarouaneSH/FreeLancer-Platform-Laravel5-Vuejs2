<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use View;
use DB;
use Validator;
use Carbon\Carbon;

class MissionController extends Controller
{

    public function __construct(){
       
       }


    public function index(){
        $listeCategorie = DB::table('categories')
                         ->select('categorie_name')
                         ->get();
        $listeMission = DB::table('missions')
                         ->orderby('mission_id','DESC')
                         ->get();

        return view('missions.index',[
            "categories" => $listeCategorie,
            "missions" => $listeMission,
        ]);
    }

    public function searchMission(Request $req){
        $query = array();
        if($req->has('minBudget')){
            $query[] = ["min_budget",">=",$req->minBudget];
        }
        
       if($req->has('maxBudget')){
            $query[] = ["max_budget","<=",$req->maxBudget];
        }

        if($req->has('categorie')){
           $categorie = DB::table("categories")->where('categorie_name','=',$req->categorie)->first();
           $query[] = ["categorie_id","=",$categorie->categorie_id];
        }

        if(!$req->distance || !$req->place)
        {
            if($req->distance){
                $query[] = ["type_mission","=","distance"];
            }
            else {
                $query[] = ["type_mission","=","Sur Place"];
            }
        }
        
        $mission = DB::table('missions')
                            ->where($query)
                            ->orderby('mission_id','DESC')
                            ->get();
        
        $listeCategorie = DB::table('categories')
                         ->select('categorie_name')
                         ->get();
        return view('missions.index',[
            "categories" => $listeCategorie,
            "missions" => $mission,
        ]);
    }

    public function singleMissionPage($id){
       
        $listeMission = DB::table('missions')
                         ->where('mission_id' , '=' ,$id)
                         ->get();

       return view('missions.singleMission',[
            "mission" => $listeMission[0],
        ]);
    }

    public function addMissionPage(){
        $listeCategorie = DB::table('categories')
                         ->select('categorie_name')
                         ->get();

        return view('missions.addMission',[
            "categories" => $listeCategorie
        ]);
    }

    public function demandeDevis(Request $request){
       DB::table('devis')->insert([
           "mission_id" => $request->missionId,
           "user_id" => $request->userId,
           "prix_demander" => $request->prix,
           "commentaires" => $request->message,
           "tel" => $request->tel
       ]);

       return response()->json([
            "success"=> true,
        ]);  

    }

    public function addMission(Request $request){
       
        $validator = Validator::make($request->all(), [
            'nameMission' => 'required|max:255',
            'categorie' => 'required',
            'description' => 'required',
            'minBudget' => 'required',
            'maxBudget' => 'required',
            'duree' => 'required',
            'type' => 'required',
        ]);
        if($validator->fails()){
            return response()->json([
                "success"=> false,
                "errors"=> $validator->errors()
            ]);
        }else{
             //Utilisateur connecté
             $utilisateur =Auth::user();


            
          
             $categorieId = DB::table('categories')
                            ->where('categorie_name' , "=" ,  $request->categorie)
                            ->get();


            DB::table('missions')
                    ->insert([
                        "mission_owner" =>  $utilisateur->id,
                        "categorie_id" =>  $categorieId[0]->categorie_id,
                        "titre_mission" =>  $request->nameMission,
                        "description_mission" =>  $request->description   ,
                        "min_budget" =>  $request->minBudget,
                        "max_budget" =>  $request->maxBudget,
                        "duree_mission" =>   $request->duree,
                        "type_mission" => $request->type,
                        "date_publication" => Carbon::today(),
                        "mission_status" => "incomplète",
                    ]);
            
                 $missionId = DB::table('missions')
                              ->orderby("mission_id" , "DESC")
                              ->take(1)
                              ->get();

                 //inserrer SKILLS
             if($request->skills){
                foreach($request->skills as $skillName){
                    //Chercher dans la table skills if skill deja exist 
                    $skill = DB::table('SKILLS')
                                ->select('skill_id')
                                ->where('skill_name' , '=' , $skillName)
                                ->get();
                    
                    //Si la competence n'exist pas , creer un competence
                    if($skill->count() == 0 ){
                            $insertSkill= DB::table('SKILLS')
                                            ->insert([
                                                'skill_name' => $skillName, 
                                            ]);
                                
                                $skillID = DB::table('SKILLS')
                                        ->select('skill_id')
                                        ->where('skill_name', '=' , $skillName)
                                        ->get();
                                $skillID = $skillID[0]->skill_id;
                                                        
                    }
                    else {
                        //si la compétence exist 
                        $skillID =  $skill[0]->skill_id;
                    }

                    DB::table('mission_skills')->insert([
                        'skill_id'=>  $skillID,
                        "mission_id" => $missionId[0]->mission_id,
                    ]);
                }
            }

                    return response()->json([
                        "success"=> true,
                    ]);         
        }
    }
}
