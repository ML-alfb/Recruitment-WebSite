 <?php

require __DIR__.'/../core/router.php';

use Core\Router;
$router=new Router();

require __DIR__.'/../routes.php';

// print_r( $_SERVER) ;
 $uri=parse_url($_SERVER["REQUEST_URI"])['path'];
  

  $method=$_SERVER['REQUEST_METHOD'];
  $router->Route($uri,$method); 

