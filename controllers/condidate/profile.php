<?php
session_start();
$condidatID=(int)$param;
$myProfile=false;

if(isset($_SESSION['condidate_id'])){

   $myProfile=$_SESSION['condidate_id']==$condidatID?true:false;
}


    require __DIR__.'/../../core/Condidat.php';
    $Condidat=new Condidat();
    if(!$Condidat->checkCondidat($condidatID)){
          header('location:/error');
    }
    require __DIR__.'/../../core/Competance.php';
    $Competence=new Competance();
    if(!$competences= $Competence->getUserCompetances($condidatID)){
          $competences=[];
    }
    require __DIR__.'/../../core/Formation.php';
    $Formation=new Formation();
    if(!$formations= $Formation->getFormations($condidatID)){
        $formations=[];
  }

   require __DIR__.'/../../core/User.php';
    $User=new User(); 
    if(!$user= $User->getUserInfo($condidatID)){
        $user=[];

}


if($_SERVER['REQUEST_METHOD']==='POST'){
      $uploadDir = __DIR__.'/../../public/profiles/';

    if( !empty($_FILES["image"]["error"]) && $_FILES["image"]["error"]==1){
      $errors='image size is too big';
     
    }else{

if(!empty($_FILES["image"]["name"])){ 
      $xt= explode( '.',basename($_FILES['image']['name']));
      $fileSavedAs=$xt[0].'-'.date("Y-m-d").'.'.$xt[count($xt)-1];
     $uploadfile = $uploadDir .$fileSavedAs ;
     
     if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {
         if($User->updateUserImage($condidatID,$fileSavedAs)){
            $user['img']=$fileSavedAs;
            // print_r($user);
      //     die;
     }
     }
 }
}   
 
  }

  




require  __DIR__.'/../../views/condidate/profile.view.php';