<?php



class Database {
   

    public function connect()
    {
        try {
            
            $db=new PDO('mysql:host=localhost;dbname=application_recrutement','root','');
            return $db;
        } catch (PDOException $e) {
            //throw $th;
            echo $e->getMessage();
            echo "no connection";
        }
    }
   
    
}

 
// $link = mysqli_connect('localhost', 'root', '', 'login');
