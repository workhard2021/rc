<?php
require_once('view/pdf.php');

trait ControllerTraitBie {

      public function get($id){

          $res=$this->model->get_bie($id);
          $res2=$this->get("liste_realimentation","id_bie",$id);
          require_once('view/bie/bie_.php');
          require_once('view/templete2.php'); 
     }

     public function get_bie_pdf($id){
          $res=$this->model->get_bie($id);
          $res2=$this->get("liste_realimentation","id_bie",$id);
          return pdf($res,$res2); 
     }

     public function gets_bie(){
           $res=$this->model->gets_bie();
           require_once('view/bie/list_bie.php');
           require_once('view/templete.php');
     }
     public function form_critere_b(){
            $pos_sce=$this->model->gets("pos_sce");
            $depart_hta=$this->model->gets("depart_hta");
            $clients=$this->model->gets("clients");
            require_once('view/critere-b/form_critere_b.php');
            require_once("view/templete2.php");
     }

     public function create_bie($array){

          $taille=count($_SESSION["session_critere_b"]);
          $poste=$_SESSION['session_critere_b'][$taille-1]["Liste_postes"];
          $depart=$_SESSION['session_critere_b'][$taille-1]["departs"];
          $poste=$this->model->get("pos_sce","libelle_poste",$poste);
          $array["Id_Ps"]=$poste[0]["Id"];
          $depart=$this->model->get("depart_hta","Lib_depart",$depart);
          $array["Id_Depart"]=$depart[0]["Id_depart"];
          $critere_b_total=0;
          foreach($_SESSION["session_critere_b"] as $value){
                $critere_b_total+=$value["critere_B"];
          }
          $array["CritereB"]=$critere_b_total;
          $res=$this->model->create("liste_bie",$array);
          $res=$this->model->gets_bie();
          $id=$res[0]['id_bie'];
         
          $liste_realim=[];
          foreach($_SESSION["session_critere_b"] as $value){
                $liste_realim["id_bie"]=$id;
                $liste_realim["Liste_postes"]=$value["Liste_postes"];
                $liste_realim["date_realim"]=$value["date_realim"];
                $liste_realim["mode_realim"]=$value["mode_realim"];
                $liste_realim["nbcli_poste"]=$value["nbcli_poste"];
                $liste_realim["critere_B"]=$value["critere_B"];
               $res=$this->model->create("liste_realimentation",$liste_realim);
          }
          header("location:http://localhost:8888/index.php?action=get_bie&id=".$id);
    }

    public function form_bie()
    {    
         $origine=$this->model->gets("origine");
         $causes=$this->model->gets("causes");
         $nature=$this->model->gets("nature");
         $defauts=$this->model->gets("defauts");
         $siege=$this->model->gets("siege");
         $typeh=$this->model->gets("typeh");
         $typej=$this->model->gets("typej");
         $omt=$this->model->gets("omt");
         $ild=$this->model->gets("ild");
         $pos_sce=$this->model->gets("pos_sce");
         require_once("view/bie/form_bie.php");  
         require_once("view/templete2.php");
    }
 
}