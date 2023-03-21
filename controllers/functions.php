<?php

function emptyInputs($val1,$val2,$val3,$val4,$val5,$val6,$val7)
{
    if(empty($val1)||empty($val2)||empty($val3)||empty($val4)||empty($val5)||empty($val6)||empty($val7)){
        return true;
    }
    return false;
}
function emptyInput3($val1,$val2,$val3)
{
    if(empty($val1)||empty($val2)||empty($val3)){
        return true;
    }
    return false;
}






function offerIsPosted($postedDate)
{
     $currentDate=date("Y-m-d H:i:s");
    $datesDifference= strtotime($currentDate)-strtotime($postedDate); 
    if($datesDifference<60){
        return 'posted ' .$datesDifference .' second ago';
    }else if($datesDifference<(60*60)){

        $minutes=(int) ($datesDifference/60);
        return 'posted ' .$minutes .' minutes ago';
    }else if($datesDifference<(60*60*24)){
        $hours=(int) ($datesDifference/(60*60));
        return 'posted ' .$hours .' hours ago';
    }else if($datesDifference<60*60*24*30){
       
        $days=(int) ($datesDifference/(60*60*24));
        return 'posted ' .$days .' days ago';
    }else if($datesDifference<60*60*24*30*12){
        $months=(int)( $datesDifference/(60*60*24*30));
        return 'posted ' .$months .' months ago';
    }else if($datesDifference>60*60*24*30*12*365){
        $years=(int) ($datesDifference/(60*60*24*30*10));
        return 'posted ' .$years .' years ago';
    }

}


function isFavoriteOffersCookie($offerId)
{  
    $favoriteOffersArray=isset($_COOKIE['favoriteOffersId'])?json_decode($_COOKIE['favoriteOffersId']):[];
    print_r( $favoriteOffersArray);
    if(in_array($offerId,$favoriteOffersArray )){
        return true;
    };
     return false;
}


 function selected($select,$selectedValue){
    if($_SERVER['REQUEST_METHOD']==='POST'){
        if(isset($_POST[$select])){

            if($_POST[$select]== $selectedValue){
                return 'selected';
          } 
        }

    }
    

 }
 function cityValue(){
    if($_SERVER['REQUEST_METHOD']==='POST'){
        if(isset($_POST["city"])){
                return $_POST["city"];
          } else{
            return '';
          }
        }

    }
    


function userIsLogedIn($how){
   if( isset($_SESSION[$how.'_id'])  ){
    // echo  $_SESSION[$how.'_id'];die;
    return true;
   }
  return false;
  
  
}


function allwedPages($where){
    if(!userIsLogedIn('condidate')&& !userIsLogedIn('recruiter')){
        header('location:/login');  
     }
     else if(userIsLogedIn('condidate') && $where!='condidate' && !userIsLogedIn('recruiter')){
        header('location:/login');  
      
     }else if(userIsLogedIn('recruiter') && !userIsLogedIn('condidate')&& $where!='recruiter'){
        header('location:/login'); 
    }
   

}