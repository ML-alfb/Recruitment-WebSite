 <?php
 session_start();
 if($_SERVER['REQUEST_METHOD']==='POST'){
    if(isset($_POST['submit'])){
         $firstName=trim($_POST['firstName']);
         $lastName=trim($_POST['lastName']);
         $email=trim($_POST['email']);
         $password=trim($_POST['password']);
         $num=trim($_POST['num']);
         $passwordConfirm=trim($_POST['passwordConfirm']);
         $role=trim($_POST['role']);
    
        require_once '../controllers/functions.php';

        if(emptyInputs($firstName,$lastName,$email,$password,$passwordConfirm,$num,$role)){
            $errors="All inputs are required";
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
             if(empty( $errors)){
               $errors="Invalid email address";
             }
        }

        if (!preg_match("/^[a-zA-Z-']*$/",$firstName) || !preg_match("/^[a-zA-Z-']*$/",$lastName)) {
            
            if(empty( $errors)){
               $errors="Only letters and white space allowed";
             }
        }

        if(is_nan($num)){
           
            if(empty( $errors)){
               $errors="must be a number";
             }
        }
        if(strlen($password)<8){
           
            if(empty( $errors)){
               $errors='invalid password ';
             }
           }
        if(!$password===$passwordConfirm){
         if(empty( $errors)){
            $errors='passwords do not match';
          }
        
        }
       

        $hashed_password=password_hash($password,PASSWORD_DEFAULT);
        require __DIR__.'/../../core/User.php';
        $user=new User();

        if( $user->checkUser($email)){
         if(empty( $errors)){
            $errors='user exists';
          }
        }
     
        if(empty($errors)){
             $data['first_name']=$firstName;
             $data['last_name']=$lastName;
             $data['email']=$email;
             $data['passwd']=$hashed_password;
             $data['num']=$num;
             if($role=="recruteur"){
                $role=1959;
             }else{
                $role=2001;
             }
             $data['user_role']=$role;

            
           if( $user->insertUser($data)){
            //   $msg="user registerd successfully";
             
              if( $userID=$user->getUserID($email)){
            
              if($role==1959){
                $_SESSION['recruiter_id']=$userID['user_id'];
               header('Location:/recruiter/info');
               exit;
                }else if($role==2001){
   
                  require __DIR__.'/../../core/Condidat.php';
                  $Condidat=new Condidat();
                 if( $Condidat->insertCondidat($userID['user_id'])){
                     //   $msg='user added successfully';
                       header('Location:/login');
                       exit;
                 }else{
                  $errors['user']='error';
                 };
                }
                 
              }else{
               $errors['user']='error';
              }
            }else{
                
                $msg="user registation failed";
           };
 
         }



   //  print_r($errors);
   //  echo "<br> msg: ".$msg;

     
 }
  
}
  


 




   require  __DIR__.'/../../views/authontification/SingUp.view.php'; 

 