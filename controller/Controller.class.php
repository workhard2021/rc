<?php 
require_once 'model/Model.class.php';
require_once('model/Bie.class.php');
require_once('CritereB.class.php');

class Controller{
    
    private $model;
    public function __construct(){
        $this->model=new Model();
    }
    public function gets($table){
         $res=$this->model->gets($table); 
         return $res;
    } 

    public function delete($table,$colonne,$id){
        $res=$this->model->delete($table,$colonne,$id);  
        return $res;
    }
    public function create($table,$array){
        
           $res=$this->model->create($table,$array);
           return $res;
    }
    public function update($table,$array,$colonne,$id){
        $res=$this->model->update($table,$array,$colonne,$id); 
        return $res;
    }
    public function get($table,$colonne,$id){
          return $this->model->get($table,$colonne,$id);
    }
    public function getsApi($table){
        $res=$this->model->gets($table); 
        return $res;
   }
    
}