<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/e74923a269.js" crossorigin="anonymous"></script>

    <title>Document</title>
    <style>
    <?php
     include __DIR__.'/../../public/css/initialFilerForm.css';
      ?> 
 </style>
</head>
<body>
    <div class="form_container">
    <h3>What you are looking for</h3>
    <form action="/recruiter/initialFilter" class="form" method="POST">

   
        
        <div class="input_container section "> 
            <label for="competence_input">competences:</label>
            <div class="relative ">
                <input type="text" id="competence_input" value="">
                <button type="button" class="add_btn" id="add_competence">add</button>
            </div>
            <div class="competence_section chips"></div>
        </div>
        
      
        <div class="input_container ">
            <label for="Education_input">education:</label>
            <input type="text" id="Education_input" name="education" value="" required>
        </div>
        <div class="input_container">
            <label for="domene_input">domene:</label>
            <input type="text" id="domene_input" name="domene" value="" required>
        </div>
        <div class="">
                   <label for="selection">expérience</label>
        <select id="selection" class="select" name="experience" required>
                     <option value="">Liste de choix...</option>
                       <option value="1">one year</option>
                       <option value="2">two years</option>
                       <option value="3">three years</option>
                       <option value="4">four years</option>
                       <option value="5">five years plus</option>
                    
                     
                   </select>
        </div>
         <div class="btn-container">

             <input type="submit" name="submit" value="Submit">
         </div>
   
       
    
    </form>
    </div>

</body>
<script src="/jsf/initialFilter.js">



</script>
</html>