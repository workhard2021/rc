<?php
class TableRealim{
      private $id_bie;
      private $id_realim;
      private $mode_realim;
      private $poste;
      private $departs;
      private $date_realim;
      private $critere_b;
      private $nbr_clients;
    public function setId_bie($data){
              $this->id_bie=$data;
    }
    public function getId_bie(){
             return $this->id_bie;
    }
    public function setId_realim($data){
              $this->id_realim=$data;
    }
    public function setMode_realim(){
             return $this->id_realim;
    }
    public function getMode_realim($data){
              $this->mode_realim=$data;
    }
    public function getId_realim(){
             return $this->mode_realim;
    }

    public function setPoste($data){
        $this->poste=$data;
    }
    
    public function getPoste(){
             return $this->poste;
    }

    public function setDeparts($data){
              $this->departs=$data;
    }
    public function getDeparts(){
             return $this->departs;
    }

    public function setDate_realim($data){
              $this->date_realim=$data;
    }
    public function getDate_realim(){
             return $this->date_realim;
    }

    public function setCritere_b($data){
              $this->critere_b=$data;
    }
    public function getCritere_b(){
             return $this->critere_b;
    }

    public function setNbr_clients($data){
              $this->nbr_clients=$data;
    }
    public function getNbr_clients(){
             return $this->nbr_clients;
    }
    
    public function hydrateBie(Array $array){
          
             foreach($array as $key=>$value){
                  $method="set".ucfirst($key);
                  if(method_exists($this,$method)){
                         $method($value);
                  }else{
                      throw new Exception("cette methode existe pas"+ $method);
                  }
             }
    }

}