<?php
   require_once __DIR__.'/route/Route.class.php';
   $methode=isset($_GET['action'])? $_GET['action']:"gets";
   $controller=isset($_GET['type'])? $_GET['type']:"Controllerbie";

   try{

       Route::routeName($controller,$methode);

   }catch(Exception $e){
       
          die($e->getMessage());
   }
   
   
 

 


 