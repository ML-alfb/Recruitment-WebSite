<?php

session_start();
require_once __DIR__.'/../functions.php';
allwedPages('condidate');
$user_id=(int)$_SESSION['condidate_id'];
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
    require __DIR__.'/../../core/Formation.php';
    $Formation=new Formation();
    if($_SERVER['REQUEST_METHOD']==='GET'){

        $formations=$Formation->getFormations($user_id);
        echo json_encode($formations);
       
        exit;


    }
    if($_SERVER['REQUEST_METHOD']==='POST'){
        $formationData['formation_deplome']=htmlspecialchars(trim($_POST['formation_deplome'])) ;
        $formationData['formation_ecole']=htmlspecialchars(trim($_POST['formation_ecole'])) ;
        $formationData['formation_endedAt']=htmlspecialchars(trim($_POST['formation_endedAt'])) ;
        $formationData['formation_startedAt']=htmlspecialchars(trim($_POST['formation_startedAt'])) ;
        $formationData['user_id']=$user_id;
        $formationData['formation_domene']=htmlspecialchars(trim($_POST['formation_domene'])) ;
        if(!empty($formationData['formation_domene'])){
            require __DIR__.'/../../core/Domene.php';
            $Domene=new Domene();
            $Domene->checkDomene($formationData['formation_domene']);
            $domene_id=$Domene->checkDomene($formationData['formation_domene'])?$Domene->checkDomene($formationData['formation_domene'])['domene_id']:false;
            if($domene_id){
             if(!$Domene->ckeckUserDomene($domene_id,$user_id)){
             if(!$Domene->insertUserDomenes($domene_id,$user_id)){
                 $errors['inserting']='database error5';
             };}
            }
            else{
            if( $Domene->insertDomene( $formationData['formation_domene'])){
             $domene_id=$Domene->checkDomene( $formationData['formation_domene'])['domene_id'];
             if($domene_id){
                 
              if(!$Domene->insertUserDomenes($domene_id,$user_id)){
                  $errors['inserting']='database error4';
              };
            }else{
             $errors['inserting']='database error6';
            }
     
           }
          }
        }

       //session['user_id']
        if($id=$Formation->insertFormation($formationData)){

            echo $id;
            exit;
        }
       echo 0;
        exit;


    }
    if($_SERVER['REQUEST_METHOD']==='PUT'){

        parse_str( file_get_contents('php://input'),$_PUT);
        $formationData['formation_deplome']=htmlspecialchars(trim($_PUT['formation_deplome'])) ;
        $formationData['formation_domene']=htmlspecialchars(trim($_PUT['formation_domene'])) ;
        $formationData['formation_ecole']=htmlspecialchars(trim($_PUT['formation_ecole'])) ;
        $formationData['formation_endedAt']=htmlspecialchars(trim($_PUT['formation_endedAt'])) ;
        $formationData['formation_startedAt']=htmlspecialchars(trim($_PUT['formation_startedAt'])) ;
        // $formationData['user_id']=15;//session['user_id']
        $formationData['formation_id']=(int)$param;
        if($Formation->updateFormation($formationData)){

            echo 1;
            exit;
        }
       echo 0;
        exit;


    }

    if($_SERVER['REQUEST_METHOD']==='DELETE'){
      $formationID=(int)$param;
   if(!$Formation->deleteFormation($formationID)){
    echo 0;
    exit;
   }
   
   if($Formation->checkFormation($formationID)){
    echo 0;
    exit;
   }
   echo 1;
   exit;

    }

}