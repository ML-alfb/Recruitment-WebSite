<?php

require_once __DIR__.'/Database.php';

class OfferSearch extends Database{
    private $conx;
    
    public function __construct(){  
        $this->conx=$this->connect();
     }

     
    public function getOfferby($fiterData){
        $stmt=$this->conx->prepare('SELECT  * FROM `offer`  WHERE  TIMESTAMPDIFF(SECOND,`offer_createdAt`,CURRENT_TIMESTAMP())<:offer_createdAt and `offer_city` like :offer_city and `offer_type` like :offer_type LIMIT 10');
        if (!$stmt->execute($fiterData)){
            //  do something like dying
        };
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    

    }

    public function insertCondidatCV($user_id,$file){

        $stmt=$this->conx->prepare("INSERT INTO `condidat`(cv)  VALUES (:cv) where `user_id`=:user_id");
    if (!$stmt->execute([ 'user_id'=>$user_id,'cv'=>$file])){
        //  do something like dying
        return false;
    };
    return true;

    }


    public function getCondidat($user_id){
        $stmt=$this->conx->prepare('SELECT * FROM `condidat` WHERE `user_id`=:user_id');
    if (!$stmt->execute([ 'user_id'=>$user_id])){
        //  do something like dying
      
    };
    return $stmt->fetch(PDO::FETCH_ASSOC);

    }

 
    }
