<?php
session_start();
require_once __DIR__.'/../functions.php';
allwedPages('condidate');
$user_id=(int)$_SESSION['condidate_id'];
$offer;
if($_SERVER['REQUEST_METHOD']=='GET'){
    require __DIR__.'/../../core/Offer.php';
    $Offer=new Offer();
    $offerID=(int) $param;
    $offer=$Offer->getOfferByID($offerID);
 
    require_once __DIR__.'/../functions.php';
  
}
if($_SERVER['REQUEST_METHOD']=='POST'){
    if(isset($_POST['apply']))
    require __DIR__.'/../../core/Offer.php';
    $Offer=new Offer();
    $offerID=(int) $param;
   if($Offer->insertCondidateOffer($offerID,$user_id)){
    $offer=$Offer->getOfferByID($offerID);
   }else{
    echo 0;
   }
 

  
}


require  __DIR__.'/../../views/condidate/offerDetails.view.php';