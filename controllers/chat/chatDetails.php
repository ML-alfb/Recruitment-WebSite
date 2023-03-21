<?php
session_start();

 $wherIAm=false;
$userId=(int)$param;
// echo $userId;
 if(!isset($_SESSION['condidate_id']) && isset($_SESSION['recruiter_id'])){

   header('location:/login');
   exit;
 }
 require_once __DIR__.'/../../core/User.php';
 $User=new User();
 if($role=$User->getRole($userId)['user_role']){
   if(isset ($_REQUEST['chat'])){

   
    if($chat_id=(int)$_REQUEST['chat']){

        require_once __DIR__.'/../../core/Chat.php';
        $Chat=new Chat();
        if(!$chatDetail=$Chat->getChatDetails($chat_id)){
            $chatDetail=[];   
            header('location:/error');
             }
             if(!$Chat->updateChatStat($chat_id)){
                header('location:/error');
             }
    }
}
   if(isset ($_REQUEST['chatR'])){

    if($chat_id=(int)$_REQUEST['chatR']){

        require_once __DIR__.'/../../core/Chat.php';
        $Chat=new Chat();
        if(!$chatDetail=$Chat->getChatDetails($chat_id)){
            $chatDetail=[];   
            header('location:/error');
             }
             if(!$Chat->updateChatRStat($chat_id)){
                header('location:/error');
             }
    }
}
 }
 
 

  









require  __DIR__.'/../../views/chat/chatDetails.view.php'; 