<?php
session_start();
require_once __DIR__.'/../functions.php';
allwedPages('recruiter');
$user_id=(int)$_SESSION['recruiter_id'];
// echo isset($param)?$param:'vfdvf';
$errors=[];
$msg='';


 
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){
if($_SERVER['REQUEST_METHOD']==='GET'){


   require __DIR__.'/../../core/Competance.php';
   $Competence=new Competance();
   $comptences=$Competence->getUserCompetances($user_id);
   echo json_encode($comptences);
   exit;
}

if($_SERVER['REQUEST_METHOD']==='DELETE'){

   echo 1;
   exit;
}
}
 


require  __DIR__.'/../../views/recruiter/home.view.php';