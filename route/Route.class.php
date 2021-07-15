<?php
 require_once 'controller/controllerBie.class.php';

class Route{

    public  $routeName="gets";
    public static function gets(Array $arg){
           
        if(count($arg)>0){
             return  $arg['controller']->gets();

         }else{
               throw new Exception("ROUTE gets error");

         }     
    }

    public static function get(Array $arg){

        $id= isset($_GET['id'])? intval($_GET['id']):false;

        if(!$id){
             throw new Exception("PARAMETTRE ID EXISTE PAS ROUTE GET");
        }
        if(count($arg)>0){

             return  $arg['controller']->get($id);
        }  
         else{

            throw new Exception("ROUTE get error");

         }   
    }

    public static function form(Array $arg){

        if(count($arg)>0){

            return  $arg['controller']->form();
        }  
        else{

           throw new Exception("ROUTE FORM error");

        }  
          
    }

    public static function delete(){
     
    }

    public static function create(Array $arg){

        if(count($arg)>0){
            
            return  $arg['controller']->create();

        }else{
            throw new Exception("ROUTE create error");

        }  
        
    }

    public static function update(Array $arg){

        if(count($arg)>0){
            
            return  $arg['controller']->update();

        }else{
               throw new Exception("ROUTE update error");

         }  
    }
    
    public static function routeName($controller,$nameMethod){
        
        if(method_exists(__CLASS__,$nameMethod)){
              
            return self::$nameMethod(["controller"=>new $controller() ]);

        }else{

             throw new Exception("route existe pas".__CLASS__);
             
        }
         
    }
    
}