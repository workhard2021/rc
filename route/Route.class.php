<?php
 require_once 'controller/Controller.class.php';
class Route{
    public function __construct($nameMethod)
    {
        if(method_exists(__CLASS__,$nameMethod)){
            return self::$nameMethod(new Controller());
        }else{

             throw new Exception("route existe pas".__CLASS__);  
        }  
    }

    public static function gets(Controller $controller){

        $table= isset($_GET['table'])? htmlspecialchars($_GET['table']):false;
        
        if(!$table){
            throw new Exception("PARAMETTRE TABLE EXISTE PAS ROUTE GETS");
        }  
        $res=$controller->gets($table);  
        if($res){
             echo json_encode($res);
        }else{
             throw new Exception("UNE ERREUR DANS LA ROUTE GETS ");
        }  
    }

    public static function get(Controller $controller){

        $id= isset($_GET['id'])? intval($_GET['id']):false;
        $table=isset($_GET['table'])? htmlspecialchars($_GET['table']):false;
        $colonne=isset($_GET['colonne'])? htmlspecialchars($_GET['colonne']):false;

        if(!$id){
            
                 throw new Exception("PARAMETTRE ID EXISTE PAS ROUTE GET");

        }elseif(!$table){

                 throw new Exception("PARAMETTRE TABLE EXISTE PAS ROUTE GET");
        } 
        elseif(!$colonne){

                 throw new Exception("PARAMETTRE COLONNE EXISTE PAS ROUTE GET");
        } 
        $res= $controller->get($table,$colonne,$id); 
        echo json_encode($res);         
    }

    public static function delete(Controller $controller){

        $id= isset($_GET['id'])? intval($_GET['id']):false;
        $table= isset($_GET['table'])? htmlspecialchars($_GET['table']):false;
        $colonne= isset($_GET['colonne'])? htmlspecialchars($_GET['colonne']):false;

        if(!$id){

            throw new Exception("PARAMETTRE ID EXISTE PAS ROUTE delete");

        }elseif(!$table){

                throw new Exception("PARAMETTRE TABLE EXISTE PAS ROUTE delete");
        } 
        elseif(!$colonne){

                throw new Exception("PARAMETTRE COLONNE EXISTE PAS ROUTE delete");
        }  
        $controller->delete($table,$colonne,$id);
        echo json_encode("supprimé");
        
    }

    public static function create(Controller $controller){

        $table= isset($_GET['table'])? htmlspecialchars($_GET['table']):false;
        $array=$_POST;
        if($table){

              $controller->create($table,$array);

        }else{
            
            throw new Exception("UNE ERREUR TABLE MAQNUE DANS LA ROUTE CREATE");
        }
    }
    
    public static function update(Controller $controller){

        $table= isset($_GET['table'])? htmlspecialchars($_GET['table']):false;
        $colonne= isset($_GET['colonne'])? htmlspecialchars($_GET['colonne']):false;
        $id= isset($_GET['id'])? intval($_GET['id']):false;
        $array=$_POST;
        if(count($array)==0){
            
             throw new Exception("REMPLIR TOUT LES CHAMPS CRETERE B");
        }

        if(!$table){

             throw new Exception("UNE ERREUR DANS LA ROUTE UPDATE TABLE EXISTE PAS");

        }elseif(!$colonne){

             throw new Exception("UNE ERREUR DANS LA ROUTE UPDATE COLONNE EXISTE PAS");

        }elseif(!$id){

             throw new Exception("UNE ERREUR DANS LA ROUTE UPDATE ID EXISTE PAS");
        }
        $controller->update($table,$array,$colonne,$id);
        
    } 
    

   

}