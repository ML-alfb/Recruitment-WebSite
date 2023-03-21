<?php
$title='show';
       require __DIR__.'/../partials/header.php';?>
     <style>
        body::before{
            content:"";
            display:block;
            height: 60px;
        }
    </style>
</head>
<body>
    
    <div class="navbar navbar-expand-md bg-dark navbar-dark text-white fixed-top">
        
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bank2" viewBox="0 0 16 16">
          <path d="M8.277.084a.5.5 0 0 0-.554 0l-7.5 5A.5.5 0 0 0 .5 6h1.875v7H1.5a.5.5 0 0 0 0 1h13a.5.5 0 1 0 0-1h-.875V6H15.5a.5.5 0 0 0 .277-.916l-7.5-5zM12.375 6v7h-1.25V6h1.25zm-2.5 0v7h-1.25V6h1.25zm-2.5 0v7h-1.25V6h1.25zm-2.5 0v7h-1.25V6h1.25zM8 4a1 1 0 1 1 0-2 1 1 0 0 1 0 2zM.5 15a.5.5 0 0 0 0 1h15a.5.5 0 1 0 0-1H.5z"/>
          </svg>
        <div class="container">
<a href="#" class="navbar-brand">Bootstrap Tutorial</a>
        


<button 
class="navbar-toggler"
 type="button"
 data-bs-toggle="collapse" data-bs-target="#mainmenu"
 >
 <span class="navbar-toggler-icon"></span>
 </button>

<div class="collapse navbar-collapse" id="mainmenu">
    <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a href="#hero" class="nav-link">Get started</a></li>
        <li class="nav-item"><a href="#features" class="nav-link">Features</a></li>
        <li class="nav-item dropdown">
            <a href="#learn" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Learn</a>
        <ul class="dropdown-menu">
            <li><a href="#learn" class="dropdown-item">Learn Bootstrap</a></li>
            <li><a href="#next" class="dropdown-item">Where to go next</a></li>
        </ul>
        </li>
            <li class="nav-item"><a href="#faq" class="nav-link">Ask me</a></li>
        </ul>
</div>
        </div>
    </div>
<!--Hero-->
<section id="hero" class="bg-dark text-light text-center text-lg-start py-5" > 
    <div class="container">
    <div class="d-sm-flex align-items-center justify-content-center">
        <div>
            <h1 class="display-2">Learn <span class="text-info">Bootstrap</span> </h1>
            <p class="py-1 lead">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Doloremque nesciunt, minima modi quis quia excepturi illo quisquam cupiditate exercitationem incidunt!</p>
            <button class="btn btn-info">Get started</button>
           
        </div>
        <img class="img-fluid w-50" src="img/hero.svg" alt="">
    </div>
    </div>
</section>
<!--Services-->
<section id="features" class="py-5">
<div class="container">
    <h2 class="text-center mb-4">
        Features
    </h2>
    <div class="row test-center">
        <div class="col-md">
            <div class="card bg-dark text-light mb-3">
                <!--<img src="https://picsum.photos/300/200" alt="" class="card-img-top">-->
               <div class="h1 mt-3"></div>
            
              

                <div class="card-body text center">
                 <h4 class="card-title text-info">Responsive</h4>
                 <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque, veniam?</p>
                 <a href="#" class="btn btn-info">Learn more</a>
                </div>
            </div>
        </div>
        <div class="col-md">
            <div class="card bg-dark text-light mb-3">
                <!--<img src="https://picsum.photos/300/200" alt="" class="card-img-top">-->
               <div class="h1 mt-3"></div>
               
               <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrows-angle-contract" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M.172 15.828a.5.5 0 0 0 .707 0l4.096-4.096V14.5a.5.5 0 1 0 1 0v-3.975a.5.5 0 0 0-.5-.5H1.5a.5.5 0 0 0 0 1h2.768L.172 15.121a.5.5 0 0 0 0 .707zM15.828.172a.5.5 0 0 0-.707 0l-4.096 4.096V1.5a.5.5 0 1 0-1 0v3.975a.5.5 0 0 0 .5.5H14.5a.5.5 0 0 0 0-1h-2.768L15.828.879a.5.5 0 0 0 0-.707z"/>
              </svg>

                <div class="card-body text center">
                 <h4 class="card-title text-info">Responsive</h4>
                 <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque, veniam?</p>
                 <a href="#" class="btn btn-info">Learn more</a>
                </div>
            </div>
        </div>
        <div class="col-md">
            <div class="card bg-dark text-light mb-3">
                <!--<img src="https://picsum.photos/300/200" alt="" class="card-img-top">-->
               <div class="h1 mt-3"></div>
               
               <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrows-angle-contract" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M.172 15.828a.5.5 0 0 0 .707 0l4.096-4.096V14.5a.5.5 0 1 0 1 0v-3.975a.5.5 0 0 0-.5-.5H1.5a.5.5 0 0 0 0 1h2.768L.172 15.121a.5.5 0 0 0 0 .707zM15.828.172a.5.5 0 0 0-.707 0l-4.096 4.096V1.5a.5.5 0 1 0-1 0v3.975a.5.5 0 0 0 .5.5H14.5a.5.5 0 0 0 0-1h-2.768L15.828.879a.5.5 0 0 0 0-.707z"/>
              </svg>

                <div class="card-body text center">
                 <h4 class="card-title text-info">Responsive</h4>
                 <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque, veniam?</p>
                 <a href="#" class="btn btn-info">Learn more</a>
                </div>
            </div>
        </div>
    </div>
