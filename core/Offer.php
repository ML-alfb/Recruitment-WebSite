<?php

require_once __DIR__.'/Database.php';

class Offer extends Database{
    private $conx;
    
    public function __construct(){  
        $this->conx=$this->connect();
     }

    // public function checkCompetance($competance_name){
    //  $stmt=$this->conx->prepare('SELECT `competance_id` FROM `competance` WHERE `competance_name`=:competance_name');
    // if (!$stmt->execute([ 'competance_name'=>$competance_name])){
    //     //  do something like dying
    // };
    //   if($stmt->rowCount()>0){
    //       return $stmt->fetch(PDO::FETCH_ASSOC);
    //   }
    //   return false;
    // }


    public function insertOffer($OfferData){

        $stmt=$this->conx->prepare("INSERT INTO `offer` ( `user_id`, `offer_description`,`offer_condidats_num`, `offer_title`, `offer_city`,`offer_type`,`offer_domene`) VALUES ( :user_id,:offer_description, :offer_condidats_num,:offer_title,:offer_city,:offer_type,:offer_domene)");
    if (!$stmt->execute($OfferData)){
        //  do something like dying
        return false;
    };
    return true;

    }
    public function insertCondidateOffer($offer_id ,$user_id){

        $stmt=$this->conx->prepare("INSERT INTO `condidats_offers`(`offer_id`,`user_id`)  VALUES (:offer_id,:user_id)");
    if (!$stmt->execute([ 'offer_id'=>$offer_id,'user_id'=>$user_id])){
        //  do something like dying
        return false;
    };
    return true;

    }
 

   
    public function getOffers(){
        $stmt=$this->conx->prepare('SELECT * FROM `offer`   ORDER by `offer_createdAt` DESC  ');
    if (!$stmt->execute()){
        //  do something like dying
    };
    return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }
    public function getOfferByID($offer_id){
        $stmt=$this->conx->prepare('SELECT * FROM `offer` where `offer_id`=:offer_id ');
    if (!$stmt->execute(['offer_id'=>$offer_id])){
        //  do something like dying
    };
    return $stmt->fetch(PDO::FETCH_ASSOC);

    }
    public function getRecruiterOffers($user_id){
        $stmt=$this->conx->prepare('SELECT competance_name FROM `competance` WHERE `competance_id` in (SELECT `competance_id` from `user_competances` where `user_id`=:user_id )');
    if (!$stmt->execute(['user_id'=>$user_id])){
        //  do something like dying
    };
    return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }
    public function getCondidateOffers($user_id){
        $stmt=$this->conx->prepare('SELECT user.user_id,offer.offer_id,offer.offer_createdAt,offer.offer_title,user.email,condidats_offers.condidateur_added_time,condidat.condidat_CV,condidat.cv_saved_name
        FROM `condidats_offers`,`condidat`,`user`,`offer` 
        WHERE condidats_offers.user_id=user.user_id
        and  offer.offer_id=condidats_offers.offer_id
        and condidat.user_id=user.user_id
        and condidats_offers.offer_id
        in (SELECT `offer_id` from `offer` where `user_id`=:user_id)');
    if (!$stmt->execute(['user_id'=>$user_id])){
        //  do something like dying
    };
    return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }

    }



