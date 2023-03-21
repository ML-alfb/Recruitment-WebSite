<?php

namespace Core;
class Router{

    private $Routes=[];

    public function get($uri,$controller){
        $this->addToRoutes($uri,$controller,'GET');
    }

    public function post($uri,$controller){
        $this->addToRoutes($uri,$controller,'POST');
     }

     public function delete($uri,$controller){
        $this->addToRoutes($uri,$controller,"DELETE");
     }
     public function put($uri,$controller){
      $this->addToRoutes($uri,$controller,"PUT");
   }


     public function addToRoutes($uri,$controller,$method){
        $this->Routes[]=[
         'uri'=>$uri,
         'controller'=>$controller,
         'method'=>$method
        ];

     }

     public function Route($uri,$method){
       $uri= rtrim($uri,'/')   ;   
        
            foreach($this->Routes as $route){
               if( $route['uri']===$uri &&$route['method']===$method){
                  
                  return require $route['controller'];
               }
                else
                 if( $route['method']===$method){   
                 
                    $x= preg_replace('/:([\w]+)/','([^\/]+)',$route['uri']);
                       $regex="#^$x$#";
                       if(preg_match($regex,$uri,$routes)){
                         array_shift($routes);
                        $param=$routes[0];
                        
                        return require $route['controller'];

                       }
                      
                }
               }

                    return require __DIR__.'/../views/error.php';

          
                  
   
}

}

?>