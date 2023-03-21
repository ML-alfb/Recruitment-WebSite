

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <title>Login | recrutement en ligne</title>
    <style>
    <?php
     include __DIR__.'/../../public/css/style.css';
      ?> 
 </style>
</head>

<body>
    <div class="wrapper">
        <?php if(isset($errors)) {?>
                       <div class="error-msg" >
                        <p ><?=$errors?></p>
                    </div>
                    <?php }?>         
        <div class="container main">
            <div class="row">
                <div class="col-md-6 side-image">
                
                    <div class="container">
                        <p class="text-black">Join our community - recrutement en ligne</p>
                    </div>
                </div>
                <div class="col-md-6 right">

                     <div class="input-box">

                        <form action="/login" method="POST">
                        <header>Welcome back</header>

                        <div class="input-field">
                            <input type="text" class="input" id="email" name="email" required autocomplete="off" >
                            <label for="email">Email</label>
                        </div>
                        <div class="input-field">
                            <input type="password" class="input" id="password" name="password" required autocomplete="off" 
                               value="">
                            <label for="password">password</label>
                        </div>
                       
                       
                        <div class="input-field">
                            <input type="submit" class="submit" value="login" name="submit"> 
                        </div>
                        <div class="signin">
                            <span> haven't an account? <a href="/Singup">register here</a></span>
                        </div>
                    </form>
                     </div>
                </div>
            </div>
        </div>
    </div>
  <script src="/jsf/alert.js"></script>
</body>
</html>