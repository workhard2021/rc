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
       
    public function form(){
        
        $array["nature"]=$this->model->cherche("nature");
        $array["origine"]=$this->model->cherche("origine");
        $array["siege"]=$this->model->cherche("siege");
        $array["liste_village"]=$this->model->cherche("liste_village");
        $array["liste_realimentation"]=$this->model->cherche("liste_realimentation");
        $array["liste_commune"]=$this->model->cherche("liste_commune");
        $array["defauts"]=$this->model->cherche("defauts");
        $array["causes"]=$this->model->cherche("causes");
        $array["typeH"]=$this->model->cherche("typeH");
        $array["typeh"]=$this->model->cherche("typeh");
        $array["typeH"]=$this->model->cherche("typeH");
        var_dump($array);

    }

    public function delete($id){

        $del=$this->model->get($id);   
    }

    public function getUpdate(){
 
        $array["nature"]=$this->model->cherche("nature");
        $array["origine"]=$this->model->cherche("origine");
        $array["siege"]=$this->model->cherche("siege");
        $array["liste_village"]=$this->model->cherche("liste_village");
        $array["liste_realimentation"]=$this->model->cherche("liste_realimentation");
        $array["liste_commune"]=$this->model->cherche("liste_commune");
        $array["defauts"]=$this->model->cherche("defauts");
        $array["causes"]=$this->model->cherche("causes");
        $array["typeH"]=$this->model->cherche("typeH");
        $array["typeh"]=$this->model->cherche("typeh");
        $array["typeH"]=$this->model->cherche("typeH");
        var_dump($array);  
    }

    public function create(Array $arry){

         $crt=$this->model->create(["nom"=>"camara",'prenom'=>"souleymane","a"=>"usa"]);
    }

    public function update(Array $arry){

        $updt=$this->model->update(["nom"=>"camara",'prenom'=>"souleymane","a"=>"usa"]);
        
    }
}