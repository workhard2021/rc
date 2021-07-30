<?php
 require_once 'controller/ClientController.class.php';

 class ClientRoute{

    public function __construct($nameMethod)
    {
        if(method_exists(__CLASS__,$nameMethod)){
            return self::$nameMethod(new ClientController());
        }else{

             throw new Exception($nameMethod." existe pas dans".__CLASS__);  
        }  
    }
    public  function gets(ClientController $clientController){
          $clientController->gets();  
    }

    public function get(ClientController $clientController){

        $id= isset($_GET['id'])? intval($_GET['id']):false;
        $colonne=isset($_GET['colonne'])? htmlspecialchars($_GET['colonne']):false;
        if(!$id){
            
                 throw new Exception("PARAMETTRE ID EXISTE PAS ROUTE GET");

        }elseif(!$colonne){

                throw new Exception("PARAMETTRE COLONNE EXISTE PAS ROUTE GET");
        } 
        $clientController->get($colonne,$id);      
     }

     public  function delete(ClientController $clientController){

        $id= isset($_GET['id'])? intval($_GET['id']):false;
        $colonne= isset($_GET['colonne'])? htmlspecialchars($_GET['colonne']):false;
        if(!$id){

            throw new Exception("PARAMETTRE ID EXISTE PAS ROUTE delete");

        }elseif(!$colonne){
            throw new Exception("PARAMETTRE COLONNE EXISTE PAS ROUTE delete");
        }  
        $clientController->delete($colonne,$id);
        echo json_encode("supprimé");
    }

    public  function create(ClientController $clientController){

        $array=$_POST;
        $erreur="";
        $params="";
        foreach($array as $key =>$value){
               if($value==""){
                     $erreur="Les champs marqués en rouge sont obligatoires";
                     $params.=$key."=".$value."&";
               }else{
                   $params.=$key."=".$value."&";
               }
        }
        if($erreur!=""){ 
               header("location:http://localhost:8888/index.php?table=client&action=form&erreur=$erreur&$params");
               exit();
        }
        $array=$_POST;
        $array['annee']=date("Y");
        $clientController->create($array);
    }
    
    public  function update(ClientController $clientController){

        $id=isset($_GET['id'])? intval($_GET['id']):false;
        $array=$_POST;
        $erreur="";
        $params="";

        foreach($array as $key =>$value){
               if($value==""){
                     $erreur="Les champs marqués en rouge sont obligatoires";
                     $params.=$key."=".$value."&";
               }else{
                   $params.=$key."=".$value."&";
               }
        }

        if($erreur!="" || count($array)==0){ 
              $erreur="";
              header("location:http://localhost:8888/index.php?table=client&action=modifier&erreur=$erreur&$params&id=$id");
               exit();
        }

        if(!$id){
             throw new Exception("UNE ERREUR DANS LA ROUTE UPDATE ID EXISTE PAS");
        }

        $clientController->update($array,$id);
        
    }

    public function modifier(ClientController $clientController){

        $id= isset($_GET['id'])? intval($_GET['id']):false;
        if(!$id){

             throw new Exception("UNE ERREUR DANS LA ROUTE MODIFIER ID EXISTE PAS");
        }
        $clientController->modifier($id);    
    }

    public function form(ClientController $clientController){

        $clientController->form();    
    }
  
}