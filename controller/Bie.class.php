<?php

require_once ('model/Model.class.php');
require_once('view/bie/pdf.php');
require_once("vendor/Autoload.php");
use Dompdf\Dompdf;
use Dompdf\Options;

class Bie{

      private $model;
      private $table="liste_bie";
      public function __construct()
      {
             $this->model=new Model();
      }
      public function get($id){

          $res=$this->model->get_bie($id);
          $res2=$this->model->get("liste_realimentation","id_bie",$id);
          require_once('view/bie/bie.php');
          require_once('view/templete.php'); 
      }

      public function gets(){
           $res=$this->model->gets_bie();
           require_once('view/bie/liste.php');
           require_once('view/templete.php');
      }

      public function create($array){

           $array['Num_bie']="BIE-". date("d-m-y");
           $array["Date_Bie"]=$array["Heure_Bie"];
    
          $array_session=[];
          foreach($_SESSION["session_critere_b"] as $value){
                 $array_session[]=$value;
          }
         
         
          $poste=$array_session[0]["Liste_postes"];
          $depart=$array_session[0]["departs"];
          $poste=$this->model->get("pos_sce","libelle_poste",$poste);
          $array["Id_Ps"]=$poste[0]["Id"];
          $depart=$this->model->get("depart_hta","Lib_depart",$depart);
          $array["Id_Depart"]=$depart[0]["Id_depart"];
          $critere_b_total=0;
          foreach($_SESSION["session_critere_b"] as $value){
                $critere_b_total+=$value["critere_B"];
          }

          $array["CritereB"]=$critere_b_total;
           var_dump($array);
          $res=$this->model->create("liste_bie",$array);
          $res=$this->model->gets_bie();
          $id=$res[0]['id_bie'];
         
          $liste_realim=[];
          foreach($array_session as $value){
                $liste_realim["id_bie"]=$id;
                $liste_realim["Liste_postes"]=$value["Liste_postes"];
                $liste_realim["date_realim"]=$value["date_realim"];
                $liste_realim["mode_realim"]=$value["mode_realim"];
                $liste_realim["nbcli_poste"]=$value["nbcli_poste"];
                $liste_realim["critere_B"]=$value["critere_B"];
               $res=$this->model->create("liste_realimentation",$liste_realim);
          }
          unset($_SESSION["session_critere_b"]);
          header("location:http://localhost:8888/index.php?action=get&table=bie&id=".$id);
          exit();
    }

    public function form()
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
         require_once("view/bie/form.php");  
         require_once("view/templete.php");
    }

    public function delete($id){
          $this->model->delete($this->table,"id_bie",$id);
          $this->model->delete("liste_realimentation","id_bie",$id);
          $message="Supprimé";
          header("location:http://localhost:8888/index.php?action=gets&table=bie&message=".$message);
    }

    public function pdf($id){
        $res=$this->model->get_bie($id);
        $res2=$this->model->get("liste_realimentation","id_bie",$id);
        $html=pdf($res,$res2);
        $option=new Options();
        $option->set("defautlFont","courier");
        $dompdf=new Dompdf($option);
        $dompdf->loadHtml($html);
        $dompdf->setPaper("A4","portrait");
        $dompdf->render();
        $ficher="doc-".date("d-m-Y");
        $dompdf->stream($ficher);
        exit();
     }
}