<?php
require_once('model/Model.class.php');
class CritereB{

    private $model;
    public function __construct(){
        $this->model=new Model();
    }
    public function form(){
        $pos_sce=$this->model->gets("pos_sce");
        $depart_hta=$this->model->gets("depart_hta");
        $clients=$this->model->gets("clients");
        require_once('view/critere/form.php');
        require_once("view/templete.php");
   }
   public function gets(){
        require_once("view/critere/liste.php");
         require_once('view/templete.php');
   }

   public function delete($id)
   {
      $sesion_criter_b=isset($_SESSION["session_critere_b"])? $_SESSION["session_critere_b"]:[];
      if(count($sesion_criter_b)>0){
           unset($_SESSION["session_critere_b"][$id]);
      }
      $message="Supprimé";
      header("location:http://localhost:8888/index.php?action=gets&table=critere&message=".$message);
   }

   public function  getsApi($table){
        return $this->model->gets($table);
   }
   public function create($array){

    $message="Critere b a été ajouté";
    $nbr_client=0;
    $date_incident=0;
    $date_realim=0;
    $interval=0;
    $somme_nbr_clients=0;

    $date_incident = strtotime($array["date_incident"]) *1000;
    $date_realim= strtotime($array["date_realim"]) *1000;
    $interval=($date_realim-$date_incident)/60000;
    $res=$this->model->gets("clients");

    foreach($array as $key =>$value){
        if( $key!="date_incident"&& $key!="Listearrayes" && $key!="departs" && $key!="date_realim"){
            $nbr_client+=intval($value);
        }
    }
     
    foreach($res as $key =>$value){
        $somme_nbr_clients+=$value["nb_clients"];
    }
    // calcul de critere b
    $critere_b=($nbr_client*$interval)/$somme_nbr_clients;
    $critere_b=round($critere_b,2);
    $_POST["critere_B"]=$critere_b;
    $_POST["nbcli_poste"]=$nbr_client;
     
    $sesion_criter_b=isset($_SESSION["session_critere_b"])? $_SESSION["session_critere_b"]:[];
    if(count($sesion_criter_b)==0){

       $_SESSION["session_critere_b"]=array($_POST);   

    }else{
       $_SESSION["session_critere_b"][]=$_POST;  
    }

    header("location:http://localhost:8888/index.php?table=critere&action=form&message=".$message);
      exit();
 }


        
   

}