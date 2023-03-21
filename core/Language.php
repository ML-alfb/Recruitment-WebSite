<?php

require_once __DIR__.'/Database.php';

class Language extends Database{
    private $conx;
    
    public function __construct(){  
        $this->conx=$this->connect();
     }

    public function checkLanguage($language_name){
     $stmt=$this->conx->prepare('SELECT `language_id` FROM `languages` WHERE `language_name`=:language_name');
    if (!$stmt->execute([ 'language_name'=>$language_name])){
        //  do something like dying
    };
      if($stmt->rowCount()>0){
          return $stmt->fetch(PDO::FETCH_ASSOC);
      }
      return false;
    }

    public function insertLanguage($language){

        $stmt=$this->conx->prepare("INSERT INTO `languages`(`language_name`)  VALUES (:language_name)");
    if (!$stmt->execute([ 'language_name'=>$language])){
        //  do something like dying
        return false;
    };
    return true;

    }
    public function insertUserLanguage($language_id ,$user_id){

        $stmt=$this->conx->prepare("INSERT INTO `user_languages`(`language_id`,`user_id`)  VALUES (:language_id,:user_id)");
    if (!$stmt->execute([ 'language_id'=>$language_id,'user_id'=>$user_id])){
        //  do something like dying
        return false;
    };
    return true;

    }
    public function ckeckUserLanguage($language_id,$user_id){
        $stmt=$this->conx->prepare('SELECT * FROM `user_languages` where `user_id`=:user_id  and `language_id`=:language_id');
    if (!$stmt->execute(['language_id'=>$language_id,'user_id'=>$user_id])){
        //  do something like dying
      
    };
    if($stmt->rowCount()>0){
        return true;
    }
    return false;
  

    }

    public function getUserLanguages($user_id){
        $stmt=$this->conx->prepare('SELECT language_name FROM `languages` WHERE `language_id` in (SELECT `language_id` from `user_languages` where `user_id`=:user_id )');
    if (!$stmt->execute(['user_id'=>$user_id])){
        //  do something like dying
      
    };
    return $stmt->fetch(PDO::FETCH_ASSOC);

    }

 
    }



