<?php

session_start();
$user_id=(int)$_SESSION['recruiter_id'];
$errors=[];
$msg='';

if($_SERVER['REQUEST_METHOD']==='POST'){

   if(isset($_POST['submit'])){

      

       $errors=[];
       
        $adress=trim($_POST['adress']);
        $company_name=trim($_POST['company_name']);
        $activity_area=trim($_POST['activity_area']);
        // print_r($_POST);
        //       die;
       require_once '../controllers/functions.php';

       if(emptyInput3($adress,$company_name,$activity_area)){
           $errors['inputs']="inputs naaa";
       }

       require __DIR__.'/../../core/Recruiter.php';
       $Recruiter=new Recruiter();

      
    
       if(empty($errors)){

          
            $data['adresse']=$adress;
            $data['company_name']=$company_name;
            $data['activity_area']=$activity_area;
            $data['user_id']=$user_id;
            //   print_r($data);
            //   die;
          if( $Recruiter->insertRecruiter($data)){
             $msg="recruiter info added successfully";
                 header('Location:/recruiter/initialFilter');
                 exit;
           }else{
               
               $msg="error recruiter info";
          };

        }



   print_r($errors);
   echo "<br> msg: ".$msg;

    
}
 
}
 

require  __DIR__.'/../../views/recruiter/info.view.php';