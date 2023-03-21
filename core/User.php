<?php

require_once __DIR__.'/Database.php';

class User extends Database{
    private $conx;

    
    public function __construct(){  
        $this->conx=$this->connect();
     }
    
    public function checkUser($email){
     $stmt=$this->conx->prepare('SELECT `user_id` FROM `user` WHERE `email`=:email');
    if (!$stmt->execute([ 'email'=>$email])){
        //  do something like dying
    };
      if($stmt->rowCount()>0){
          return true;
      }
      return false;
    }
    


    public function insertUser($data){
        $stmt=$this->conx->prepare("INSERT INTO `user`( `first_name`, `last_name`, `email`, `passwd`, `num`, `user_role`) VALUES (:first_name,:last_name,:email,:passwd,:num,:user_role)");
    if (!$stmt->execute($data)){
        //  do something like dying
        return false;
    };
    return true;

    }

    public function getPassword($email){
        $stmt=$this->conx->prepare('SELECT `passwd` FROM `user` WHERE `email`=:email');
        if (!$stmt->execute(['email'=>$email])){
            //  do something like dying
          
        };
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getUser($email){
        $stmt=$this->conx->prepare('SELECT * FROM `user` WHERE `email`=:email');
    if (!$stmt->execute(['email'=>$email])){
        //  do something like dying
      
    }
    return $stmt->fetch(PDO::FETCH_ASSOC);

    }
    public function getUserEmail($user_id){
        $stmt=$this->conx->prepare('SELECT email FROM `user` WHERE `user_id`=:user_id');
    if (!$stmt->execute(['user_id'=>$user_id])){
        //  do something like dying
      
    }
    return $stmt->fetch(PDO::FETCH_ASSOC);

    }
    public function getUsers($user_id){
        $stmt=$this->conx->prepare('select * ,COUNT(*) * 10 as competanceScore from(SELECT DISTINCT user.user_id,
        first_name,last_name ,email,num ,competance.competance_id,user_expiriences.expirience_years
        FROM `user`,`domenes`,`user_domenes`,`competance`,`user_competances`,`user_expiriences`
        WHERE `user_role`=2001  
        and  user.user_id =user_domenes.user_id 
        and  user.user_id =user_expiriences.user_id 
        and  user.user_id =user_competances.user_id 
        and  domenes.domene_id =user_domenes.domene_id
        and  user_competances.competance_id IN (SELECT competance_id from user_competances WHERE user_id=:user_id)
        and  competance.competance_id=user_competances.competance_id )a
        GROUP by user_id  
        ORDER BY `competanceScore` DESC ');
    if (!$stmt->execute(['user_id'=>$user_id])){
        //  do something like dying
      
    }
    return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }
    public function getUserID($email){
        $stmt=$this->conx->prepare('SELECT user_id FROM `user` WHERE `email`=:email');
    if (!$stmt->execute(['email'=>$email])){
        //  do something like dying
      
    };
   
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
public function updateUserImage($user_id,$image){
    $stmt=$this->conx->prepare('UPDATE `user` SET `img`=:img WHERE `user_id`=:user_id');
if (!$stmt->execute(['user_id'=>$user_id,'img'=>$image])){
    //  do something like dying
    return false;
  
};
return true;}
    public function getRole($user_id){
        $stmt=$this->conx->prepare('SELECT user_role FROM `user`,`condidat` WHERE user.user_id=:user_id ');
    if (!$stmt->execute(['user_id'=>$user_id])){
        //  do something like dying
      
    };
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
    public function getUserInfo($user_id){
        $stmt=$this->conx->prepare('SELECT user.user_id,first_name,last_name,img ,email,num,cv_saved_name,condidat_CV FROM `user`,`condidat` WHERE user.user_id=:user_id and condidat.user_id=:user_id ');
    if (!$stmt->execute(['user_id'=>$user_id])){
        //  do something like dying
      
    };
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
    public function getUserImg($user_id){
        $stmt=$this->conx->prepare('SELECT img FROM `user` WHERE user.user_id=:user_id');
    if (!$stmt->execute(['user_id'=>$user_id])){
        //  do something like dying
      
    };
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

    
    }



