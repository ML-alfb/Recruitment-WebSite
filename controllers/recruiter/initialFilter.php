<?php
session_start();

$user_id=(int)$_SESSION['recruiter_id'];
$errors=[];
$msg='';


if($_SERVER['REQUEST_METHOD']==='POST'){

   if(isset($_POST['submit'])){
    
     $competences= isset($_POST['competences'])?$_POST['competences']:[];
     $experience= isset($_POST['experience'])?$_POST['experience']:'';
     $education=isset($_POST['education'])?$_POST['education']:'';
     $domene=isset($_POST['domene'])?$_POST['domene']:'';
  
    if(!empty($competences)){
       
       

        require __DIR__.'/../../core/Competance.php';
        $Competence=new Competance();
        foreach($competences as $competence_name){
            $competence_id=$Competence->checkCompetance($competence_name)?$Competence->checkCompetance($competence_name)['competance_id']:false;
           if($competence_id){
            if(!$Competence->ckeckUserCompetance($competence_id,$user_id)){
            if(!$Competence->insertUserCompetance($competence_id,$user_id)){
                $errors['inserting']='database error';
            };}
           }
           else{
           if( $Competence->insertCompetance($competence_name)){
            $competence_id=$Competence->checkCompetance($competence_name)['competance_id'];
            if($competence_id){
                
             if(!$Competence->insertUserCompetance($competence_id,$user_id)){
                 $errors['inserting']='database error2';
             };
           }else{
            $errors['inserting']='database error1';
           }

          }
         }
        }
    }
   ########################## expirience inserting ###########
   if(!empty($experience)){
    require __DIR__.'/../../core/Expirience.php';
    $Expirience=new Expirience();
    
        $Expirience->insertUserExpirience($experience,$user_id);
    
    
   }

   ########################## domene inserting ###########
   if(!empty($domene)){
    require __DIR__.'/../../core/Domene.php';
    $Domene=new Domene();
    
        $domene_id=$Domene->checkDomene($domene)?$Domene->checkDomene($domene)['domene_id']:false;
       if($domene_id){
        if(!$Domene->ckeckUserDomene($domene_id,$user_id)){
        if(!$Domene->insertUserDomenes($domene_id,$user_id)){
            $errors['inserting']='database error5';
        };}
       }
       else{
       if( $Domene->insertDomene($domene)){
        $domene_id=$Domene->checkDomene($domene)['domene_id'];
        if($domene_id){
            
         if(!$Domene->insertUserDomenes($domene_id,$user_id)){
             $errors['inserting']='database error4';
         }
       }else{
        $errors['inserting']='database error6';
       }

      }
     }
    
}

   ########################## education inserting ###########
   if(!empty($education)){
    require __DIR__.'/../../core/Education.php';
    $Education=new Education();
    
        $education_id=$Education->checkEducation($education)?$Education->checkEducation($education)['education_id']:false;
       if($education_id){
        if(!$Education->ckeckUserEducation($education_id,$user_id)){
        if(!$Education->insertUserEducation($education_id,$user_id)){
            $errors['inserting']='database error5';
        };}
       }
       else{
       if( $Education->insertEducation($education)){
        $education_id=$Education->checkEducation($education)['education_id'];
        if($education_id){
            
         if(!$Education->insertUserEducation($education_id,$user_id)){
             $errors['inserting']='database error4';
         };
       }else{
        $errors['inserting']='database error6';
       }

      }
     }

    
}

    

   }
   if(empty($errors)){
    header('location:/login');
   }
}

require  __DIR__.'/../../views/recruiter/initialFilter.view.php';