</div>

</section>

<!-- What to learn-->
<section id="learn" class="py-5">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-md">
                <img src="img/undraw_female_avatar_efig.svg" alt="" class="img-fluid">
            </div>
            <div class="col-md">
                <h2>Learn the Basics</h2>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Temporibus impedit quae sed eos, eius molestias. Reiciendis quasi in quam quas!</p>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsam sint unde vitae?</p>
            </div>
        </div>
    </div>
</section>



<!-- Next-->
<section id="next" class="py-5 bg-dark text-light">
    <div class="container">
        <div class="row align-items-center justify-content-center flex-row-reverse">
          
            <div class="col-md">
                <h2>Where to go next</h2>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Temporibus impedit quae sed eos, eius molestias. Reiciendis quasi in quam quas!</p>
            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ipsam sint unde vitae?</p>
            </div>
            <div class="col-md">
                <img src="img/undraw_male_avatar_g98d.svg" alt="" class="img-fluid">
            </div>
        </div>
    </div>
</section>

<!-- Faq-->
<section id="faq" class="py-5">
    <div class="container">
        <h2 class="text-center mb-3">
            Frequently Asked Questions
        </h2>
        <div class="accordion accordion-flush" id="bt-faq">
            <div class="accordion-item">
                <h5 class="accordion-header" id="question-one">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#answer-one">
                    Question One
                  </button>
                </h5>
                <div class="accordion-collapse collapse" id="answer-one" data-bs-parent="#bt-faq">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                </div>
            </div>


            <div class="accordion-item">
                <h5 class="accordion-header" id="question-two">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#answer-two">
                    Question Two
                  </button>
                </h5>
                <div class="accordion-collapse collapse" id="answer-two" data-bs-parent="#bt-faq">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                </div>
            </div>



            <div class="accordion-item">
                <h5 class="accordion-header" id="question-three">
                  <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#answer-three">
                    Question Three
                  </button>
                </h5>
                <div class="accordion-collapse collapse" id="answer-three" data-bs-parent="#bt-faq">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                </div>
            </div>
        </div>
    </div>
</section>



<!--Footer-->

<footer class="py-5 bg-dark text-white text-center">
    <div class="container">
        <p class="lead">
            Copyright &copy; 2021 Salma Bourizi
        </p>
        <a href="#" >
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-c-circle" viewBox="0 0 16 16">
                <path d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8Zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0ZM8.146 4.992c-1.212 0-1.927.92-1.927 2.502v1.06c0 1.571.703 2.462 1.927 2.462.979 0 1.641-.586 1.729-1.418h1.295v.093c-.1 1.448-1.354 2.467-3.03 2.467-2.091 0-3.269-1.336-3.269-3.603V7.482c0-2.261 1.201-3.638 3.27-3.638 1.681 0 2.935 1.054 3.029 2.572v.088H9.875c-.088-.879-.768-1.512-1.729-1.512Z"/>
              </svg>
        </a>
    </div>
    </footer>
<?php  require  __DIR__.'/../partials/footer.php'; ?>



    
   


 



