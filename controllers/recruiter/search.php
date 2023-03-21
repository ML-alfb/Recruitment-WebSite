<?php
session_start();
require_once __DIR__.'/../functions.php';
allwedPages('recruiter');
$user_id=(int)$_SESSION['recruiter_id'];
if($_SERVER['REQUEST_METHOD']=='GET'){
    //####################### competance ##########################
    require __DIR__.'/../../core/Competance.php';
    $Competence=new Competance();
    if(!$competences=$Competence->getAllCompetances()){
        $competences=[];
    }
    if(!$Rcompetences=$Competence->getUserCompetances($user_id)){
        $Rcompetence='';
    }else{
        // print_r($Rcompetences);die;
        $Rcompetence=$Rcompetences[0]['competance_name'];
    }
    //##############################################################
    //####################### Domene ##########################
    require __DIR__.'/../../core/Domene.php';
    $Domene=new Domene();
    if(!$domenes=$Domene->getAllDomenes()){
        $domenes=[];
    }
    if(!$Rdomenes=$Domene->getUserDomenes($user_id)){
        $Rdomene='';
    }else{
        // print_r($Rcompetences);die;
        $Rdomene=$Rdomenes[0]['domene_name'];
    }
    //##############################################################
    //####################### Education ##########################
    require __DIR__.'/../../core/Education.php';
    $Education=new Education();
    if(!$educations=$Education->getAllEducations()){
        $educations=[];
    }
    if(!$Reducations=$Education->getUserEducation($user_id)){
        $Reducation='';
    }else{
        // print_r($Rcompetences);die;
        $Reducation=$Reducations[0]['education_name'];
    }
    //##############################################################
    //####################### expirience ##########################

    require __DIR__.'/../../core/Expirience.php';
    $Expirience=new Expirience();
    if(!$expiriences=$Expirience->getAllExpirience()){
        $expiriences=[];
    }
    if(!$RExpiriences=$Expirience->getUserExpiriences($user_id)){
        $Rexpirience='';
    }else{
        // print_r($RExpiriences);
        // die;
        $Rexpirience=$RExpiriences['expirience_years'];
        // echo $Rexpirience ;die;
    }

    //##############################################################

    require __DIR__.'/../../core/User.php';
    $User=new User();
    if(!$users=$User->getUsers($user_id)){
        $users=[];
    }else{
       
       
        for($i=0;$i< count($users);$i++){
            
            if( $i < count($users)-1){
                // echo $i;
                $score1= $users[$i]['expirience_years']*15 +  $users[$i]['competanceScore'];
                $score2= $users[$i+1]['expirience_years']*15 +  $users[$i+1]['competanceScore'];
     
                 if( $score2> $score1){
                  $userTemp=$users[$i];
                  $users[$i]=$users[$i+1];
                  $users[$i+1]=$userTemp;
                 } 
            }
          
        }
        // for($i=0;$i< count($users)  ;$i++){
        //     echo '<pre>';
        //       print_r($users[$i]);
        //       echo '</pre>';
              
        // }
       
    }

}








require __DIR__.'/../../views/recruiter/search.view.php';