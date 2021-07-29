<?php 
 session_start();
  header("Access-Control-Allow-Origin:*");
  header("Access-Control-Allow-Methods: GET,DELETE,POST, OPTIONS");

   require_once __DIR__.'/route/Route.class.php';

   require_once __DIR__.'/route/ClientRoute.class.php';
   require_once __DIR__.'/route/CritereRoute.class.php';
   require_once __DIR__.'/route/BieRoute.class.php';

   $methode=isset($_GET['action'])? $_GET['action']:"gets";
   $class=isset($_GET['table'])? htmlspecialchars($_GET["table"]):"bie";
    
   try{
        if($class!=""){

           $class=ucfirst($class)."Route";
           $App=new $class($methode);

        }else{
          $App=new Route($methode);
        }
        
   }catch(Exception $e){
         
          http_response_code(201);
          die($e->getMessage());
   }
  
   



   
   
 

 


 