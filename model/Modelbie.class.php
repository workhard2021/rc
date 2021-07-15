<?php
  require_once 'Tables.class.php';
  
 class Modelbie{

         use Table;
         private $db;
         public function __construct()
         {
             $this->db=new PDO('mysql:host=localhost;dbname=bd_bie;charset=utf8', 'root', 'root'); 
         }

          public function gets(){
                 
                 $requette="SELECT * FROM liste_bie as l 
                    JOIN nature as n on n.id_nature=l.id_nature
                    JOIN typej as tj on tj.id_typej=l.id_typej 
                    JOIN typeh as th on th.id_typeh=l.id_typeh
                    JOIN origine as orig on orig.id_origine=l.id_orig
                 ";
                 $req=$this->db->prepare($requette);
                 $req->execute();
                 return $req->fetchAll(PDO::FETCH_ASSOC);     
          }
          public function get($id){

                $requette="SELECT * FROM liste_bie as l 
                    JOIN nature as n on n.id_nature=l.id_nature
                    JOIN typej as tj on tj.id_typej=l.id_typej 
                    JOIN typeh as th on th.id_typeh=l.id_typeh
                    JOIN origine as orig on orig.id_origine=l.id_orig
                    WHERE id_bie=?";

               $req=$this->db->prepare($requette);
               $req->execute(array($id));
               return $req->fetch();
               
          }

          public function create(Array $array){

              $arrayValue=[];
              $column="INSERT INTO liste_bie("; 
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

          public function update(Array $array){

              $arrayValue=[];
              $requette="UPDATE liste_bie SET "; 
              $i=0;

              foreach($array as $key => $value){  

                   $i++;
                   if($i<count($array)){ 
                        $requette=$requette.$key.'=?,';
                        $arrayValue[]=$value;
                    }else{
                        $requette=$requette.$key.'=?';
                        $arrayValue[]=$value;
                    }     
               }

               $req=$this->db->prepare($requette);
               return $req->execute($arrayValue);
            
          }
          public function delete($id){
              $requette="DELETE FROM liste_bie WHERE id_bie=?";
              $req=$this->db->prepare($requette);
              return $req->execute(array($id)) or die($this->db->errorInfo()); 
          }

 }
 