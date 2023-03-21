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
            <div class="search-input-container flex">
                <input type="text" class="search-input" name="search" placeholder="search..." />
                <button class="search-btn"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20"><path fill="none" d="M0 0h24v24H0z"/><path d="M18.031 16.617l4.283 4.282-1.415 1.415-4.282-4.283A8.96 8.96 0 0 1 11 20c-4.968 0-9-4.032-9-9s4.032-9 9-9 9 4.032 9 9a8.96 8.96 0 0 1-1.969 5.617zm-2.006-.742A6.977 6.977 0 0 0 18 11c0-3.868-3.133-7-7-7-3.868 0-7 3.132-7 7 0 3.867 3.132 7 7 7a6.977 6.977 0 0 0 4.875-1.975l.15-.15z"/></svg></button>
            </div>
            <ul class="flex">
                <li ><a href="/condidate/">home</a></li>
                <li>contact Us</li>
                <li ><a href="/condidate/profile/<?=$user_id?>">profile</a></li>
            </ul>
        </nav>
    </header>

    <section class="body-container main flex">
        <div class="sideBar">
      <ul>
       
      <li class="sideBar-elements competences" >Mes compétences</li>
        <li class="sideBar-elements formations">Mes formations</li>
        <li class="sideBar-elements experiences">Mes expériences</li>
        <li class="sideBar-elements cv">Mon CV</li>
        <li class="sideBar-elements candidatures">Mes Candidatures</li>
        <li class="sideBar-elements favorites">Mes Favorites</li>
        <li class="sideBar-elements "><a href="/chat/<?= $user_id ?>">Messagerie</a></li>
      </ul>
        </div>
        <div class="main-content flex" >

          <div class="offerDetails-container">
          

          <div class="offerContent ">
            <?php if(isset($offer)  && !empty($offer)){ ?>
            <div class="flex w-100 jc-left"><form action="/condidate/offerDetails/<?= $offer['offer_id'] ?>" class="d-content" method="POST">
            <!-- <input type="hidden" value="">     -->
            <button class="btn" name="apply" >apply</button></form></div>
              <div class="offer-header bm-2">
                 
                  <h1><?= $offer['offer_title'] ?> </h1>
                  <span><?= $offer['offer_city'] ?></span>
                </div>
                 <div class="offer-details bm-2">
                       <h2>Full Job Description</h2>
                    
                       <div class="reset-style">

                           <?= html_entity_decode( $offer['offer_description']) ?>
                       </div>
                   
                 </div>
                 <div class=" x">
                    <h2>
                    Hiring Insights
                    </h2>
                    <div class="flex x ">

                        <i class ="fa-solid fa-user-plus f27 p-right-10"></i><p class="f24">Hiring <?= $offer['offer_condidats_num'] ?> candidates </p>
                    </div>
                 </div>
              <?php } ?>
          </div>
          </div>
            

   
        </div>
        <div class="modal-body-container"></div>

    </section>
    <script src="/jsf/modal.js" >
    </script>
  
</body>
</html>