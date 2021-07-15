<?php
class Bie {
      private $id_bie;
      private $num_bie;
      private $id_ps;
      private $id_depart;
      private $id_nature;
      private $date_bie;
      private $heure_bie;
      private $id_typej;
      private $id_typeh;
      private $id_resp;
      private $id_orig;
      private $id_siege;
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

      public function hydrateBie(Array $array){
          
             foreach($array as $key=>$value){

                  $method="set".ucfirst($key);
                  if(method_exists($this,$method)){
                         $method($value);
                  }
             }

      }

}