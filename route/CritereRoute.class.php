<?php
require_once("controller/CritereB.class.php");
require_once("model/Model.class.php");

class CritereRoute{
    
    public function __construct($nameMethod)
    {
        if(method_exists(__CLASS__,$nameMethod)){
            return self::$nameMethod(new CritereB());
        }else{

             throw new Exception("route existe pas".__CLASS__);  
        }  
    }

    public function form(CritereB $critere_b){
        $critere_b->form();
    }

   public function create(CritereB $critere_b){
       $array=[];
       $erreur="";
       $params="";
       foreach($_POST as $key =>$value){
              if($value==""){
                    $erreur="Veuillez remplir les champse marque en rouge";
                    $params.=$key."=".$value."&";

              }else{
                  $params.=$key."=".$value."&";
              }
              $array[$value]=htmlspecialchars($value);
        }
       
        if($erreur!=""){ 
             header("location:http://localhost:8888/index.php?action=form&table=critere&erreur=".$erreur."&".$params);
             exit();
        } 
        $critere_b->create($array);  
    }

   
    public function delete(CritereB $critere_b)
    {    

         $id= isset($_GET['id'])? intval($_GET['id']):false;
         if($id!=''){
               $critere_b->delete($id);

         }else{
           
            throw new Exception("UNE ERREUR ID DANS LA ROUTE SUPPRIMER CRITERE EXISTE PAS");
        }       
      }

      public function gets(CritereB $critere_b){
            $critere_b->gets();
      }

}