<?php
session_start();
require_once __DIR__.'/../../core/User.php';
 $User=new User();
 $wherIAm=true;
$userId=(int)$param;
 if((isset($_SESSION['condidate_id'])&& $_SESSION['condidate_id']==$userId)||(isset($_SESSION['recruiter_id'])&& $_SESSION['recruiter_id']==$userId)){
     $role=$User->getRole($userId)['user_role'];
    //  echo $role;die;
 }else{
   header('location:/login');
   exit;
 }

if($_SERVER['REQUEST_METHOD']==='POST'){
    if(isset($_POST['submit'])){
        $to=trim(htmlspecialchars($_POST['to']));
        $subject=trim(htmlspecialchars($_POST['subject']));
        $message=trim(htmlentities($_POST['message']));
        require_once __DIR__.'/../functions.php';
       if (emptyInput3($to,$subject,$message)){
           $errors='All inputs ar required';
       }else{
        
            $User=new User();
            if(!$User->checkUser($to)){
                $errors='wrong email';
            }else{
                if($email=$User->getUserEmail($userId)['email']  ){
                   if($email!=$to){
                    require_once __DIR__.'/../../core/Chat.php';
                $Chat=new Chat();
                // `reciever_email`, `massage`, `sender_email`, `subject`
                $data['reciever_email']=$to;
                $data['message']=$message;
                $data['sender_email']=$email;
                $data['subject']=$subject;
                if($Chat->insertChat($data)){
                       $msg='message sent successffly';
                }else{
                    $errors='something happend wrong';
                }}
                }
            }
        
       }
    }
 

 

}
    require_once __DIR__.'/../../core/Chat.php';
    $Chat=new Chat();
    if(!$chats=$Chat->getUserSChat($userId)){
       $chats= [];
    }
    // print_r($chats);
    // die;









require  __DIR__.'/../../views/chat/chat.view.php'; 