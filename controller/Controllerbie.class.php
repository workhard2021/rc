<?php 
require_once 'model/Modelbie.class.php';

class ControllerBie{
    
    private $model;

    public function __construct(){

        $this->model=new Modelbie();
      
    }

    public function gets(){

         $donnees=$this->model->gets(); 
         require_once('view/liste_bie.php');
         require_once('view/templete.php');   
    }

    public function get($id){
    
        $donnee=$this->model->get($id); 
        require_once('view/bie.php');
        require_once('view/templete.php');   
    }
      
    //appel de formulaire avec les données
    public function form(){
        
        $nature=$this->model->cherche("nature");
        $origine=$this->model->cherche("origine");
        $sieges=$this->model->cherche("siege");
        $liste_village=$this->model->cherche("liste_village");
        $liste_realimentation=$this->model->cherche("liste_realimentation");
        $liste_commune=$this->model->cherche("liste_commune");
        $defauts=$this->model->cherche("defauts");
        $causes=$this->model->cherche("causes");
        $typej=$this->model->cherche("typej");
        $typeh=$this->model->cherche("typeh");
        $departs=$this->model->cherche("depart_hta");
        $poste_source=$this->model->cherche("pos_sce");
        $omt=$this->model->cherche("omt");
        $ild=$this->model->cherche("ild");
        $transfo=$this->model->cherche("clients");
        require_once("view/form_bie.php");
        require_once("view/templete.php");

    }

    public function delete($id){

        $del=$this->model->get($id);   
    }

    public function getUpdate(){
 
        $nature=$this->model->cherche("nature");
        $origine=$this->model->cherche("origine");
        $sieges=$this->model->cherche("siege");
        $liste_village=$this->model->cherche("liste_village");
        $liste_realimentation=$this->model->cherche("liste_realimentation");
        $liste_commune=$this->model->cherche("liste_commune");
        $defauts=$this->model->cherche("defauts");
        $causes=$this->model->cherche("causes");
        $typej=$this->model->cherche("typej");
        $typeh=$this->model->cherche("typeh");
        $departs=$this->model->cherche("depart_hta");
        $poste_source=$this->model->cherche("pos_sce");
        
        
        require_once("view/form_bie.php");
        require_once("view/templete.php");
  
    }

    public function create(Array $arry){

         $crt=$this->model->create(["nom"=>"camara",'prenom'=>"souleymane","a"=>"usa"]);
    }

    public function update(Array $arry){

        $updt=$this->model->update(["nom"=>"camara",'prenom'=>"souleymane","a"=>"usa"]);
        
    }
    public function formClient(){

        // $donnees=$this->model->gets(); 
        require_once('view/form_client.php');
        require_once('view/templete.php');   
   }
}