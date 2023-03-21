<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/home.css">
    <!-- <link rel="stylesheet" href="/css/.css"> -->
    <script src="https://kit.fontawesome.com/e74923a269.js" crossorigin="anonymous"></script>
    <script src="https://cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>
    <title>home</title>
   
</head>
<body >
    <header class="flex" >
        <nav class="flex  body-container nav" >
            <div class="logo flex">logo</div>
            
            <ul class="flex">
            <li ><a href="/recruiter/candidatures">home</a></li>
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
        <div class="sideBar ">
      <ul>
      <li class="sideBar-elements " >Mes offres</li>
        <li class="sideBar-elements " ><a href="/recruiter/searchByscore">chercher des candidates</a></li>
        <li class="sideBar-elements "><a href="/recruiter/addOffer"> Ajouter un offre</a></li>
        <li class="sideBar-elements "><a href="/recruiter/candidatures">Candidatures</a></li>
        <li class="sideBar-elements "><a href="/chat/<?= $user_id ?>">Messagerie</a></li>
        
      </ul>
        </div>
        <div class="main-content flex" >
          <div class="add-offer-form-container ">
             <form class="add-offer-form" action="/recruiter/addOffer" method="POST" >
                 <div class="input-container">
                   <label for="nom">Titre </label>
                   <input type="text" class="form-control" id="nom" name="title" required placeholder="titre du offre">
                 </div>
                 <div class="input-container">
                   <label for="domene">Domene</label>
                   <input type="text" class="form-control" id="domene" name="offerDomene" required placeholder="domene d'offre">
                 </div>
                 <div class="input-container">
                   <label for="text">ville</label>
                   <input type="text" class="form-control" id="ville" name="city" required placeholder="Ville...">
                 </div>
                 <div class="">
                   <label for="selection">type d'offre</label>
                   <select id="selection" class="select" name="jobType" required>
                     <option value="">Liste de choix...</option>
                       <option value="fullTime">Full-time</option>
                       <option value="permanent">Permanent</option>
                       <option value="partTime">Part-time</option>
                       <option value="intership">Intership</option>
                    
                     
                   </select>
                 </div>

                 <div class="input-container">
                    <label for="text">Nombre du Candidats</label>
                    <input type="number" class="form-control" id="nombre" name="CondidatsNumber" required placeholder="nombre du candidats ..">
                  </div>
                  <br>
                 <div class="">
                   <label for="bio">Description</label>
                   <div class="texterea-container">
                   <textarea class="x"  id="bio" name="OfferDescription" required rows="5"></textarea>
                 </div>
                  </div>
                 <br>
                 <div class="formation-form-btn-container">
                    <button class="btn " name="submit"  type="submit">Enregistré</button>
                   </div>
            
             </form>
         </div>
     </div>
    
            </div>
              

        </div>
      


    </section>
                <script>
                        CKEDITOR.replace( 'OfferDescription' );
                </script>
   
   <script src="/jsf/alert.js"></script>
</body>
</html>