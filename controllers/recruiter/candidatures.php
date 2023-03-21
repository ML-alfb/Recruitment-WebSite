<?php
session_start();
require_once __DIR__.'/../functions.php';
allwedPages('recruiter');
$user_id=(int)$_SESSION['recruiter_id'];

if($_SERVER['REQUEST_METHOD']=='GET'){
    require __DIR__.'/../../core/Offer.php';
    $Offer=new Offer();
    if(!$condidateurList=$Offer->getCondidateOffers($user_id)){
        $msg='no condidateur';
    }
    //   print_r($condidateurList);
    //   die;
}


require __DIR__.'/../../views/recruiter/candidatures.view.php';