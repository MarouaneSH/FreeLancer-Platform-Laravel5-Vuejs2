<?php


//Creer un nouveu utilisateur
function ajouterFreelancer($data){
    $query = "INSERT into users values($data[nom] ,$data[prenom] ,$data[email] ,$data[password] )";
    $qeury->execute();
}

//Selectionner le nombres des Missions
function selectionnerNombreMission($user){
    return "SELECT COUNT(*) FROM  MISSION_USERS
                  WHERE USER_ID  = $user->id";
}

//sELECTIONER LES COMPETENCES
function selectionnerSkills($user){
     return "SELECT S.skill_name from skills S , User_skills U
             where S.skill_id = U.skill_id
             and U.user_id = $user->id";
}

// selectionner rating
function selectionnerRating($user){
    return "SELECT AVG(vote) from USER_RATING
                              where user_id = $user->id";
}


//Ajouter une mission
function ajouterMission($data){
    $categorieId="SELECT categorie_ID from categories
                 WHERE caregorie_name= $data[categorie_name]";
    

    //table des Skill ID
    $skill_IDS = array();
    //chercher si la compétence exist
    foreach($data[skill] as $skillNom){
            $skill = "SELECT * from skill
                      where skill_name = $skillNom";
            
            //If skill exist 
            if($skil->count() > 0){
                $skill_IDS += $skill->id;
            }
            else{// si la competence n'exist pas / creer un nouveaux SKILL
                 $query ="INSERT into SKILL values($skillNom)";
                 $query->execute();
                 $skill_IDS += $query->id;
            }
    }

    //inserter a mission
    $query = "INSERT into MISSIONS value($data[userId],$categorieId,$data[description],$data[type],$data[min_budget],$data[max_budget])";
    //Apres que les competences ont été creer , on doit inserer a la table Mission_skill
    foreach($skill_IDS as $skill_id){
        $query = "INSERT INTO MISSION_SKILL values($data[mission_id],$skill_id)";
        $query->execute();
    }

    
}