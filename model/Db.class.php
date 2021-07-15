<?php
class Db {
    private $db;
    public function __construct($db)
    { 
        $this->db=new PDO($db);
    }
    
    public  function getDb(){
         
        try{ 
              return $this->db;

          }catch(Exception $e){
    
             die("error de connexion a la base de donnée ".$e->getMessage());
          }
    }
}