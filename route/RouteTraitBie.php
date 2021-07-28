<?php
trait RouteTraitBie{

    public static function delete_bie(Controller $controller){

         $id= isset($_GET['id'])? intval($_GET['id']):false;
        $table= isset($_GET['table'])? htmlspecialchars($_GET['table']):false;
        $colonne= isset($_GET['colonne'])? htmlspecialchars($_GET['colonne']):false;

        if(!$id){
            throw new Exception("PARAMETTRE ID EXISTE PAS ROUTE DELETE BIE");

        }elseif(!$table){

                throw new Exception("PARAMETTRE TABLE EXISTE PAS ROUTE DELETE BIE");
        } 
        elseif(!$colonne){
                throw new Exception("PARAMETTRE COLONNE EXISTE PAS ROUTE DELETE BIE");
        }  
          $res=$controller->delete($table,$colonne,$id);
          $res=$controller->delete("liste_realimentation","id_bie",$id);
        if($res){
             
             header("location:http://localhost:8888/index.php?action=gets_bie");
             exit();
        }else{

             throw new Exception("UNE ERREUR DANS LA ROUTE DELETE BIE");
        }  
    }

    public function form_bie(Controller $controller){

        if((isset($_SESSION["session_critere_b"]) && count($_SESSION["session_critere_b"])>0)){

            $controller->form_bie();

        }else{
             header("location:http://localhost:8888/index.php?action=form_critere_b");
             exit();
        }
    }

    public static function get_bie(Controller $controller){

        $id=isset($_GET['id'])? intval($_GET['id']):false;
        if($id){ 
                 $controller->get_bie($id);
        }else{

            throw new Exception("UNE ERREUR ID DANS LA ROUTE BIE EXISTE PAS");
        }
    }

    public function gets_bie(Controller $controller){
        $controller->gets_bie();
        
    }


    //TOUTES LES FONCTIONNALITE DE CRITERE B
    public function form_critere_b(Controller $controller){
         $controller->form_critere_b();
    }
    public function ajouter_critere_b(Controller $controller){
        // echo date("d/m/Y");
        $array=[];
        $erreur="";
        $nbr_client=0;
        $date_incident=0;
        $date_realim=0;
        $interval=0;
        $somme_nbr_clients=0;
        foreach($_POST as $key => $value){

            if(!empty($_POST[$key])){
                $array[$key]=$value;
            }else{
                 $erreur="Veuillez remplir tout les champs";
            }
         }
         if($erreur!=""){ 
               header("location:http://localhost:8888/index.php?action=form_critere_b&erreur=".$erreur);
               exit();
         }else{

            $date_incident = strtotime($_POST["date_incident"]) *1000;
            $date_realim= strtotime($_POST["date_realim"]) *1000;
            $interval=($date_realim-$date_incident)/60000;
         }
         $res=$controller->getsApi("clients");
    
         foreach($_POST as $key =>$value){
             if( $key!="date_incident"&& $key!="Liste_postes" && $key!="departs" && $key!="date_realim"){
                 $nbr_client+=intval($value);
             }
         }
         foreach($res as $value){
             $somme_nbr_clients +=intval($value['nb_clients']);
         }
         // calcul de critere b
         $critere_b=($nbr_client*$interval)/$somme_nbr_clients;
         $critere_b=round($critere_b,2);
         $_POST["critere_B"]=$critere_b;
         $_POST["nbcli_poste"]=$nbr_client;

         $sesion_criter_b=isset($_SESSION["session_critere_b"])? $_SESSION["session_critere_b"]:[];
         if(count($sesion_criter_b)==0){

            $_SESSION["session_critere_b"]=array($_POST);   

         }else{
            $_SESSION["session_critere_b"][]=$_POST;  
         }
         $message="Critere b a été ajouté";
         header("location:http://localhost:8888/index.php?action=form_critere_b&erreur=".$message);
         exit();
    }
    
    public function supprimer_critere_b()
    {    
        $id= isset($_GET['id'])? intval($_GET['id']):false;
        if($id!=''){
              $sesion_criter_b=isset($_SESSION["session_critere_b"])? $_SESSION["session_critere_b"]:[];
              if(count($sesion_criter_b)>0){
                 unset($_SESSION["session_critere_b"][$id]);
              }
              $message="Supprimé";
              header("location:http://localhost:8888/index.php?action=liste_critere_b&message=".$message);

        }else{
            
             throw new Exception("UNE ERREUR ID DANS LA ROUTE SUPPRIMER CRITERE EXISTE PAS");
        }       
    }

    public function liste_critere_b(){

       $message=isset($_GET["message"])? htmlspecialchars($_GET["message"]):"";
       $somme_critere_b=0; $titre="liste critere b";
       $container="<a class='d-block p-3 m-3' href='http://localhost:8888/index.php?action=form_critere_b'>Retour</a> 
       <h3 class='m-auto text-center'>Verification des critère B </h3>";
        $test=isset($_SESSION["session_critere_b"]) && count($_SESSION["session_critere_b"])>0;
        if($test){

            $container.="<ul id='liste_critere_b' class='m-auto  col-11 col-md-9 p-0 bg-dark'>";

            foreach($_SESSION["session_critere_b"] as $key => $value){  

              $somme_critere_b +=$value['critere_B']; 
              $container.="
               <li class='my-2 w-100  mx-auto'>
              </span><span  class=' my-2 mx-1 btn btn-light col-2 '>".$value['nbcli_poste']."</span>
              </span><span  class=' my-2 mx-1  btn btn-light col-2 '>".$value['critere_B']."</span>
              <span class='btn btn-light mx-1  col-2 '>".$value['Liste_postes']."</span>
              <span class='btn btn-light mx-1  col-2'>".$value['mode_realim']."</span>
              <a class='btn btn-light mx-1 col-2' href='http://localhost:8888/index.php?action=supprimer_critere_b&id=" .$key."'>Sup</a>
              </li>";    
             } 
             $container.="</li>
             <div class='text-center p-3 col-11 col-md-9 m-auto text-danger bg-info'>
                   <span class='mx-3'><b>CRITERE B TOTAL :</b></span> <span class='mx-3'>$somme_critere_b</span>
            </div>
            <div class='text-left m-auto my-2 col-9 py-3 m-auto '>
                  <a class='p-3  text-dark bg-light' href='http://localhost:8888/index.php?action=form_bie'>Etape suivante</a> 
            </div>"; 
        }
        
        require_once('view/templete2.php');
    }

    public static function create_bie(Controller $controller){

             $array=$_POST;
             $erreur="";
             $params="";
             foreach($array as $key =>$value){
                    if($value==""){
                          $erreur="veuillez remplir les champse marque en rouge";
                          $params.=$key."=".$value."&";

                    }else{
                        $params.=$key."=".$value."&";
                    }
             }

             if($erreur!=""){

                  header("location:http://localhost:8888/index.php?action=form_bie&erreur=".$erreur."&".$params);
                  exit();
             }
             if((isset($_SESSION["session_critere_b"]) && count($_SESSION["session_critere_b"])>0)){
                    $array['Num_bie']="BIE-". date("d-m-y");
                    $array["Date_Bie"]=$array["Heure_Bie"];
                    $controller->create_bie($array);
             }else{
                    header("location:http://localhost:8888/index.php?action=form_critere_b");
                    exit();
             }
             
    }



    
    
}