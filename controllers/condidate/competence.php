<?php
session_start();
require_once __DIR__.'/../functions.php';
allwedPages('condidate');
$user_id=(int)$_SESSION['condidate_id'];
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
    require __DIR__.'/../../core/Competance.php';
    $Competence=new Competance();
if($_SERVER['REQUEST_METHOD']==='GET'){

   $comptences=$Competence->getUserCompetances($user_id);
   echo json_encode($comptences);
   exit;
}

if($_SERVER['REQUEST_METHOD']==='DELETE'){

   if(!$Competence->ckeckUserCompetance($param,$user_id)){
    echo 0;
    exit;
   }
   
   echo $Competence->deleteUserCompetance($param,$user_id);
   exit;
}

if($_SERVER['REQUEST_METHOD']==='POST'){
   
     $competence_name=htmlspecialchars(trim($_POST['competence_name'])) ;
   
    if(!empty($competence_name)){
            $competence_id=$Competence->checkCompetance($competence_name)?$Competence->checkCompetance($competence_name)['competance_id']:false;
           if($competence_id){
            if(!$Competence->ckeckUserCompetance($competence_id,$user_id)){
            if(!$Competence->insertUserCompetance($competence_id,$user_id)){
                $errors['inserting']='database error';
            };}
           }
           else{
           if( $Competence->insertCompetance($competence_name)){
            $competence_id=$Competence->checkCompetance($competence_name)['competance_id'];
            if($competence_id){
                
             if(!$Competence->insertUserCompetance($competence_id,$user_id)){
                 $errors['inserting']='database error2';
             };
           }else{
            $errors['inserting']='database error1';
           }

          }
         }
        
    }
    if(empty($errors)){
          $competence_id=$Competence->checkCompetance($competence_name)['competance_id'];
        echo  $competence_id;
        exit;
    }else{
        echo 0;
        exit;
    }
    
}

if($_SERVER['REQUEST_METHOD']==='PUT'){
    parse_str( file_get_contents('php://input'),$_PUT);

$competence_name=htmlspecialchars(trim( $_PUT["competence_name"])) ;
$param= (int)$param;

if(!empty($competence_name)){
    // echo 'cN '. $competence_name;
       $competence_id=$Competence->checkCompetance($competence_name)?$Competence->checkCompetance($competence_name)['competance_id']:false;

       if($competence_id){

       if(!$Competence->updateUserCompetance($param,$user_id,$competence_id)){
           $errors['inserting']='database error';
       };
      }
      else{
      if( $Competence->insertCompetance($competence_name)){
       $competence_id=$Competence->checkCompetance($competence_name)['competance_id'];
      
       if($competence_id){
        // echo 'cID2 '. $competence_id;
       
        if(!$Competence->updateUserCompetance($param,$user_id,$competence_id)){
            $errors['inserting']='database error2';
        };
      }else{
       $errors['inserting']='database error1';
      }

     }
    }
   
}
if(empty($errors)){
     $competence_id=$Competence->checkCompetance($competence_name)['competance_id'];
   echo $competence_id;
   exit;
}else{
   echo 0;
   exit;
}

}   
}