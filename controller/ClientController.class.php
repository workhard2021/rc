<?php
require_once 'model/Model.class.php';
class ClientController{
    private $model;
    private $table="clients";
    
    public function __construct(){
        $this->model=new Model();
    }
    public function gets(){
         $res=$this->model->gets($this->table,"Id_transf"); 
         require_once "view/client/liste.php";
         require_once "view/templete.php";
    } 

    public function delete($colonne,$id){
        $res=$this->model->delete($this->table,$colonne,$id);  
        return $res;
    }
    public function create($array){

            $mesage="Client Entregistré";
            $res=$this->model->create($this->table,$array);
            if($res!=""){ 
              header("location:http://localhost:8888/index.php?table=client&action=form&message=$mesage");
               exit();
            }
    }
    public function update($array,$id){
        
        $res=$this->model->update($this->table,$array,"Id_transf",$id);
        $mesage="Mise à jour éffectuée"; 
        if($res!=""){ 
            header("location:http://localhost:8888/index.php?table=client&action=modifier&message=$mesage&id=$id");
             exit();
        }

    }
    public function get($colonne,$id){
          $res=$this->model->get($this->table,$colonne,$id);
          require_once "view/client/form_client";
          require_once "view/templete.php";
    }

    public function form(){
        $liste_commune=$this->model->gets("liste_commune");
        $liste_village=$this->model->gets("liste_village");
        $depart_hta=$this->model->gets("depart_hta");
        $pos_sce=$this->model->gets("pos_sce");
        require_once "view/client/form.php";
        require_once "view/templete.php";
    }

    public function modifier($id){

        $liste_commune=$this->model->gets("liste_commune");
        $liste_village=$this->model->gets("liste_village");
        $depart_hta=$this->model->gets("depart_hta");
        $pos_sce=$this->model->gets("pos_sce");
        $res=$this->model->get($this->table,"Id_transf",$id);
        $res=$res[0];
        require_once "view/client/modifier.php";
        require_once "view/templete.php";
    }


    public function getsApi(){
        $res=$this->model->gets($this->table); 
        return $res;
   } 
}

