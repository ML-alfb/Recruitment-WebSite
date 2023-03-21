<?php

require_once __DIR__.'/Database.php';

class Chat extends Database{
    private $conx;

    
    public function __construct(){  
        $this->conx=$this->connect();
     }
    


    public function insertChat($data){
        $stmt=$this->conx->prepare("INSERT INTO `chat`( `reciever_email`, `message`, `sender_email`, `subject`) VALUES ( :reciever_email, :message, :sender_email, :subject)");
    if (!$stmt->execute($data)){
        //  do something like dying
        return false;
    };
    return true;

    }

    public function getUserSChat($user_id){
        $stmt=$this->conx->prepare('SELECT chat.*  FROM `chat`,`user` WHERE user.email=chat.sender_email and user.user_id=:user_id order by time DESC');
        if (!$stmt->execute(['user_id'=>$user_id])){
            //  do something like dying
          
        };
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getUserRChat($user_id){
        $stmt=$this->conx->prepare('SELECT chat.*  FROM `chat`,`user` WHERE user.email=chat.reciever_email and user.user_id=:user_id order by time DESC' );
        if (!$stmt->execute(['user_id'=>$user_id])){
            //  do something like dying
          
        };
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getChatDetails($chat_id){
        $stmt=$this->conx->prepare('SELECT message ,sender_email,reciever_email FROM `chat` WHERE chat_id=:chat_id');
        if (!$stmt->execute(['chat_id'=>$chat_id])){
            //  do something like dying
          
        };
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function updateChatStat($chat_id){
        $stmt=$this->conx->prepare('UPDATE `chat` SET `stat`=1  WHERE chat_id=:chat_id');
        if (!$stmt->execute(['chat_id'=>$chat_id])){
            //  do something like dying
          return false;
        };
        return true;
    }
    public function updateChatRStat($chat_id){
        $stmt=$this->conx->prepare('UPDATE `chat` SET `re_stat`=1  WHERE chat_id=:chat_id');
        if (!$stmt->execute(['chat_id'=>$chat_id])){
            //  do something like dying
          return false;
        };
        return true;
    }
  


    
    }



