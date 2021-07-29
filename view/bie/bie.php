<?php ob_start(); $titre="Détail"; 
 $somme_client=0;
  $somme_critere_b=0; 
   foreach($res2 as $value){ 
     $somme_client+=$value["nbcli_poste"];
     $somme_critere_b+=$value["critere_B"];
   }
 ?> 
  

<h2 class="text-center text-info mt-3">Rapport critère B</h2>
   <div class="m-3 col-2 bg-light my-2 p-1">
         <a href="http://localhost:8888/index.php?action=pdf&table=bie&id=<?= $res['id_bie']?>">Télécharger Pdf</a>
    </div>

   <h3 class="w-100 text-center"> CRITERE B <span class="text-danger"> <?=$res["CritereB"]?></span></h3>
   
   <div class="d-flex flex-wrap align-items-flex-start col-12 m-auto justify-content-evently">

     <div class="d-flex flex-wrap align-items-flex-start col-12 m-auto justify-content-evently "> 
         <img  class="col-1 m-auto p-1" src="view/images/edm.png" alt="..."/>   
         <span class="m-auto p-1"><b>N° </b><?=$res["Num_bie"]?></span><br>
         <span class="m-auto p-1"><b>Date:</b> <?=$res["Heure_Bie"]?></span>
     </div> 

     <div class="m-auto col-11 col-md-5 bg-light my-2 p-1">
            <span class="my-2">Origine:</span>  
            <span class="mx-2"> <?=$res["Lib_Origine"]?></span><br>
            <span class="my-2">Nature:</span> 
            <span class="mx-2"> <?=$res["Lib_nature"]?></span><br>
            <span class="my-2">Cause:</span> 
            <span class="mx-2"> <?=$res["Lib_cause"]?></span><br>
            <span class="my-2">Type defaut:</span>  
            <span class="mx-2"> <?=$res["Lib_type"]?></span><br>
      </div>
     <div  class="m-auto col-11 col-md-5 bg-light my-2 p-1">
            <span class="my-2">Siege:</span>  
            <span class="mx-2"> <?=$res["Lib_siege"]?></span><br>
            <span class="my-2">Post source:</span>  
            <span class="mx-2"> <?=$res["libelle_poste"]?></span><br>
            <span class="my-2">Depart:</span>  
            <span class="mx-2"> <?=$res["Lib_depart"]?></span><br>
            <span class="my-2">Nombre clients:</span>  
            <span class="mx-2"><?= $somme_client ?></span><br>
       </div>

       <div  class="m-auto col-11 col-md-5 bg-light my-2 p-1">
            <span class="my-2">TypeJ :</span>  
            <span class="mx-2"> <?=$res["Lib_typej"]?></span><br>
            <span class="my-2">TypeH:</span> 
            <span class="mx-2"> <?=$res["Lib_typeh"]?></span><br>
            <span class="my-2">Nombre de omt man:</span> 
            <span class="mx-2"> <?=$res["nb_omt_man"]?></span><br>
            <span class="my-2">Nombre de omt def:</span> 
            <span class="mx-2"> <?=$res["nb_omt_def"]?></span><br>
     </div>            
     <div  class="m-auto col-11 col-md-5 bg-light my-2 p-1">
            <span class="my-2"> Manoeuvre dernier omt:</span>  
            <span class="mx-2"> <?= date('H \H i \M\n s \S', strtotime($res["mderomt_bie"])) ?></span><br>
            <span class="my-2">Localisation du défaut:</span> 
            <span class="mx-2"><?= date('H \H i \M\n s \S', strtotime($res["locdef_bie"])) ?></span><br>
            <span class="my-2">Fin de coupure:</span> 
            <span class="mx-2">  <?= date('H \H i \M\n s \S', strtotime($res["findc_bie"])) ?></span><br>
            <span class="my-2">Fin d'indisponiblité de l'ouvrage en défaut:</span> 
            <span class="mx-2"> <?= date('H \H i \M\n s \S', strtotime($res["fin_indispod_bie"])) ?></span><br>
    </div>
    <div  class="m-auto col-11 col-md-5 bg-light my-2 p-1">
            <span class="my-2"> Prémier contact avec pdm:</span>  
            <span class="mx-2"><?=$res["pdm_bie"]?></span><br>
            <span class="my-2">Nombre de renvois sur défaut:</span> 
            <span class="mx-2"><?=$res["nbrenvoi_defaut"]?></span><br>
     </div>
     <div  class="m-auto col-11 col-md-5 bg-light my-2 p-1">
            <span class="my-2">Dispatcheur 1 :</span> 
            <span class="my-2"> <?=$res["dsp1"]?></span><br>
            <span class="my-2">Dispatcheur 2 :</span> 
            <span class="my-2"> <?=$res["dsp2"]?></span><br>
     </div>
     <div class="m-auto col-11 col-md-11 bg-light my-2 p-1">
               <span class="my-2">Lieu de defaut et Rex:</span>  
               <p><?=$res["Lieu_def_rex"]?></p>
     </div>
  </div>
<div class="col-11 m-auto">
<table class="table text-light">
 <thead>
   <tr class="text-center">
     <th scope="col" class="col-2 px-2 mx-1 bg-info text-dark">
          <span class="my-2">Date</span>
     </th>
     <th scope="col" class="col-2 px-2 mx-1 bg-info text-dark">
          <span class="my-2">Heure</span>
    </th>
     <th scope="col" class="col-3 px-2 mx-1 bg-info text-dark">
          <span class="my-2">Poste réalimentés</span>
     </th>
     <th scope="col"  class="col-1 px-2 mx-1 bg-info text-dark">
         <span class="my-2">T</span>
     </th>
     <th scope="col"  class="col-2 px-2 mx-1 bg-info text-dark">
          <span class="my-2">Clients</span>
     </th>
     <th class="col-3 px-2 mx-1 bg-info text-dark">
       <span class="my-2">Critère B(Ms)</span>
     </th>
  </tr>
 </thead>
 <tbody>
 <?php foreach($res2 as $value){ 
   
 ?>
<tr class="text-center">
       <td><span class="px-2 bg-secondary  m-2"><?= date('d/m/Y', strtotime($value["date_realim"])) ?></span></td>
       <td> <span class="px-2 bg-secondary  m-2"> <?= date('H \H i \M\n s \S', strtotime($value["date_realim"]))?></span></td>
       <td ><span class="px-2 bg-secondary  m-2"> <?=$value["Liste_postes"] ?></span></td>
       <td><span class="px-2 bg-secondary  m-2">T</span></td>
       <td><span class="px-2 bg-secondary  m-2"><?=$value["nbcli_poste"]?></span></td>
       <td><span class="px-2 bg-secondary  m-2"><?= $value["critere_B"]?></span></td> 
    </tr>    
 <?php } ?>

    <tr class="text-center">

               <td colSpan='3 ' class='text-dark'><b>Total</b><td>
               <td><span class="px-2  bg-danger text-dark m-2"><b><?=$somme_client?></b></span></td>
               <td><span class="px-2 bg-danger text-dark m-2"><b><?=$somme_critere_b ?></b></span></td>
    <tr>
   </tbody></table>
</div>

<?php $container=ob_get_clean() ?>