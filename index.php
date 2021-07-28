<?php 
 session_start();
  header("Access-Control-Allow-Origin:*");
  header("Access-Control-Allow-Methods: GET,DELETE,POST, OPTIONS");
   require_once __DIR__.'/route/Route.class.php';
   $methode=isset($_GET['action'])? $_GET['action']:"gets";
   
   try{
        $App=new Route($methode);

   }catch(Exception $e){
         
          http_response_code(201);
          die($e->getMessage());
   }
  
   



   
   
 

 


 