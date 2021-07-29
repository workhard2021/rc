<?php

require_once 'ModelTraitBie.class.php';
 class Model{

         use ModelTraitBie;
         private $db;

         public function __construct()
         {
             $this->db=new PDO('mysql:host=localhost;dbname=db_bie;charset=utf8', 'root', 'root'); 
         }


        function gets($table,$ordre=""){

             $requette="SELECT * FROM $table";
             if($ordre!=""){
               $requette.=" ORDER BY $ordre DESC";
             }

             $req=$this->db->prepare($requette);
             $req->execute();
             return $req->fetchAll(PDO::FETCH_ASSOC);   
        }

        function get($table,$colonne,$id){
          $requette="SELECT * FROM $table WHERE $colonne=?";
          $req=$this->db->prepare($requette);
          $req->execute(array($id));
          return $req->fetchAll(PDO::FETCH_ASSOC);   
        }

        public function create($table,Array $array){

              $arrayValue=[];
              $column="INSERT INTO $table("; 
              $columnValue= "VALUES(";
              $i=0;
              foreach($array as $key => $value){
                  $i++;
                  if($i<count($array)){ 

                    $column=$column.$key.',';
                    $columnValue=$columnValue."?,";
                    $arrayValue[]=$value;  

                  }else{

                    $column=$column.$key;
                    $columnValue=$columnValue."?";
                    $arrayValue[]=$value;  
                  }
              }

               $requette=$column.")".$columnValue.")";
               $req=$this->db->prepare($requette);
               return $req->execute($arrayValue) or die(print_r($this->db->errorInfo()));  
          }

          public function update($table,Array $array,$colonne,$id){

              $arrayValue=[];
              $requette="UPDATE $table SET "; 
              $i=0;

              foreach($array as $key => $value){  
                   $i++;
                   if($i<count($array)){ 
                        $requette=$requette.$key.'=? ,';
                        $arrayValue[]=$value;
                    }else{
                        $requette=$requette.$key.'=?';
                        $arrayValue[]=$value;
                    }     
               }
               $arrayValue[]=$id;
  
               $requette.=" WHERE $colonne=?";
               $req=$this->db->prepare($requette);
               return $req->execute($arrayValue);
        }

        public function delete($table,$colonne,$id){
              $requette="DELETE FROM  $table WHERE  $colonne=?";
              $req=$this->db->prepare($requette);
              return $req->execute(array($id)) or die($this->db->errorInfo()); 
        }
 }
 