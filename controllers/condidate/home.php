<?php

session_start();
require_once __DIR__.'/../functions.php';
allwedPages('condidate');
$user_id=(int)$_SESSION['condidate_id'];
$errors=[];
$msg='';

if($_SERVER['REQUEST_METHOD']=='GET'){
    require __DIR__.'/../../core/Offer.php';
    $Offer=new Offer();
    $offers=$Offer->getOffers();
 
   
   
}
if($_SERVER['REQUEST_METHOD']==='POST'){
    
    if(isset($_POST['filter'])){
        $offerData['offer_city']="%".trim(htmlspecialchars($_POST['city']))."%";
        $offerData['offer_type']="%".trim(htmlspecialchars($_POST['offerType']))."%";
        $offerData['offer_createdAt']=(int)trim(htmlspecialchars($_POST['date']));
         if(empty( $offerData['offer_createdAt'])){
            $offerData['offer_createdAt']=5184000;
         }
        if(!emptyInput3( $offerData['offer_city'], $offerData['offer_type'],$offerData['offer_createdAt'])){

            require __DIR__.'/../../core/OfferSearch.php';
            $offerSearch=new OfferSearch();
            $offers=$offerSearch->getOfferby($offerData);
        }else{
            require __DIR__.'/../../core/Offer.php';
            $Offer=new Offer();
            $offers=$Offer->getOffers();
        }
        
    }

}
 




require  __DIR__.'/../../views/condidate/home.view.php';