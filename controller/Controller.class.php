<?php 
require_once 'model/Model.class.php';
class Controller{
    
    private $model;
    public function __construct(){
        $this->model=new Model();
    }
    public function gets($table){
         return $this->model->gets($table); 
    } 

    public function delete($table,$colonne,$id){

        return $this->model->delete($table,$colonne,$id);  
        
    }
    public function create($table,$array){
        return $res=$this->model->create($table,$array);   
    }
    public function update($table,$array,$colonne,$id){
         return $this->model->update($table,$array,$colonne,$id); 
    }
    public function get($table,$colonne,$id){
    
          $res=$this->model->get($table,$colonne,$id);
          echo json_encode($res);
    }
    
}