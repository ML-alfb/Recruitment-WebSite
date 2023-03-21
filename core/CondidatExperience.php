<?php

require_once __DIR__.'/Database.php';

class CondidatExperience extends Database{
    private $conx;
    
    public function __construct(){  
        $this->conx=$this->connect();
     }

    // public function checkFormation($formation_id){
    //  $stmt=$this->conx->prepare('SELECT * FROM `formation` WHERE `formation_id`=:formation_id');
    // if (!$stmt->execute([ 'formation_id'=>$formation_id])){
    //     //  do something like dying
    // };
    //   if($stmt->rowCount()>0){
    //       return true;
    //   }
    //   return false;
    // }


    public function insertCondidatExperience($Data){

        $stmt=$this->conx->prepare("INSERT INTO `condidat_experience`(`user_id`, `company_name`, `activity_area`, `start_date`, `end_date`,`role`) VALUES (:user_id, :company_name, :activity_area, :start_date, :end_date,:role)");
    if (!$stmt->execute($Data)){
        //  do something like dying
        return false;
    };
    return $this->conx->lastInsertId() ;

    }    
    // public function   deleteFormation( $formation_id){
    //     $stmt=$this->conx->prepare('DELETE FROM `formation` WHERE`formation_id`=:formation_id  ');
    // if (!$stmt->execute(['formation_id'=>$formation_id])){
    //     //  do something like dying
    //     return false;
      
    // };
    // return true;

    // }
    public function   updateExperience( $Data){
        $stmt=$this->conx->prepare('UPDATE `condidat_experience` SET `company_name`=:company_name,`activity_area`=:activity_area,`start_date`=:start_date,`end_date`=:end_date,`role`=:role WHERE `id`=:id');
    if (!$stmt->execute($Data)){
        //  do something like dying
        return false;
      
    };
    return true;

    }
    public function   deleteExperience($Data){
        $stmt=$this->conx->prepare('DELETE from `condidat_experience`  WHERE `id`=:id');
    if (!$stmt->execute($Data)){
        //  do something like dying
        return false;
      
    };
    return true;

    }
    public function   getCondidatExperience($user_id){
        $stmt=$this->conx->prepare('SELECT * FROM `condidat_experience` WHERE`user_id`=:user_id  ');
    if (!$stmt->execute(['user_id'=>$user_id])){
        //  do something like dying
        return false;
      
    };
    return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }
    public function   getUserExperience($user_id){
        $stmt=$this->conx->prepare('SELECT SUM(TIMESTAMPDIFF(YEAR,`start_date`,`end_date`))as exp  FROM `condidat_experience` WHERE `user_id`=:user_id');
    if (!$stmt->execute(['user_id'=>$user_id])){
        //  do something like dying
        return false;
      
    };
    return $stmt->fetch(PDO::FETCH_ASSOC);

    }
 
    }



