<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/home.css">
    <script src="https://kit.fontawesome.com/e74923a269.js" crossorigin="anonymous"></script>
    <script src="https://cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>

    
    <title>home</title>
   
</head>
<body>
    <header class="flex" >
        <nav class="flex  body-container nav">
            <div class="logo flex">logo</div>
           
            <ul class="flex">
            <?php if($role===1959) {?>
                <li ><a href="/recruiter/candidatures">home</a></li>
            <?php } else {?>
            <li ><a href="/condidate/">home</a></li>
             <?php }?>
                <li>contact Us</li>
                <li>profile</li>
            </ul>
        </nav>
    </header>

    <section class="body-container main flex">
    <?php if(isset($errors)) {?>
                       <div class="error-msg" >
                        <p ><?=$errors?></p>
                    </div>
                    <?php }?>   
                     <?php if(isset($msg)) {?>
                       <div class="success-msg" >
                        <p ><?=$msg?></p>
                    </div>
                    <?php }?>  
        <div class="sideBar  w-25pr ">
      <ul>

     
      <?php if($role===1959) {?>
        <li class="sideBar-elements " >Mes offres</li>
        <li class="sideBar-elements " ><a href="/recruiter/searchByscore">chercher des candidates</a></li>
        <li class="sideBar-elements "><a href="/recruiter/addOffer"> Ajouter un offre</a></li>
        <li class="sideBar-elements "><a href="/recruiter/candidatures">Candidatures</a></li>
        <li class="sideBar-elements "><a href="/chat/<?= $userId ?>">Messagerie</a></li>
        <?php } else {?>
        <li class="sideBar-elements competences" >Mes compétences</li>
        <li class="sideBar-elements formations">Mes formations</li>
        <li class="sideBar-elements experiences">Mes expériences</li>
        <li class="sideBar-elements cv">Mon CV</li>
        <li class="sideBar-elements candidatures">Mes Candidatures</li>
        <li class="sideBar-elements favorites">Mes Favorites</li>
        <li class="sideBar-elements "><a href="/chat/<?= $userId ?>">Messagerie</a></li>
        <?php }?>
        
      </ul>
        </div>
        <div class="main-content relative flex" >
            <div class="detiailes-msg-form-continer reset-style">
                <div class="bg">
                    <h3>from: <?= $chatDetail['sender_email'] ?></h3>
                </div>
                <div class="bg">
                    <h3>to: <?= $chatDetail['reciever_email'] ?></h3>
                </div>
                <div class="b-2">

                    <?= html_entity_decode($chatDetail['message']) ?>
                </div>
            </div>
        </div>

       
    </section>

</body>
</html>