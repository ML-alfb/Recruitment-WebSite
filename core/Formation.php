<?php

require_once __DIR__.'/Database.php';

class Formation extends Database{
    private $conx;
    
    public function __construct(){  
        $this->conx=$this->connect();
     }

    public function checkFormation($formation_id){
     $stmt=$this->conx->prepare('SELECT * FROM `formation` WHERE `formation_id`=:formation_id');
    if (!$stmt->execute([ 'formation_id'=>$formation_id])){
        //  do something like dying
    };
      if($stmt->rowCount()>0){
          return true;
      }
      return false;
    }


    public function insertFormation($formationData){

        $stmt=$this->conx->prepare("INSERT INTO `formation`(`user_id`, `formation_ecole`, `formation_deplome`, `formation_domene`, `formation_startedAt`, `formation_endedAt`) VALUES (:user_id,:formation_ecole, :formation_deplome, :formation_domene, :formation_startedAt, :formation_endedAt)");
    if (!$stmt->execute($formationData)){
        //  do something like dying
        return false;
    };
    return $this->conx->lastInsertId() ;

    }    
    public function   deleteFormation( $formation_id){
        $stmt=$this->conx->prepare('DELETE FROM `formation` WHERE`formation_id`=:formation_id  ');
    if (!$stmt->execute(['formation_id'=>$formation_id])){
        //  do something like dying
        return false;
      
    };
    return true;

    }
    public function   updateFormation( $formationData){
        $stmt=$this->conx->prepare('UPDATE `formation` SET `formation_ecole`=:formation_ecole,`formation_deplome`=:formation_deplome,`formation_domene`=:formation_domene,`formation_startedAt`=:formation_startedAt,`formation_endedAt`=:formation_endedAt WHERE `formation_id`=:formation_id ');
    if (!$stmt->execute($formationData)){
        //  do something like dying
        return false;
      
    };
    return true;

    }
    public function   getFormations( $user_id){
        $stmt=$this->conx->prepare('SELECT * FROM `formation` WHERE`user_id`=:user_id  ');
    if (!$stmt->execute(['user_id'=>$user_id])){
        //  do something like dying
        return false;
      
    };
    return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

 
    }



