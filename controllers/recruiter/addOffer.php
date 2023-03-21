<?php
session_start();
require_once __DIR__.'/../functions.php';
allwedPages('recruiter');
$user_id=(int)$_SESSION['recruiter_id'];




if($_SERVER['REQUEST_METHOD']==="POST"){

    if(isset($_POST['submit'])){
        $offerData['user_id']=$user_id;
        $offerData['offer_city']=trim(htmlspecialchars($_POST['city']));
        $offerData['offer_title']=trim(htmlspecialchars($_POST['title']));
        $offerData['offer_type']=trim(htmlspecialchars($_POST['jobType']));
        $offerData['offer_domene']=trim(htmlspecialchars($_POST['offerDomene']));
        $offerData['offer_description']=trim(htmlentities($_POST['OfferDescription']));
        $offerData['offer_condidats_num']=$_POST['CondidatsNumber'];
            

        if(emptyInputs( $offerData['user_id'], $offerData['offer_city'], $offerData['offer_title'],$offerData['offer_type'], $offerData['offer_description'], $offerData['offer_condidats_num'],'full')){
             $errors='all inputs required';    
        }else{

            if (!preg_match("/^[0-9]*$/", $offerData['offer_condidats_num'])) {
                $errors='Candidats Numbre is to be a valid number';

            }else{
             require __DIR__.'/../../core/Offer.php';

             $Offer=new Offer();

             if(!$Offer->insertOffer($offerData)){
                $errors='somthing happened wrong';
             }else{
              $msg='offer added successfully';
             }
             


            }







        }
                


}

}


require  __DIR__.'/../../views/recruiter/addOffer.view.php';