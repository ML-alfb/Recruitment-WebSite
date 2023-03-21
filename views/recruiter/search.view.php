<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/home.css">
    <script src="https://kit.fontawesome.com/e74923a269.js" crossorigin="anonymous"></script>
    
    <title>home</title>
   
</head>
<body>
    <header class="flex" >
        <nav class="flex  body-container nav">
            <div class="logo flex">logo</div>
          
            <ul class="flex">
            <li ><a href="/recruiter/candidatures">home</a></li>
                <li>contact Us</li>
                <li>profile</li>
            </ul>
        </nav>
    </header>

    <section class="body-container main flex">
        <div class="sideBar ">
      <ul>
        
      <li class="sideBar-elements " >Mes offres</li>
        <li class="sideBar-elements " ><a href="/recruiter/searchByscore">chercher des candidates</a></li>
        <li class="sideBar-elements "><a href="/recruiter/addOffer"> Ajouter un offre</a></li>
        <li class="sideBar-elements "><a href="/recruiter/candidatures">Candidatures</a></li>
        <li class="sideBar-elements "><a href="/chat/<?=$user_id ?>">Messagerie</a></li>
        
      </ul>
        </div>
        <div class="main-content flex" >

            <div class="initailfilter w-100 flex">
                <form action="" class="w-100 flex">

                
            <div class="w-100">
        <select id="selection" class="select" name="jobType" required>
                     <option value="">competences</option>
                     <?php foreach($competences as $competence){
                        if( $Rcompetence == $competence['competance_name']){

                            echo " <option selected value=".$competence['competance_name'].">".$competence['competance_name']."</option>";
                        }else{
                            echo " <option value=".$competence['competance_name'].">".$competence['competance_name']."</option>";

                        }
                      }?>
                    
                     
                   </select>
        </div>
            <div class="w-100 h-select">
        <select id="selection" class="select" name="jobType" required>
                     <option value="">education</option>
                      <?php foreach($educations as $education){
                      if( $Reducation == $education['education_name']){
                        echo " <option selected value=".$education['education_name'].">".$education['education_name']."</option>";
                    }else{
                        echo " <option value=".$education['education_name'].">".$education['education_name']."</option>";
                        
                    }
                      }?>
                    
                     
                   </select>
        </div>
            <div class="w-100">
        <select id="selection" class="select" name="jobType" required>
                     <option value="">domene</option>
                     <?php foreach($domenes as $domene){
                         if( $Rdomene == $domene['domene_name']){

                            echo " <option selected value=".$domene['domene_name'].">".$domene['domene_name']."</option>";
                        }else{
                            echo " <option value=".$domene['domene_name'].">".$domene['domene_name']."</option>";
                            
                        }
                      }?>
                    
                     
                   </select>
        </div>
            <div class="w-100">
        <select id="selection" class="select" name="jobType" required>
                     <option value="">expériences</option>
                       <option value="1">one year</option>
                       <?php foreach($expiriences as $expirience){
                         if( $Rexpirience == $expirience['expirience_years']){

                            echo " <option selected value=".$expirience['expirience_years'].">".$expirience['x']."</option>";
                        }else{
                            echo " <option value=".$expirience['expirience_years'].">".$expirience['x']."</option>";
                            
                        }
                      }?>
                       
                   </select>
        </div>

            <button class="btn">filter</button>
        </form>
            </div>
            <div class="condidates-profile-container w-100">
                <ul class="w-100">
                <?php foreach($users as $user){
                    // print_r($user); 
                       echo'  <li class="w-90"><a href="/condidate/profile/'.$user['user_id'].'" class="w-100"><div class="profile-container flex">
                         <div class="w-100"><strong>Name: </strong>'.$user['first_name'].' '.$user['last_name'].'</div>
                         <div class="w-100"><strong>email: </strong>'.$user['email'].' </div>
                         <div class="w-100"><strong>num: </strong>'.$user['num'].'</div>
                         
                      </div></a></li>';
                      }?>
                    
                   
                </ul>
                      
            </div>


   
        </div>
       

    </section>
  
</body>
</html>