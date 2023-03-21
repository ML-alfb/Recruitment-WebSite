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
        <li class="sideBar-elements "><a href="/chat/<?= $user_id ?>">Messagerie</a></li>
        
      </ul>
        </div>
        <div class="main-content flex" >

            

   
        </div>
       

    </section>
  
</body>
</html>