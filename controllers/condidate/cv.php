<?php
session_start();

$user_id=(int)$_SESSION['condidate_id'];
if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest'){

    require_once __DIR__.'/../functions.php';
    allwedPages('condidate');
    
    if($_SERVER['REQUEST_METHOD']==='GET'){
       
        require __DIR__.'/../../core/Condidat.php';
        $Condidat=new Condidat();
        if($condidat=$Condidat->getCondidat($user_id)){
            // print_r($condidat);
           echo json_encode($condidat);
           exit;
        }else{
            echo 0;
            exit;
        }

          }
    


}else{



    if($_SERVER['REQUEST_METHOD']==='POST'){

        if(isset($_POST['submit'])){
       
        $uploadDir = __DIR__.'/../uploads/';
        
      
      
        if(!empty($_FILES["fileInput"]["name"])){ 
         $xt= explode( '.',basename($_FILES['fileInput']['name']));
         $fileSavedAs=$xt[0].'-'.date("Y-m-d").'.'.$xt[1];
        $uploadfile = $uploadDir .$fileSavedAs ;
        
        if (move_uploaded_file($_FILES['fileInput']['tmp_name'], $uploadfile)) {
            require __DIR__.'/../../core/Condidat.php';
        $Condidat=new Condidat();
      
        if($Condidat->insertCondidatCV($user_id,basename($_FILES['fileInput']['name']),$fileSavedAs)){

            header("location:/condidate");
        }
        } else {
            echo "Possible file upload attack!\n";
        }
    }
         
    }
}



if($_SERVER['REQUEST_METHOD']==='GET'){

    $filepath= __DIR__.'/../uploads/'.$_GET['filepath'];
    if (file_exists($filepath)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . basename($filepath) . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($filepath));
        flush(); // Flush system output buffer
        readfile($filepath);
        die();
      } else {
        http_response_code(404);
        die();
      }
}
}