<?php
session_start();

$msg;

if($_SERVER['REQUEST_METHOD']==='POST'){
    if(isset($_POST['submit'])){
     
      
        $email=trim($_POST['email']);
        $password=trim($_POST['password']);

        if(empty($email)||empty($password)){
            $errors['inputs']="inputs naaa"; 
        }

        require __DIR__.'/../../core/User.php';
        $user=new User();
       
        if( $user->checkUser($email)){
         $user_password=$user->getPassword($email);
        //  print_r( $user_password['passwd']);
      
        
         if(password_verify($password,$user_password['passwd'])){
         
            $userlogedin=$user->getUser($email);
          
          
if($userlogedin['user_role']==2001){
    
    $_SESSION['condidate_id']=$userlogedin['user_id'];
    header("location:/condidate");
    exit;
}else{
 
    $_SESSION['recruiter_id']=$userlogedin['user_id'];
    header("location:/recruiter/candidatures");
    exit;

}


         }else{
           
            $errors="email or password is wrong";
         }

        }else{
            $errors='email or password is wrong';
        }
        







    }

    // print_r($errors);
}

require  __DIR__.'/../../views/authontification/login.view.php';