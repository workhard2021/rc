<?php
 require_once 'controller/Controller.class.php';
 require_once 'model/Bie.class.php';
 require_once 'RouteTraitBie.php';
 require_once("vendor/Autoload.php");
 use Dompdf\Dompdf;
 use Dompdf\Options;
class Route{

    use RouteTraitBie;
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
        $res=$controller->delete($table,$colonne,$id);
        echo json_encode("supprimé");
        
    }

    public static function create(Controller $controller){

        $table= isset($_GET['table'])? htmlspecialchars($_GET['table']):false;
        $obj=file_get_contents("php://input");
        $array=json_decode($obj,true);

        if($table){
            $res=$controller->create($table,$array);
            echo "enregistré";
        }else{
            
            throw new Exception("UNE ERREUR TABLE MAQNUE DANS LA ROUTE CREATE");
        }
    }
    
    public static function update(Controller $controller){

        $table= isset($_GET['table'])? htmlspecialchars($_GET['table']):false;
        $colonne= isset($_GET['colonne'])? htmlspecialchars($_GET['colonne']):false;
        $id= isset($_GET['id'])? intval($_GET['id']):false;
        $array=file_get_contents("php://input");
        $array=json_decode($array,true);
        $res=false;
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

        $res=$controller->update($table,$array,$colonne,$id);
        echo json_encode("Mise à jour effectuée"); 
    } 
    public static function pdf(Controller $controller){

        $id= isset($_GET['id'])? intval($_GET['id']):false;
    
        if(!$id){
            throw new Exception("UNE ERREUR DANS LA ROUTE PDF ID EXISTE PAS");
        }
       
        $option=new Options();
        $option->set("defautlFont","courier");
        $dompdf=new Dompdf($option);
        $dompdf->loadHtml("Bonsoir");
        $dompdf->setPaper("A4","portrait");
        $dompdf->render();
        $ficher="doc-".date("d-m-Y");
        $dompdf->stream($ficher);
        
        
    }

}