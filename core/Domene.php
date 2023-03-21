<?php

require_once __DIR__.'/Database.php';

class Domene extends Database{
    private $conx;
    
    public function __construct(){  
        $this->conx=$this->connect();
     }

    public function checkDomene($domene_name){
     $stmt=$this->conx->prepare('SELECT `domene_id` FROM `domenes` WHERE `domene_name`=:domene_name');
    if (!$stmt->execute([ 'domene_name'=>$domene_name])){
        //  do something like dying
    };
      if($stmt->rowCount()>0){
          return $stmt->fetch(PDO::FETCH_ASSOC);
      }
      return false;
    }


    public function insertDomene($domene_name){

        $stmt=$this->conx->prepare("INSERT INTO `domenes`(`domene_name`)  VALUES (:domene_name)");
    if (!$stmt->execute([ 'domene_name'=>$domene_name])){
        //  do something like dying
        return false;
    };
    return true;

    }
    public function insertUserDomenes($domene_id ,$user_id){

        $stmt=$this->conx->prepare("INSERT INTO `user_domenes`(`domene_id`,`user_id`)  VALUES (:domene_id,:user_id)");
    if (!$stmt->execute([ 'domene_id'=>$domene_id,'user_id'=>$user_id])){
        //  do something like dying
        return false;
    };
    return true;

    }
    // public function getCompetance($user_id){
    //     $stmt=$this->conx->prepare('SELECT competance_name FROM `competance` WHERE `competance_id` in (SELECT `competance_id` from `user_competance` where `user_id`=:user_id )');
    // if (!$stmt->execute(['user_id'=>$user_id])){
    //     //  do something like dying
      
    // };
    // return $stmt->fetchAll(PDO::FETCH_ASSOC);

    // }

    public function ckeckUserDomene($domene_id,$user_id){
        // SELECT * FROM `user_competances` where `user_id`=15  and `competance_id`=6;
        $stmt=$this->conx->prepare('SELECT * FROM `user_domenes` where `user_id`=:user_id  and `domene_id`=:domene_id');
    if (!$stmt->execute(['domene_id'=>$domene_id,'user_id'=>$user_id])){
        //  do something like dying
      
    };
    if($stmt->rowCount()>0){
        return true;
    }
    return false;
  

    }
    public function getUserDomenes($user_id){
        $stmt=$this->conx->prepare('SELECT domene_name FROM `domenes` WHERE `domene_id` in (SELECT `domene_id` from `user_domenes` where `user_id`=:user_id )');
    if (!$stmt->execute(['user_id'=>$user_id])){
        //  do something like dying
    };
    return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }
    public function getAllDomenes(){
        $stmt=$this->conx->prepare('SELECT distinct domene_name FROM `domenes` ');
    if (!$stmt->execute()){
        //  do something like dying
      
    };
    return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

 
    }



