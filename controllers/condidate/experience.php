<?php

session_start();
require_once __DIR__.'/../functions.php';
allwedPages('condidate');
$user_id=(int)$_SESSION['condidate_id'];
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
    require __DIR__.'/../../core/CondidatExperience.php';
    $CondidatExperience=new CondidatExperience();
    if($_SERVER['REQUEST_METHOD']==='GET'){

        require __DIR__.'/../../core/Expirience.php';
        $Expirience=new Expirience();
        if($Expirience->checkUserExpirience($user_id)){
            $ExperienceYears=$CondidatExperience->getUserExperience($user_id);
            $Expirience->updateUserExpirience($ExperienceYears['exp'],$user_id);
        }else{
            $Expirience->insertUserExpirience(1,$user_id);
        }
        $Experiences=$CondidatExperience->getCondidatExperience($user_id);
        echo json_encode($Experiences); 
        exit;
    }
    if($_SERVER['REQUEST_METHOD']==='POST'){
        $Data['company_name']=htmlspecialchars(trim($_POST['company_name'])) ;
        $Data['activity_area']=htmlspecialchars(trim($_POST['activity_area'])) ;
        $Data['end_date']=htmlspecialchars(trim($_POST['end_date'])) ;
        $Data['start_date']=htmlspecialchars(trim($_POST['start_date'])) ;
        $Data['user_id']=$user_id;
        $Data['role']=htmlspecialchars(trim($_POST['role'])) ;
      

        if($id=$CondidatExperience->insertCondidatExperience($Data)){
           
            echo $id;
            exit;
        }
       echo 0;
        exit;


    }
    if($_SERVER['REQUEST_METHOD']==='PUT'){

        parse_str( file_get_contents('php://input'),$_PUT);
        
        $Data['company_name']=htmlspecialchars(trim($_PUT['company_name'])) ;
        $Data['activity_area']=htmlspecialchars(trim($_PUT['activity_area'])) ;
        $Data['end_date']=htmlspecialchars(trim($_PUT['end_date'])) ;
        $Data['start_date']=htmlspecialchars(trim($_PUT['start_date'])) ;
        // $Data['user_id']=$user_id;
        $Data['role']=htmlspecialchars(trim($_PUT['role'])) ;
        $Data['id']=(int)$param;
        if($CondidatExperience->updateExperience($Data)){
           
            echo 1;
            exit;
        }
       echo 0;
        exit;


    }

    if($_SERVER['REQUEST_METHOD']==='DELETE'){
      $Data['id']=(int)$user_id;
   if(!$CondidatExperience->deleteExperience($Data)){
   
    echo 0;
    exit;
   }
   
   echo 1;
   exit;

    }
  

}