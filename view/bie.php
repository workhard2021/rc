<?php $title="detail bie"; ob_start()  ?>

<h2 class="text-center text-info">Information de critère B</h2>

      <h3 class="w-100 text-center"> CRITERE B <span class="text-danger"><?= $donnee["CritereB"]?></span></h3>
     
      <div class="d-flex flex-wrap align-items-flex-start justify-content-center">
          <div class="m-auto col-12 col-md-3  bg-light" >
               <span>Origine:<span>  
               <span class="mx-2"><?= $donnee['Lib_Origine']?></span><br>
               <span>Nature:<span>  
               <span class="mx-2"><?= $donnee['Lib_nature']?></span><br>
               <span>Cause:<span>  
               <span class="mx-2"><?= $donnee['Lib_cause']?></span><br>
               <span>Type defaut:<span>  
               <span class="mx-2"><?= $donnee['Lib_type']?></span><br>
          </div>
          <div  class="m-auto col-12 col-md-3  bg-light" >
               <span>SIEGE:<span>  
               <span class="mx-2"><?= $donnee['Lib_siege']?></span><br>

               <span>Lieu de defaut et Rex:<span>  
               <span class="mx-2"><?= $donnee['Lieu_def_rex']?></span><br>
          </div>
          <div  class="m-auto col-12 col-md-3  bg-light">
               <span>TypeJ :<span>  
               <span class="mx-2"><?= $donnee['Lib_typej']?></span><br>
               <span>TypeH:<span>  
               <span class="mx-2"><?= $donnee['Lib_typeh'] ?></span><br>
          </div>

          <div  class="m-auto mt-4 col-12 col-md-7 text-center  bg-light">
               <span>Dispatcheur 1 :<span>  
               <span class="mx-2"><?= $donnee['dsp1']?></span><br>
               <span>Dispatcheur 2 :<span>  
               <span class="mx-2"><?= $donnee['dsp2'] ?></span><br>
          </div>
     </div>
 

 <?php $container=ob_get_clean() ?>


 