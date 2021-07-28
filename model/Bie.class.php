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
      private $Id_Cause;
      private $Id_typedef;
      private $CritereB;
      private $Lieu_def_rex;
      private $nb_omt_man;
      private $nb_omt_def;
      private $nb_ild_visu;
      private $nb_ild_def;
      private $dsp1;
      private $dsp2;
      private $hdebut_bie;
      private $hpec_bie;
      private $mderomt_bie;
      private $premappelcex_bie;
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
             
             return $this->Id_TypeH;
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
     public function setId_Cause($data){
            $this->Id_Cause=$data; 
     }  
     public function getId_Cause(){
             
        return $this->Id_Cause; 
     }  
     public function setId_typedef($data){
        $this->Id_typedef=$data; 
     }  
     public function getId_typedef(){
            
        return $this->Id_typedef; 
     }  
     public function setCritereB($data){
        $this->CritereB=$data; 
     }  
    public function getCritereB(){
            
        return $this->CritereB; 
     } 
     public function setLieu_def_rex($data){
        $this->Lieu_def_rex=$data; 
     }  
    public function getLieu_def_rex(){
            
        return $this->Lieu_def_rex; 
     } 
     public function setNb_omt_man($data){
        $this->nb_omt_man=$data; 
     }  
    public function getNb_omt_man(){
            
        return $this->nb_omt_man; 
     } 
     public function setNb_omt_def($data){
        $this->nb_omt_def=$data; 
     }  
    public function getNb_omt_def(){
            
        return $this->nb_omt_def; 
     }   
     public function setNb_ild_visu($data){
        $this->nb_ild_visu=$data; 
     }  
    public function getNb_ild_visu(){
            
        return $this->nb_ild_visu; 
     }  
     public function setNb_ild_def($data){
        $this->nb_ild_def=$data; 
     }  
    public function getNb_ild_def(){    
        return $this->nb_ild_def; 
     }  
     public function setDsp1($data){
        $this->dsp1=$data; 
     }  
    public function getDsp1(){  
        return $this->dsp1;  
     } 
     public function setDsp2($data){
        $this->dsp2=$data; 
     }  
     public function getDsp2(){
         return $this->dsp2; 
     }  
     public function setHdebut_bie($data){
         $this->hdebut_bie=$data; 
     }  
    public function gethdebut_bie(){
            
        return $this->hdebut_bie; 
     }  
     public function setHpec_bie($data){
        $this->hpec_bie=$data; 
     }  
    public function getHpec_bie(){
            
        return $this->hpec_bie; 
     }   
     public function setMderomt_bie($data){
        $this->mderomt_bie=$data; 
     }  
    public function getMderomt_bie(){
            
        return $this->mderomt_bie; 
     }   
     public function setPremappelcex_bie($data){

         $this->premappelcex_bie=$data; 
     }  
    public function getPremappel_cex_bie(){
            
        return $this->premappelcex_bie; 
     }   
     public function setPremctactcex($data){
        $this->premctactcex=$data; 
     }  
    public function getPremctactcex(){
            
        return $this->premctactcex; 
     }  
     public function setPdm_bie($data){
        $this->pdm_bie=$data; 
     }  
    public function getPdm_bie(){
            
        return $this->pdm_bie; 
     }   
     public function setManloc_bie($data){
        $this->manloc_bie=$data; 
     }  
    public function getManloc_bie(){
            
        return $this->manloc_bie;  
     }  
     public function setLocdef_bie($data){
        $this->locdef_bie=$data; 
     }  
    public function getLocdef_bie(){
            
        return $this->locdef_bie; 
     }  
     public function setFindc_bie($data){
        $this->findc_bie=$data; 
     }  
    public function getFindc_bie(){
            
        return $this->findc_bie; 
     }   
     public function setFin_indispod_bie($data){
        $this->fin_indispod_bie=$data; 
     }  
     public function getFin_indispod_bie(){
            
        return $this->fin_indispod_bie; 
     }   
     public function setNbcli_depart($data){
        $this->nbcli_depart=$data; 
     }  
    public function getNbcli_depart(){
            
        return $this->nbcli_depart; 
     } 
     public function setNbrenvoi_defaut($data){
        $this->nbrenvoi_defaut=$data; 
     }  
    public function getNbrenvoi_defaut(){
            
        return $this->nbrenvoi_defaut;  
     }    
     public function setId_realim($data){
        $this->id_realim=$data; 
     }  
    public function getId_realim(){
            
        return $this->id_realim; 
     }   
     public function setRedacteur_bie($data){
        $this->redacteur_bie=$data; 
     }  
     public function getRedacteur_bie(){
            
        return $this->redacteur_bie; 
     }   
     // c'est la meme fin que fin_indispod. c'est exactement la meme heure on peut en supprimer un
     public function setFin_indispot_bie($data){
        $this->fin_indispot_bie=$data; 
     }  
     public function getFin_indispot_bie(){
            
        return $this->fin_indispot_bie; 
     }  
     public function hydrate(Array $array){
          
             foreach($array as $key=>$value){

                  $method="set".ucfirst($key);
                  if(method_exists($this,$method)){
                        $this->$method($value);
                  }else{

                     throw new Exception("cette methode existe pas".$method);
                     
                  }
             }

      }

}