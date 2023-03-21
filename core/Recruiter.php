<?php

require_once __DIR__.'/Database.php';

class Recruiter extends Database{
    private $conx;
    
    public function __construct(){  
        $this->conx=$this->connect();
     }

    // public function checkRecruiter($user_id){
    //  $stmt=$this->conx->prepare('SELECT `recruteur_id` FROM `recruteur` WHERE `user_id`=:user_id');
    // if (!$stmt->execute([ 'user_id'=>$user_id])){
    //     //  do something like dying
    // };
    //   if($stmt->rowCount()>0){
    //       return true;
    //   }
    //   return false;
    // }


    public function insertRecruiter($data){

        $stmt=$this->conx->prepare("INSERT INTO `recruteur`(`company_name`, `adresse`, `user_id`, `activity_area`)  VALUES (:company_name,:adresse,:user_id,:activity_area)");
    if (!$stmt->execute($data)){
        //  do something like dying
        return false;
    };
    return true;

    }

    public function getRecruiter($email){
        $stmt=$this->conx->prepare('SELECT * FROM `user` WHERE `email`=:email');
    if (!$stmt->execute(['email'=>$email])){
        //  do something like dying
      
    };
    return $stmt->fetch(PDO::FETCH_ASSOC);

    }

 
    }



