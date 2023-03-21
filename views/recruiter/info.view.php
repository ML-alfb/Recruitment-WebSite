<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <title>information_recruteur</title>
</head>

<body> 
    <div class="color">
    <div class="wrapper" >
        <div class="container main">
            <div class="row">
                <div class="col-md-6 image ">
                    <div class="container">
                        <p class="text-black">Welcome - in your profile</p>
                    </div>
                </div>
                <div class="col-md-6 right">

                     <div class="input-box">

                        <form action="/recruiter/info" method="POST">
                        <header>please complete this form</header>
                        <div class="input-field">
                            <input type="text" class="input" id=" adress"  name="adress" required autocomplete="off">
                            <label for="adress">Adress</label>
                        </div>
                        <div class="input-field">
                            <input type="text" class="input" id="company name" name="company_name" required>
                            <label for="company name">company name</label>
                        </div>
                        <div class="input-field">
                            <input type="text" class="input" id="secteur-activité" name="activity_area" required autocomplete="off">
                            <label for="secteur-activité">Secteur_activité</label>
                        </div>

                        <div class="input-field">
                            <input type="submit" class="submit" name="submit" value="Suivant">
                            
                        </div>
  
            </form>
            </div>
</body>
</html>