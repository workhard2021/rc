<?php
// GET ET GETS POUR BIE
 trait ModelTraitBie{

        function gets_bie(){
          $requette="SELECT * FROM liste_bie ORDER BY id_bie DESC";
          $req=$this->db->prepare($requette);
          $req->execute();
          return $req->fetchAll(PDO::FETCH_ASSOC);   
        }
        public function get_bie($id){
                $requette="SELECT l.Heure_Bie,l.id_bie,l.Num_bie,l.mderomt_bie,l.locdef_bie,l.findc_bie,l.fin_indispod_bie,l.fin_indispot_bie,l.nbrenvoi_defaut,l.manloc_bie,l.pdm_bie,
                tj.Lib_typej,th.Lib_typeh,l.dsp1,l.dsp2,o.Lib_Origine,l.hdebut_bie,l.hpec_bie,l.premappelcex_bie,l.findc_bie,def.Lib_type,
                                l.Date_Bie,l.Lieu_def_rex,l.CritereB,c.Lib_cause,s.Lib_siege,n.Lib_nature,ps.libelle_poste,dp.Lib_depart,
                                omt.Lib_omt as nb_omt_man,om.Lib_omt as nb_omt_def
                                                FROM liste_bie as l JOIN origine AS o ON l.Id_Orig=o.Id_origine
                                                LEFT JOIN causes as c ON l.Id_Cause=c.Id_cause 
                                                LEFT JOIN siege as s ON l.Id_Siege=s.ID_siege 
                                                LEFT JOIN nature as n ON l.Id_nature=n.Id_nature 
                                                LEFT JOIN pos_sce AS ps ON l.Id_Ps=ps.Id 
                                                LEFT JOIN depart_hta as dp ON l.Id_Depart=dp.Id_depart
                                                LEFT JOIN omt ON l.nb_omt_man=omt.Id_omt 
                                                LEFT JOIN omt as om ON l.nb_omt_def=om.Id_omt 
                                                LEFT JOIN typej as tj ON l.Id_TypeJ=tj.Id_typej
                                                LEFT JOIN typeh as th ON l.Id_TypeH=th.Id_typeh
                                                LEFT JOIN defauts as def ON l.Id_typedef=def.Id_type
                                                WHERE l.id_bie=?";
               $req=$this->db->prepare($requette);
               $req->execute(array($id)) or die($this->db->errorInfo()) ;
               return $req->fetch() ;
          }
          
 }