<?php

require_once __DIR__.'/Database.php';

class Competance extends Database{
    private $conx;
    
    public function __construct(){  
        $this->conx=$this->connect();
     }

    public function checkCompetance($competance_name){
     $stmt=$this->conx->prepare('SELECT `competance_id` FROM `competance` WHERE `competance_name`=:competance_name');
    if (!$stmt->execute([ 'competance_name'=>$competance_name])){
        //  do something like dying
    };
      if($stmt->rowCount()>0){
          return $stmt->fetch(PDO::FETCH_ASSOC);
      }
      return false;
    }


    public function insertCompetance($competance){

        $stmt=$this->conx->prepare("INSERT INTO `competance`(`competance_name`)  VALUES (:competance_name)");
    if (!$stmt->execute([ 'competance_name'=>$competance])){
        //  do something like dying
        return false;
    };
    return true;

    }
    public function insertUserCompetance($competance_id ,$user_id){

        $stmt=$this->conx->prepare("INSERT INTO `user_competances`(`competance_id`,`user_id`)  VALUES (:competance_id,:user_id)");
    if (!$stmt->execute([ 'competance_id'=>$competance_id,'user_id'=>$user_id])){
        //  do something like dying
        return false;
    };
    return true;

    }
    public function getAllCompetances(){
        $stmt=$this->conx->prepare('SELECT distinct competance_name FROM `competance` ');
    if (!$stmt->execute()){
        //  do something like dying
      
    };
    return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    public function ckeckUserCompetance($competance_id,$user_id){
        $stmt=$this->conx->prepare('SELECT * FROM `user_competances` where `user_id`=:user_id  and `competance_id`=:competance_id');
    if (!$stmt->execute(['competance_id'=>$competance_id,'user_id'=>$user_id])){
        //  do something like dying
      
    };
    if($stmt->rowCount()>0){
        return true;
    }
    return false;
  

    }
    public function getUserCompetances($user_id){
        $stmt=$this->conx->prepare('SELECT competance_name,competance_id FROM `competance` WHERE `competance_id` in (SELECT `competance_id` from `user_competances` where `user_id`=:user_id )');
    if (!$stmt->execute(['user_id'=>$user_id])){
        //  do something like dying
      
    };
    return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }
    public function   deleteUserCompetance($competance_id ,$user_id){
        $stmt=$this->conx->prepare('DELETE FROM `user_competances` WHERE `user_id`=:user_id and `competance_id`=:competance_id ');
    if (!$stmt->execute(['competance_id'=>$competance_id,'user_id'=>$user_id])){
        //  do something like dying
        return false;
      
    };
    return true;

    }
    public function   updateUserCompetance($competance_id ,$user_id,$NV){
        $stmt=$this->conx->prepare('UPDATE  `user_competances` SET  `competance_id`=:NV WHERE `user_id`=:user_id and `competance_id`=:competance_id ');
    if (!$stmt->execute(['competance_id'=>$competance_id,'user_id'=>$user_id,'NV'=>$NV])){
        //  do something like dying
        return false;
      
    };
    return true;

    }

 
    }



