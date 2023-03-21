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
        <div class="sideBar w-25pr ">
      <ul>
        <li class="sideBar-elements " >Mes offres</li>
        <li class="sideBar-elements " ><a href="/recruiter/searchByscore">chercher des candidates</a></li>
        <li class="sideBar-elements "><a href="/recruiter/addOffer"> Ajouter un offre</a></li>
        <li class="sideBar-elements "><a href="/recruiter/candidatures">Candidatures</a></li>
        <li class="sideBar-elements "><a href="/chat/<?= $user_id ?>">Messagerie</a></li>
        
      </ul>
        </div>
        <div class="main-content flex" >
          

                <?php if(isset($condidateurList) && !empty($condidateurList)){ ?>
        <div class="table-container">
           <table class="offer-table">
            <thead>
                <tr>
                <th>ID</th>
                <th class="th-hover sortby" data-colum="2"> <div class="flex space-between th">offer title <div class="flex arrow-up-down"><i class="fa-solid fa-caret-up up"></i><i class="fa-solid fa-caret-down down"></i></div></div> </th>
                <th >condidate CV</th>
                <th >condidate email</th>
                <th class="table-dates th-hover sortby" data-colum="5"><div class="flex space-between ">application date<div class="flex arrow-up-down"><i class="fa-solid fa-caret-up up"></i><i class="fa-solid fa-caret-down down"></i></div></div></th>
                <th class="table-dates th-hover sortby" data-colum="6"> <div class="flex space-between ">creation date<div class="flex arrow-up-down"><i class="fa-solid fa-caret-up up"></i><i class="fa-solid fa-caret-down down"></i></div></div></th>
                </tr>
                
            </thead>

            <tbody class="offer-table-body">
            <?php foreach($condidateurList as $c){ ?>
                <tr>
                <td class="table-offer-id" > <?= $c['offer_id']; ?></td>
                    <td ><p class="offer_title"><?= $c['offer_title']; ?></p></td>
                    <td> <a href="/condidate/CV?filepath=<?= $c['cv_saved_name']; ?>"><?= $c['condidat_CV']; ?></a></td>
                    <td> <?= $c['email']; ?></td>
                    <td class="table-dates"> <?= explode(' ',$c['condidateur_added_time'])[0]; ?></td>
                    <td class="table-dates"> <?=explode(' ', $c['offer_createdAt'])[0]; ?></td>
                </tr>
            <?php } ?>
            </tbody>
           </table>

           </div>

         <?php } ?>
        </div>
       

    </section>
    <script src="/jsf/sortTable.js"></script>
  
</body>
</html>