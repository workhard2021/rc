<?php 
class Autoload{

     public static function load(){
         
        spl_autoload_register(function($class){
            return require_once __DIR__."/route/" .$class . ".class.php";
        });
     }
     
     
}