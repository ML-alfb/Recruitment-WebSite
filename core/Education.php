<?php

require_once __DIR__.'/Database.php';

class Education extends Database{
    private $conx;
    
    public function __construct(){  
        $this->conx=$this->connect();
     }

    public function checkEducation($education_name){
     $stmt=$this->conx->prepare('SELECT `education_id` FROM `education` WHERE `education_name`=:education_name');
    if (!$stmt->execute([ 'education_name'=>$education_name])){
        //  do something like dying
    };
      if($stmt->rowCount()>0){
          return $stmt->fetch(PDO::FETCH_ASSOC);
      }
      return false;
    }


    public function insertEducation($education_name){

        $stmt=$this->conx->prepare("INSERT INTO `education`(`education_name`)  VALUES (:education_name)");
    if (!$stmt->execute([ 'education_name'=>$education_name])){
        //  do something like dying
        return false;
    };
    return true;

    }
    public function insertUserEducation($education_id ,$user_id){

        $stmt=$this->conx->prepare("INSERT INTO `user_education`(`education_id`,`user_id`)  VALUES (:education_id,:user_id)");
    if (!$stmt->execute([ 'education_id'=>$education_id,'user_id'=>$user_id])){
        //  do something like dying
        return false;
    };
    return true;

    }
  

    public function ckeckUserEducation($education_id,$user_id){
        // SELECT * FROM `user_competances` where `user_id`=15  and `competance_id`=6;
        $stmt=$this->conx->prepare('SELECT * FROM `user_education` where `user_id`=:user_id  and `education_id`=:education_id');
    if (!$stmt->execute(['education_id'=>$education_id,'user_id'=>$user_id])){
        //  do something like dying
      
    };
    if($stmt->rowCount()>0){
        return true;
    }
    return false;
  

    }
    public function getUserEducation($user_id){
        $stmt=$this->conx->prepare('SELECT education_name FROM `education` WHERE `education_id` in (SELECT `education_id` from `user_education` where `user_id`=:user_id )');
    if (!$stmt->execute(['user_id'=>$user_id])){
        //  do something like dying
      
    };
    return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }
    public function getAllEducations(){
        $stmt=$this->conx->prepare('SELECT distinct education_name FROM `education`');
    if (!$stmt->execute()){
        //  do something like dying
      
    };
    return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

 
    }



