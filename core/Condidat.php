<?php

require_once __DIR__.'/Database.php';

class Condidat extends Database{
    private $conx;
    
    public function __construct(){  
        $this->conx=$this->connect();
     }

     public function checkCondidat($user_id){
        $stmt=$this->conx->prepare('SELECT `user_id` FROM `condidat` WHERE `user_id`=:user_id');
       if (!$stmt->execute([ 'user_id'=>$user_id])){
           //  do something like dying
       };
         if($stmt->rowCount()>0){
             return true;
         }
         return false;
       }
    public function insertCondidat($user_id){

        $stmt=$this->conx->prepare("INSERT INTO `condidat`(`user_id`)  VALUES (:user_id)");
    if (!$stmt->execute([ 'user_id'=>$user_id])){
        //  do something like dying
        return false;
    };
    return true;

    }

    public function insertCondidatCV($user_id,$filename,$savedAs){

        $stmt=$this->conx->prepare("UPDATE `condidat` SET `condidat_CV`=:condidat_CV ,`cv_saved_name`=:cv_saved_name where `user_id`=:user_id");
    if (!$stmt->execute([ 'user_id'=>$user_id,'condidat_CV'=>$filename,'cv_saved_name'=>$savedAs])){
        //  do something like dying
        return false;
    };
    return true;

    }


    public function getCondidat($user_id){
        $stmt=$this->conx->prepare('SELECT * FROM `condidat` WHERE `user_id`=:user_id');
    if (!$stmt->execute(['user_id'=>$user_id])){
        //  do something like dying
      return false;
    };
    return $stmt->fetch(PDO::FETCH_ASSOC);

    }
   

 
    }



