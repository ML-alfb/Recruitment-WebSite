<?php
session_start();
require_once __DIR__.'/../../core/User.php';
 $User=new User();
 $wherIAm=false;
$userId=(int)$param;
 if((isset($_SESSION['condidate_id'])&& $_SESSION['condidate_id']==$userId)||(isset($_SESSION['recruiter_id'])&& $_SESSION['recruiter_id']==$userId)){
     $role=$User->getRole($userId)['user_role'];
    //  echo $role;die;
 }else{
   header('location:/login');
   exit;
 }

    require_once __DIR__.'/../../core/Chat.php';
    $Chat=new Chat();
    if(!$chats=$Chat->getUserRChat($userId)){
       $chats= [];
    }
  









require  __DIR__.'/../../views/chat/receivedChat.view.php'; 