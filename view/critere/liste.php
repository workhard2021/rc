<?php 
        $message=isset($_GET["message"])? htmlspecialchars($_GET["message"]):"";
        $somme_critere_b=0; $titre="liste critere b";
        $container="<a class='d-block p-3 m-3' href='http://localhost:8888/index.php?action=form&table=critere'>Retour</a> 
        <h3 class='m-auto text-center'>Verification des critère B </h3>
        <p class='text-center text-success py-2'>$message</p>";
        $test=isset($_SESSION["session_critere_b"]) && count($_SESSION["session_critere_b"])>0;
        if($test){
  
             $container.="<ul id='liste_critere_b' class='m-auto text-center  col-11 col-md-9 p-0 bg-dark'>
              <li>
                </span><span  class=' my-2 mx-1 btn btn-light col-2 '>Clients</span>
                </span><span  class=' my-2 mx-1 btn btn-light col-2 '>Critere B</span>
                </span><span  class=' my-2 mx-1 btn btn-light col-2 '>Poste</span>
                </span><span  class=' my-2 mx-1 btn btn-light col-2 '>Mode réalim</span>
                </span><span  class=' my-2 mx-1 btn btn-light col-2 '>Action</span>
              </li>
             ";
  
             foreach($_SESSION["session_critere_b"] as $key => $value){  
  
               $somme_critere_b +=$value['critere_B']; 
               $container.="
                <li class='my-2 w-100  mx-auto'>
               </span><span  class=' my-2 mx-1 btn btn-light col-2 '>".$value['nbcli_poste']."</span>
               </span><span  class=' my-2 mx-1  btn btn-light col-2 '>".$value['critere_B']."</span>
               <span class='btn btn-light mx-1  col-2 '>".$value['Liste_postes']."</span>
               <span class='btn btn-light mx-1  col-2'>".$value['mode_realim']."</span>
               <a class='btn btn-light mx-1 col-2' href='http://localhost:8888/index.php?action=delete&table=critere&id=" .$key."'>Supp</a>
               </li>";    
              } 
              $container.="</li>
              <div class='text-center p-3 col-11 col-md-9 m-auto text-danger bg-info'>
                    <span class='mx-3'><b>CRITERE B TOTAL :</b></span> <span class='mx-3'>$somme_critere_b</span>
             </div>
             <div class='text-left m-auto my-2  py-3 m-auto'>
                   <a class='p-3  text-dark bg-light' href='http://localhost:8888/index.php?table=bie&action=form'>Etape suivante</a> 
             </div>"; 
        }

        