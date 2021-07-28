<?php
/**
 * 
 */
trait RouteTraitApi
{
public static function getsApi(Controller $controller){

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

public static function getApi(Controller $controller){

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


}