<?php

require_once __DIR__.'/Database.php';

class Expirience extends Database{
    private $conx;
    
    public function __construct(){  
        $this->conx=$this->connect();
     }

    public function getID($expirience_years){
     $stmt=$this->conx->prepare('SELECT `expirience_id` FROM `expirience` WHERE `expirience_years`=:expirience_years');
    if (!$stmt->execute([ 'expirience_years'=>$expirience_years])){
        //  do something like dying
    };
      if($stmt->rowCount()>0){
          return $stmt->fetch(PDO::FETCH_ASSOC);
      }
      return false;
    }


    
    public function insertUserExpirience($expirience ,$user_id){

        $stmt=$this->conx->prepare("INSERT INTO `user_expiriences`(`expirience_years`,`user_id`)  VALUES (:expirience_years,:user_id)");
    if (!$stmt->execute(['expirience_years'=>$expirience,'user_id'=>$user_id])){
        //  do something like dying
       
    };
    return true;

    }
    public function updateUserExpirience($expirience ,$user_id){

        $stmt=$this->conx->prepare("UPDATE `user_expiriences` SET `expirience_years`=:expirience_years WHERE `user_id`=:user_id ");
    if (!$stmt->execute(['expirience_years'=>$expirience,'user_id'=>$user_id])){
        //  do something like dying
       
    };
    return true;

    }
    public function checkUserExpirience($user_id){

        $stmt=$this->conx->prepare("SELECT * from  `user_expiriences` WHERE  `user_id`=:user_id");
    if (!$stmt->execute(['user_id'=>$user_id])){
        //  do something like dying
      
    };
    if($stmt->rowCount()>0){
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    return false;

    }
    // public function getExpirience($user_id){
    //     $stmt=$this->conx->prepare('SELECT competance_name FROM `competance` WHERE `competance_id` in (SELECT `competance_id` from `user_competance` where `user_id`=:user_id )');
    // if (!$stmt->execute(['user_id'=>$user_id])){
    //     //  do something like dying
      
    // };
    // return $stmt->fetchAll(PDO::FETCH_ASSOC);

    // }

    // public function ckeckUserDomene($domene_id,$user_id){
    //     // SELECT * FROM `user_competances` where `user_id`=15  and `competance_id`=6;
    //     $stmt=$this->conx->prepare('SELECT * FROM `user_domenes` where `user_id`=:user_id  and `domene_id`=:domene_id');
    // if (!$stmt->execute(['domene_id'=>$domene_id,'user_id'=>$user_id])){
    //     //  do something like dying
      
    // };
    // if($stmt->rowCount()>0){
    //     return true;
    // }
    // return false;
  

    // }
    public function getUserExpiriences($user_id){
        $stmt=$this->conx->prepare('SELECT expirience_years FROM `user_expiriences`  where `user_id`=:user_id ');
    if (!$stmt->execute(['user_id'=>$user_id])){
        //  do something like dying
        return false;
    };
    return $stmt->fetch(PDO::FETCH_ASSOC);

    }
    public function getAllExpirience(){
        $stmt=$this->conx->prepare('SELECT distinct expirience_years,x FROM `expirience` limit 5');
    if (!$stmt->execute()){
        //  do something like dying
      
    };
    return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

 
    }



