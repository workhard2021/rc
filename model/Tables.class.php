<?php
 trait Table{

        function cherche($table){
             $requette="SELECT * FROM " .$table;
             $req=$this->db->prepare($requette);
             $req->execute();
             return $req->fetch();   
        }
 }