
<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="/js/script.js" >
    </script>
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
                        <p class="text-black">Join our community  <i>- recrutement en ligne</i></p>
                    </div>
                </div>
                <div class="col-md-6 right">

                     <div class="input-box">

                        <form action="/Singup" method="POST">
                        <header>Create account</header>
                        <div class="input-field">
                            <input type="text" class="input" name="firstName" id="first name" required autocomplete="off">
                            <label for="first name">first name</label>
                        </div>
                        <div class="input-field">
                            <input type="text" class="input" id="last name" name="lastName" required>
                            <label for="last name">last name</label>
                        </div>
                        <div class="input-field">
                            <input type="text" class="input" id="email" name="email"  required autocomplete="off">
                            <label for="email">Email</label>
                        </div>
                        <div class="input-field">
                          <input type="text" class="input" id="phone"  name="num" pattern="[0-9]+" value="" required autocomplete="off"/>
                            <label for="phone">phone</label>
                        </div>
                        <div class="input-field">
                            <input type="password" class="input" id="password" name="password"  required autocomplete="off" 
                               value="">
                            <label for="password">password</label>
                        </div>
                        <div class="input-field">
                            <input type="password" class="input" name="passwordConfirm"  id="confirmation_password" required autocomplete="off" 
                            value="">
                            <label for="confirmation_password"> confirmation password</label>
                        </div>
                      
                        <!-- class="valid-feedback"-->
                        <div id="password-message">
                        </div>
                        <div>
                            <input type="radio" id="Choice1"
                             name="role" value="candidat" checked>
                            <label for="Choice1">Candidat</label>
                        
                            <input type="radio" id="Choice2"
                             name="role" value="recruteur">
                            <label for="Choice2">Recruteur</label>
                          </div>
                        <div class="input-field">
                            <input type="submit" class="submit" name="submit" value="Sing Up">
                            
                        </div>
                        <div class="signin">
                            <span>Already have an account? <a href="/login">Log in here</a></span>
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