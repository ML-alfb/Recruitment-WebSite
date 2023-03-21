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
        <div class="sideBar ">
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
            <div class="offers-filter flex">
              <form action="/condidate/home" method="POST" class="w-100 flex">

              
             
                    
                    <select name="date" class="select-sml"  id="">
                        <option value="">publication date</option>
                        <option value="86400" <?= selected('date',86400) ?>>last 24 hours</option>
                        <option value="259200" <?= selected('date',259200) ?>>3 days</option>
                        <option value="604800"<?= selected('date',604800) ?>>7 days</option>
                        <option value="1209600"<?= selected('date',1209600) ?>>14 days</option>
                    </select>
               
                <select name="offerType" class="select-sml" id="">
                    <option value="">offer type</option>
                    <option value="fullTime" <?= selected('offerType',"fullTime") ?>>FullTime</option>
                    <option value="partTime" <?= selected('offerType',"partTime") ?>>PartTime</option>
                    <option value="permanent" <?= selected('offerType',"permanent") ?>>Permanent</option>
                    <option value="intership" <?= selected('offerType',"intership") ?>>intership</option>
                                    </select>
               
                <div class="input-container">

                  <input type="text" class="city-input" name="city" value="<?= cityValue() ?>" placeholder="city..." />
                </div>
                <button class="filter-btn btn" type="submit" name="filter"  >filter</button>
                </form>
            </div>


            <div class="offer-cart-container flex">

              <?php if(isset($offers)){ ?>
              <?php foreach($offers as $offer){ ?>
              <div class="offer-cart flex">
                <div>
                <a href="/condidate/offerDetails/<?= $offer['offer_id'] ?>">
                  <h3 ><?= strtoupper( $offer['offer_title'] )?></h3></a>
                  <p><?=  $offer['offer_city'] ?></p>
                </div>   
                <div>
                  <span class="offer-type-chip"><?=  $offer['offer_type'] ?></span>
                </div>
                <div class="cart-footer flex">
                <span><?= offerIsPosted($offer['offer_createdAt']); ?></span>
                    <button class="favorites-btn <?= isFavoriteOffersCookie($offer['offer_id'])? 'save':'' ?> " data-id=<?= $offer['offer_id'] ?>>
                   <div class="saved">
                     <i class="fa-solid fa-bookmark  f24"></i>
                   </div> 
                   <div class="insaved">
                     <i class="fa-regular fa-bookmark  f24"></i>
                   </div> 
                    </button>
                </div>
              </div>
         
            <?php } ?>
            <?php } ?>

          
              
             
            </div>
              

        </div>
        <div class="codidats-profile flex" >
             
        </div>


        <div class="modal-body-container"></div>
    </section>
   
  <script src="https://cdnjs.cloudflare.com/ajax/libs/js-cookie/3.0.1/js.cookie.min.js" ></script>
  <script src="/jsf/modal.js" >
    </script>
</body>
</html>