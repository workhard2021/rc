<?php

require_once ('controller/Bie_c.class.php');
class BieRoute{
     
    public function __construct($nameMethod)
    {
        if(method_exists(__CLASS__,$nameMethod)){
            return self::$nameMethod(new Bie_c());
        }else{

             throw new Exception("route existe pas".__CLASS__);  
        }  
    }

    public  function delete(Bie_c $bie){

        $id= isset($_GET['id'])? intval($_GET['id']):false;
        if(!$id){
            throw new Exception("PARAMETTRE ID EXISTE PAS ROUTE DELETE BIE");
        }
        $bie->delete($id);
    }

    public function form(Bie_c $bie){

        if((isset($_SESSION["session_critere_b"]) && count($_SESSION["session_critere_b"])>0)){

            $bie->form();

        }else{
             header("location:http://localhost:8888/index.php?action=form_critere_b");
             exit();
        }
    }

    public  function get(Bie_c $bie){

        $id=isset($_GET['id'])? intval($_GET['id']):false;
        if($id){ 
                 $bie->get($id);
        }else{

            throw new Exception("UNE ERREUR ID DANS LA ROUTE BIE EXISTE PAS");
        }
    }

    public function gets(Bie_c $bie){
        $bie->gets();   
    }

    public  function create(Bie_c $bie){

             $array=$_POST;
             $erreur="";
             $params="";
             foreach($array as $key =>$value){
                    if($value==""){
                          $erreur="veuillez remplir les champse marque en rouge";
                          $params.=$key."=".$value."&";

                    }else{
                        $params.=$key."=".$value."&";
                    }
             }

             if($erreur!=""){

                  header("location:http://localhost:8888/index.php?action=form&table=bie&erreur=".$erreur."&".$params);
                  exit();
             }
             if((isset($_SESSION["session_critere_b"]) && count($_SESSION["session_critere_b"])>0)){
                
                    $bie->create($array);
             }else{
                    header("location:http://localhost:8888/index.php?action=form&table=critere");
                    exit();
             }        
    }
    public  function pdf(Bie_c $bie){

        $id= isset($_GET['id'])? intval($_GET['id']):false;
        if(!$id){
            throw new Exception("UNE ERREUR DANS LA ROUTE PDF ID EXISTE PAS");
        }
        $bie->pdf($id);
    }

}