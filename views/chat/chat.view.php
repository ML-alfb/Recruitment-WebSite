<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/home.css">
    <script src="https://kit.fontawesome.com/e74923a269.js" crossorigin="anonymous"></script>
    <script src="https://cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>

    
    <title>home</title>
   
</head>
<body>
    <header class="flex" >
        <nav class="flex  body-container nav">
            <div class="logo flex">logo</div>
           
            <ul class="flex">
            <?php if($role===1959) {?>
                <li ><a href="/recruiter/candidatures">home</a></li>
            <?php } else {?>
            <li ><a href="/condidate/">home</a></li>
             <?php }?>
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
        <div class="sideBar  w-25pr ">
      <ul>

     
      <?php if($role===1959) {?>
        <li class="sideBar-elements " >Mes offres</li>
        <li class="sideBar-elements " ><a href="/recruiter/searchByscore">chercher des candidates</a></li>
        <li class="sideBar-elements "><a href="/recruiter/addOffer"> Ajouter un offre</a></li>
        <li class="sideBar-elements "><a href="/recruiter/candidatures">Candidatures</a></li>
        <li class="sideBar-elements "><a href="/chat/<?= $userId ?>">Messagerie</a></li>
        <?php } else {?>
        <li class="sideBar-elements competences" >Mes compétences</li>
        <li class="sideBar-elements formations">Mes formations</li>
        <li class="sideBar-elements experiences">Mes expériences</li>
        <li class="sideBar-elements cv">Mon CV</li>
        <li class="sideBar-elements candidatures">Mes Candidatures</li>
        <li class="sideBar-elements favorites">Mes Favorites</li>
        <li class="sideBar-elements "><a href="/chat/<?= $userId ?>">Messagerie</a></li>
        <?php }?>
        
      </ul>
        </div>
        <div class="main-content relative flex" >
            <div class="add-msg-form-continer">
                <div class="close-form-contianer w-100"><div><h1>Send Message</h1></div> <div class="close-form"><i class="fa-solid fa-x f27"></i></div></div>
              

                
                <form class="from" action="/chat/<?= $userId ?>" method="POST" >

                 <div class="input-container">
                   <label for="to">To</label>
                   <input type="text" class="" id="to" name="to" required placeholder="to...">
                 </div>
                 <div class="input-container">
                   <label for="subject">subject</label>
                   <input type="text" class="" id="subject" name="subject" required placeholder="subject...">
                 </div>
                
                 <div class="fg-1">
                   <label for="message">Message</label>
                   <div class="texterea-container ">
                   <textarea class=""  id="message" name="message" required rows="5"></textarea>
                 </div>
                  </div>
                 <br>
                 <div class="formation-form-btn-container">
                    <button class="btn " name="submit" value="send" type="submit">Send</button>
                   </div>
            
             </form>
            </div>
            
            <div class="send-msg-btn-contianer"><button class="btn send-msg-btn">Send message</button></div>
            <div class="whereAmI flex">
              <div class="togele-menu">
              <a href="/chat/<?= $userId ?>">sent</a> 
              </div>
              <div class="togele-menu-remove">
              <a href="/chat/received/<?= $userId ?>">received</a> 
              </div>
            </div>
         <div class="msgs-table-container w-100">
            <div class="w-100">
            <table class="msg-table w-100">
                <thead class="bg-color">
                    <tr>
                    <th class="w-25">
                        TO
                    </th>
                    <th class="w-50">
                       
                        SUBJECT
                    </th>
                    <th class="w-25">
                        TIME
                    </th>
                    </tr>
                    
                </thead>
                <tbody>
                    <?php foreach($chats as $chat){ ?>
                       
                        <tr class=<?= $chat['stat'] ?'seen':''?>>
                            <td class="w-25">
                            <a class="w-100" href="/chat/chatDetails/<?= $userId ?>?chat=<?= $chat['chat_id']?>">
                            <?= $chat['reciever_email']?>
                            </a>
                            </td>
                            <td  class="w-50">
                            <a class="w-100" href="/chat/chatDetails/<?= $userId ?>?chat=<?= $chat['chat_id']?>">
                            <?= $chat['subject']?>
                            </a>
                            </td>
                            <td class="w-25">
                            <a class="w-100" href="/chat/chatDetails/<?= $userId ?>?chat=<?= $chat['chat_id']?>">
                            <?= $chat['time']?>
                            </a>
                            </td>
                        </tr>
                    
                        <?php } ?>
                    
            
                      
                    
                </tbody>
            </table>
            </div>
            
         </div>
            

   
        </div>
       
        <?php if($role == 2001) {?>
        <div class="modal-body-container"></div>
    <?php }?>
    </section>
    <?php if($role == 2001) {?>
    <script src="/jsf/modal.js" ></script>
    <?php }?>
    <script src="/jsf/msgForm.js" ></script>
    <script>
      
            CKEDITOR.replace( 'message' );
        
    </script>
     <script src="/jsf/alert.js"></script>
</body>
</html>