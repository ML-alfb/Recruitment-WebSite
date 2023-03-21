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
<body >
    <header class="flex" >
        <nav class="flex  body-container nav">
            <div class="logo flex">logo</div>
            
            <ul class="flex">
            <li ><a href="/condidate/">home</a></li>
                <li>contact Us</li>
                <li ><a href="/condidate/profile/<?=$user_id?>">profile</a></li>
            </ul>
        </nav>
    </header>

    <section class="body-container main flex">
        <div class="sideBar w-220px ">
          <div class="condidate-info">
            <div class="image">

            
            <div class="image-contianer" >

               
                <?php if(empty($user['img'])){?>
                <img class="profile-img" src="/images/utilisateu.1.avif" alt=""/>
                <?php }else{?>
               
                <img class="profile-img" src="/profiles/<?=($user['img']);?>" />
               
                <?php }?> 
               <?php if($myProfile) {?> <label for="file"><div class="edit-image-icon" ><i class="fa-solid fa-pen-nib f24 w"></i></div></label><?php }?> 
            </div>
            <?php if($myProfile) {?>  <input id="file" class="fileInput" data-id='<?= $user['user_id']?>' type="file"/><?php }?> 
            <!-- <form action=""><button class="btn">Edit image</button></form> -->
            </div>
            <div class="info"><strong>Name</strong>: <p> <?= $user['first_name'] .' '. $user['last_name'] ?></p> </div>
            <div class="info"><strong>Email</strong>: <p><?= $user['email']?></p> </div>
            <div class="info"><strong>Num</strong>: <p><?= $user['num']?></p></div>
            <div class="info"><strong>CV</strong><a href="/condidate/CV?filepath=<?= $user['cv_saved_name']?>">: <p><?= $user['condidat_CV']?></p></a></div>
          </div>
        </div>
        <div class="main-content flex" >
        <?php if(isset($errors)) {?>
                       <div class="error-msg" >
                        <p ><?=$errors?></p>
                    </div>
                    <?php }?>   
           <div class="w-100 scroll">
         <div class="profile-info-container">
            <div class="profile-conpetences-info-container margin-top-10 ">
                <div class="w-100 border-btm-2 info-title"><h2>Conpetences</h2></div>
                <div class="conpetence-info-scroll min-height-120">
                    <ul>
                        <?php foreach($competences as $competence){
                            echo '<li><p class="f-z-24 x">'.$competence['competance_name'].'</p> </li>';
                        } ?>
                        
                       
                    
                       
                    </ul>
                </div>
            </div>
            <div class="profile-formation-info-container margin-top-10 ">
                <div class="w-100 border-btm-2 info-title"><h2>Formation</h2></div>
                <div class="formation-info-scroll min-height-120">
                    <ul>
                    <?php foreach($formations as $formation){?>
                        <li><div class="formation-info-container margin-top-10">
                            <h3><?= $formation['formation_ecole'] ?></h3>
                            <p class="padding-5 f-z-20">filed:<?= $formation['formation_domene'] ?> </p>
                            <p class="padding-5 f-z-20">degree: <?= $formation['formation_deplome'] ?></p>
                            <p class="padding-5 f-z-20">start date: <?= $formation['formation_startedAt'] ?></p>
                            <p class="padding-5 f-z-20">end date:<?= $formation['formation_endedAt'] ?> </p>
                        </div></li>
                       <?php }?>
                        
                        
                       
                       
                        
                       
                    </ul>
                </div>
            </div>
            <div class="profile-formation-info-container margin-top-10 ">
                <div class="w-100 border-btm-2 info-title"><h2>Expirience</h2></div>
                <div class="formation-info-scroll min-height-120">
                    <ul>
                        <?php if(!empty($formations)){?>
                        <li><div class="formation-info-container margin-top-10">
                            <h3>Company</h3>
                            <p class="padding-5 f-z-20">Activity_area: informatiuqe</p>
                            <p class="padding-5 f-z-20">start date: master</p>
                            <p class="padding-5 f-z-20">end date: 15 mounth</p>
                        </div></li>
                        <li><div class="formation-info-container margin-top-10">
                            <h3>Company</h3>
                            <p class="padding-5 f-z-20">Activity_area: informatiuqe</p>
                            <p class="padding-5 f-z-20">start date: master</p>
                            <p class="padding-5 f-z-20">end dat: 15 mounth</p>
                        </div></li>
                        <?php }?>
                       
                       
                        
                       
                    </ul>
                </div>
            </div>
         </div>
        </div>
       
        </div>
        <div class="modal-body-container">

        </div>
        
        </div>
    </section>
  <script src="/jsf/profile.js"></script>
  <script src="/jsf/alert.js"></script>
</body>
</html>