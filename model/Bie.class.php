<?php
class Bie {
       
      private $id_bie;
      private $Num_bie;
      private $Id_ps;
      private $Id_depart;
      private $Id_nature;
      private $Date_Bie;
      private $Heure_Bie;
      private $Id_TypeJ;
      private $Id_TypeH;
      private $Id_resp;
      private $Id_Orig;
      private $Id_Siege;
      private $id_cause;
      private $id_typedef;
      private $critereB;
      private $lieu_def_rex;
      private $nb_omt_man;
      private $nb_omt_def;
      private $nb_lld_visu;
      private $nb_lld_def;
      private $dsp1;
      private $dsp2;
      private $hdebut_bie;
      private $hpec_bie;
      private $mderomt_bie;
      private $premappelcex_bie;
      private $premappelctactcex_bie;
      private $pdm_bie;
      private $manloc_bie;
      private $locdef_bie;
      private $findc_bie;
      private $fin_indispod_bie;
      private $nbcli_depart;
      private $nbrenvoi_defaut;
      private $id_realim;
      private $redacteur_bie;
      private $fin_indispot_bie;


      public function setId_bie($data){
              $this->id_bie=$data;
      }
      public function getId_bie(){

             return $this->id_bie;
       }
       public function setNum_bie($data){
              $this->Num_bie=$data;
      }
      public function getNum_bie(){
             
             return $this->Num_bie;
      }
      
      public function setId_ps($data){
              $this->Id_ps=$data;
      }
      public function getId_ps(){
             
             return $this->Id_ps;
      }

      public function setId_depart($data){
              $this->Id_depart=$data;
      }
      public function getId_depart(){
             
             return $this->Id_depart;
      }

      public function setId_nature($data){
              $this->Id_nature=$data;
      }
      public function getId_nature(){
             
             return $this->Id_nature;
      }
      
      public function setDate_Bie($data){
              $this->Date_Bie=$data;
      }
      public function getDate_Bie(){
             
             return $this->Date_Bie;
      }
      
      public function setHeure_Bie($data){
              $this->Heure_Bie=$data;
      }
      public function getHeure_Bie(){
             
             return $this->Heure_Bie;
      }

      public function setId_TypeJ($data){
              $this->Id_TypeJ=$data;
      }
      public function getId_TypeJ(){
             
             return $this->Id_TypeJ;
      }
      
      public function setId_TypeH($data){
              $this->Id_TypeH=$data;
      }
      public function getId_TypeH(){
             
             return $this->Id_TypeJ;
      }
      
      public function setId_resp($data){
              $this->Id_resp=$data;
      }
      public function getId_resp(){
             
             return $this->Id_resp;
      }

      public function setId_Orig($data){
              $this->Id_Orig=$data;
      }
      public function getId_Orig(){
             
             return $this->Id_Orig;
      }

       public function setId_Siege($data){
              $this->Id_Siege=$data;
      }
      public function getId_Siege(){
             
             return $this->Id_Siege;
      }





      public function hydrateBie(Array $array){
          
             foreach($array as $key=>$value){

                  $method="set".ucfirst($key);
                  if(method_exists($this,$method)){
                         $method($value);
                  }
             }

      }

}