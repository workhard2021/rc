<?php $titre="Form bie"; 
   $format_date="2016-01-05 00:20:23";
   $erreur=isset($_GET["erreur"])? htmlspecialchars($_GET["erreur"]):"";
ob_start() ?>

<h3 class="text-center text-info my-3"> Information suplementaire bie</h3>
 <p class="text-center text-danger"><?= $erreur ?></p>
<div class="p-3 m-3"><a href="http://localhost:8888/index.php?action=gets&table=critere">Retour</a></div>
<form method="post" action="index.php?action=create&table=bie">
     <!-- autre  -->
    <div class="d-flex mb-3 align-items-flex-start justify-content-center flex-wrap col-11 m-auto">

        <div class="col-5 col-md-3 py-2 mx-3 text-center m-auto">
             <label class="pb-1" for="Id_orig">Origine  
             <?php if(empty($_GET["Id_orig"])){ echo "<span class='text-danger'>*</span>";}?>
             </label><br>
             <select value="" id="Id_orig" name="Id_orig"   class="form-select">
                   <option value="">Choisir</option>
                   <?php  foreach($origine as $value){
                           $val=($value['Id_origine']==$_GET['Id_orig'])? "selected":"";
                        ?>
                        <option <?= $val ?> value="<?=$value["Id_origine"]?>"><?= $value["Lib_Origine"] ?></option>   
                   <?php }?>
             </select>
        </div>
        
        <div class="col-5 col-md-3 py-2 mx-3 text-center m-auto">
            <label class="pb-1" for="Lib_cause">Cause
            <?php if(empty($_GET["Id_cause"])){ echo "<span class='text-danger'>*</span>";}?>
            </label><br>
             <select id="Lib_cause" name="Id_cause"  class="form-select">
              <option value="" selected>Choisir</option>
                   <?php  foreach($causes as $value){
                             $val=($value['Id_cause']==$_GET['Id_cause'])? "selected":"";
                        ?>
                        <option <?= $val ?> value="<?= $value["Id_cause"] ?>"><?= $value["Lib_cause"] ?></option>   
                   <?php }?>
             </select>
        </div>
     
        <div class="col-5 col-md-3 py-2 mx-3 text-center m-auto">
            <label class="pb-1" for="Lib_nature">Nature
             <?php if(empty($_GET["id_nature"])){ echo "<span class='text-danger'>*</span>";}?>
            </label><br>
             <select id="Lib_nature" name="id_nature"   class="form-select">
                  <option value="">Choisir</option>
                  <?php  foreach($nature as $value){ 
                          $val=($value['Id_nature']==$_GET['id_nature'])? "selected":"";
                        ?>
                        <option <?= $val ?> value="<?= $value["Id_nature"] ?>"><?= $value["Lib_nature"] ?></option>   
                   <?php }?>
             </select>
        </div>
        <div class="col-5 col-md-3 py-2 mx-3 text-center m-auto">
            <label class="pb-1" for="id_typedf"> Defaut
            <?php if(empty($_GET["Id_typedef"])){ echo "<span class='text-danger'>*</span>";}?>
            </label><br>
             <select id="Id_typedef" name="Id_typedef" class="form-select">
                  <option value="" >Choisir</option>
                  <?php  foreach($defauts as $value){
                           $val=($value['Id_type']==$_GET['Id_typedef'])? "selected":"";
                        ?>
                        <option <?= $val ?> value="<?= $value["Id_type"] ?>"><?= $value["Lib_type"] ?></option>   
                   <?php }?>
             </select>
        </div>
    

    <!-- autre -->
    
      <div class="col-5 col-md-3 py-2 mx-3 text-center m-auto">
          <label class="pb-1" for="Id_Siege">Siege
          <?php if(empty($_GET["Id_Siege"])){ echo "<span class='text-danger'>*</span>";}?>
          </label><br>
           <select id="Id_Siege" name="Id_Siege"   class="form-select">
                <option value="">Choisir</option>
                <?php  foreach($siege as $value){ 
                          $val=($value['ID_siege']==$_GET['Id_Siege'])? "selected":"";
                      ?>
                        <option <?= $val ?> value="<?=$value["ID_siege"]?>"><?= $value["Lib_siege"]?></option>   
                 <?php }?>
           </select>
      </div>     
      <div class="col-5 col-md-3 py-2 mx-3 text-center m-auto">
          <label class="pb-1" for="Id_typeJ">Type H
          <?php if(empty($_GET["Id_typeh"])){ echo "<span class='text-danger'>*</span>";}?>
          </label><br>
           <select id="Id_typeh" name="Id_typeh"  class="form-select">
               <option value="">Choisir</option>
               <?php  foreach($typeh as $value){

                        $val=($value['Id_typeh']==$_GET['Id_typeh'])? "selected":"";
                    ?>
                        <option <?= $val ?> value="<?= $value["Id_typeh"] ?>"><?= $value["Lib_typeh"] ?></option>   
               <?php }?>
           </select>
      </div>
      <div class="col-5 col-md-3 py-2 mx-3 text-center m-auto">
          <label class="pb-1" for="Id_typej">Type J
          <?php if(empty($_GET["Id_typej"])){ echo "<span class='text-danger'>*</span>";}?>
          </label><br>
           <select id="Id_typej" name="Id_typej"   class="form-select">
                 <option value="" selected>Choisir</option>
                 <?php  foreach($typej as $value){ 
                           $val=($value['Id_typej']==$_GET['Id_typej'])? "selected":"";
                       ?>
                        <option <?= $val ?> value="<?= $value["Id_typej"] ?>"><?= $value["Lib_typej"] ?></option>   
               <?php }?>
           </select>
      </div>
   

  <!-- autre  date -->
  
    <div class="col-5 col-md-3 py-2 mx-3 text-center m-auto">
        <label class="pb-1" for="hpec_bie">Hpec bie 
        <?php if(empty($_GET["hpec_bie"])){ echo "<span class='text-danger'>*</span>";}?>
        </label><br>
        <input value="<?php if(isset($_GET['hpec_bie'])){  echo $_GET['hpec_bie'];}?>"  type="datetime-local" class="form-control" id="hpec_bie" name="hpec_bie" placeholder="<?=$format_date ?>"/>
    </div>
    <div class="col-5 col-md-3 py-2 mx-3 text-center m-auto">
        <label class="pb-1" for="hdebut_bie">Hdebut bie
        <?php if(empty($_GET["hdebut_bie"])){ echo "<span class='text-danger'>*</span>";}?>
        </label><br>
        <input value="<?php if(isset($_GET['hdebut_bie'])){  echo $_GET['hdebut_bie'];}?>" type="datetime-local" class="form-control" id="hdebut_bie" name="hdebut_bie" placeholder="<?=$format_date ?>"/>
    </div>
    <div class="col-5 col-md-3 py-2 mx-3 text-center m-auto">
        <label class="pb-1" for="mderomt_bie">Mderomt bie 
        <?php if(empty($_GET["mderomt_bie"])){ echo "<span class='text-danger'>*</span>";}?>
        </label><br>
        <input value="<?php if(isset($_GET['mderomt_bie'])){  echo $_GET['mderomt_bie'];}?>"  type="datetime-local" class="form-control" id="mderomt_bie" name="mderomt_bie" placeholder="<?=$format_date ?>"/>
    </div>
    <div class="col-5 col-md-3 py-2 mx-3 text-center m-auto">
        <label class="pb-1" for="manloc_bie">Manloc bie 
        <?php if(empty($_GET["manloc_bie"])){ echo "<span class='text-danger'>*</span>";}?>
        </label><br>
        <input value="<?php if(isset($_GET['manloc_bie'])){  echo $_GET['manloc_bie'];}?>"  type="datetime-local" class="form-control" id="manloc_bie" name="manloc_bie" placeholder="<?=$format_date ?>"/>
    </div>

 <!-- date date -->


    <div class="col-5 col-md-3 py-2 mx-3 text-center m-auto">
        <label class="pb-1" for="findc_bie">Locdef bie 
         <?php if(empty($_GET["locdef_bie"])){ echo "<span class='text-danger'>*</span>";}?>
        </label><br>
        <input value="<?php if(isset($_GET['locdef_bie'])){  echo $_GET['locdef_bie'];}?>" type="datetime-local" class="form-control" id="locdef_bie" name="locdef_bie" placeholder="<?=$format_date ?>"/>
    </div>

    <div class="col-5 col-md-3 py-2 mx-3 text-center m-auto">
        <label class="pb-1" for="findc_bie">Findc bie 
        <?php if(empty($_GET["findc_bie"])){ echo "<span class='text-danger'>*</span>";}?>
        </label><br>
        <input value="<?php if(isset($_GET['findc_bie'])){  echo $_GET['findc_bie'];}?>" type="datetime-local" class="form-control" id="findc_bie" name="findc_bie" placeholder="<?=$format_date ?>"/>
    </div>

    <div class="col-5 col-md-3 py-2 mx-3 text-center m-auto">
        <label class="pb-1" for="fin_indispod_bie">Fin indispod bie 
        <?php if(empty($_GET["fin_indispod_bie"])){ echo "<span class='text-danger'>*</span>";}?>
        </label><br>
        <input value="<?php if(isset($_GET['fin_indispod_bie'])){  echo $_GET['fin_indispod_bie'];}?>" type="datetime-local" class="form-control" id="fin_indispod_bie" name="fin_indispod_bie" placeholder="<?=$format_date ?>"/>
    </div>

    <div class="col-5 col-md-3 py-2 mx-3 text-center m-auto">
        <label class="pb-1" for="fin_indispot_bie">Fin d'insdispot bie 
        <?php if(empty($_GET["fin_indispot_bie"])){ echo "<span class='text-danger'>*</span>";}?>
        </label><br>
        <input value="<?php if(isset($_GET['fin_indispot_bie'])){  echo $_GET['fin_indispot_bie'];}?>"  type="datetime-local" class="form-control" id="fin_indispot_bie" name="fin_indispot_bie" placeholder="<?=$format_date ?>"/>
    </div>


      <!-- autre date  -->

    
       <div class="col-5 col-md-3 py-2 mx-3 text-center m-auto">
          <label class="pb-1" for="premappelcex_bie">Prémier appel cex
            <?php if(empty($_GET["premappelcex_bie"])){ echo "<span class='text-danger'>*</span>";}?>
         </label><br>
          <input value="<?php if(isset($_GET['premappelcex_bie'])){  echo $_GET['premappelcex_bie'];}?>" type="datetime-local" class="form-control" id="premappelcex_bie" name="premappelcex_bie" placeholder="<?=$format_date ?>"/>
       </div>

      <div class="col-5 col-md-3 py-2 mx-3 text-center m-auto">
          <label class="pb-1" for="premctactcex_bie">Prémier contact cex 
          <?php if(empty($_GET["premctactcex_bie"])){ echo "<span class='text-danger'>*</span>";}?>
          </label><br>
          <input value="<?php if(isset($_GET['premctactcex_bie'])){  echo $_GET['premctactcex_bie'];}?>" type="datetime-local" class="form-control" id="premctactcex_bie" name="premctactcex_bie" placeholder="<?=$format_date ?>"/>
       </div>
       <div class="col-5 col-md-3 py-2 mx-3 text-center m-auto">
           <label class="pb-1" for="nbrenvoi_defaut">Nbrenvoi defaut
           <?php if(empty($_GET["nbrenvoi_defaut"])){ echo "<span class='text-danger'>*</span>";}?>
           </label><br>
           <input value="<?php if(isset($_GET['nbrenvoi_defaut'])){  echo $_GET['nbrenvoi_defaut'];}?>" class="form-control" type="number" id="nbrenvoi_defaut" name="nbrenvoi_defaut" placeholder="Nombre de renvoi" />
      </div>


<!-- autre omt  -->


    <div class="col-5 col-md-3 py-2 mx-3 text-center m-auto">
        <label class="pb-1" for="nb_omt_man">Nb omt man
        <?php if(empty($_GET["nb_omt_man"])){ echo "<span class='text-danger'>*</span>";}?>
        </label><br>
        <select  id="nb_omt_man" name="nb_omt_man"  class="form-select">
        <option value="" >Choisir</option>
        <?php   foreach($omt as $value){ 

                    $val=($value['Id_omt']==$_GET['nb_omt_man'])? "selected":"";
                ?>
                 <option <?= $val ?> value="<?= $value["Id_omt"] ?>"><?= $value["Lib_omt"] ?></option>   
         <?php }?>
       </select>
    </div>
    <div class="col-5 col-md-3 py-2 mx-3 text-center m-auto">
        <label class="pb-1" for="nb_omt_def">Nb omt def
        <?php if(empty($_GET["nb_omt_def"])){ echo "<span class='text-danger'>*</span>";}?>
        </label><br>
        <select  id="nb_omt_def" name="nb_omt_def"  class="form-select">
             <option value="">Choisir</option>
           <?php   foreach($omt as $value){
                     $val=($value['Id_omt']==$_GET['nb_omt_def'])? "selected":"";
                   ?>
                   <option <?= $val ?> value="<?= $value["Id_omt"] ?>"><?= $value["Lib_omt"] ?></option>   
           <?php }?>
       </select>
    </div>

    <div class="col-5 col-md-3 py-2 mx-3 text-center m-auto">
       <label class="pb-1" for="nb_ild_visu">Nb ild visu
       <?php if(empty($_GET["nb_ild_visu"])){ echo "<span class='text-danger'>*</span>";}?>
       </label><br>
       <select  id="nb_ild_visu" name="nb_ild_visu"  class="form-select">
       <option value="">Choisir Nb ild visu</option>
            <?php  foreach($ild as $value){
                $val=($value['Id_ild']==$_GET['nb_ild_visu'])? "selected":"";
            ?>
            <option <?= $val ?> value="<?= $value["Id_ild"] ?>"><?= $value["lib_ild"] ?></option>   
           <?php }?>
       </select>
    </div>
    <div class="col-5 col-md-3 py-2 mx-3 text-center m-auto">
       <label class="pb-1" for="nb_ild_def">Nb ild def
       <?php if(empty($_GET["nb_ild_def"])){ echo "<span class='text-danger'>*</span>";}?>
       </label><br>
       <select id="nb_ild_def" name="nb_ild_def"  class="form-select">
       <option  value="">Choisir</option>
           <?php  foreach($ild as $value){ 
                 $val=($value['Id_ild']==$_GET['nb_ild_def'])? "selected":"";
            ?>
            <option  <?= $val ?> value="<?= $value["Id_ild"] ?>"><?= $value["lib_ild"] ?></option>   
           <?php }?>
       </select>
    </div>



<!--Nb illd visu  -->

    
    <div class="col-5 col-md-3 py-2 mx-3 text-center m-auto">
        <label class="pb-1" for="dsp1">Dispatch 1
        <?php if(empty($_GET["dsp1"])){ echo "<span class='text-danger'>*</span>";}?>
        </label><br>
        <input type="text" class="form-control" id="dsp1" value="<?php if(isset($_GET['dsp1'])){  echo $_GET['dsp1'];}?>" name="dsp1" placeholder="Dispatcher 1"/>
    </div>
    <div class="col-5 col-md-3 py-2 mx-3 text-center m-auto">
        <label class="pb-1" for="dsp2">Dispatch 2
        <?php if(empty($_GET["dsp2"])){ echo "<span class='text-danger'>*</span>";}?>
        </label><br>
        <input type="text" class="form-control" id="dsp2" value="<?php if(isset($_GET['dsp2'])){  echo $_GET['dsp2'];}?>" name="dsp2" placeholder="Dispatcher 2"/>
    </div>
    <div class="col-5 col-md-3 py-2 mx-3 text-center m-auto">
        <label class="pb-1" for="Id_resp">Id_resp
        <?php if(empty($_GET["Id_resp"])){ echo "<span class='text-danger'>*</span>";}?>
        </label><br>
        <input type="number" class="form-control" value="<?php if(isset($_GET['Id_resp'])){  echo $_GET['Id_resp'];}?>" id="Id_resp" name="Id_resp" placeholder="Id_resp"/>
     </div>
    <div class="col-5 col-md-3 py-2 mx-3 text-center m-auto">
        <label class="pb-1" for="Heure_Bie">Heure bie
        <?php if(empty($_GET["Heure_Bie"])){ echo "<span class='text-danger'>*</span>";}?>
        </label><br>
        <input type="datetime-local" class="form-control" value="<?php if(isset($_GET['Heure_Bie'])){  echo $_GET['Heure_Bie'];}?>" id="Heure_Bie" name="Heure_Bie" placeholder="<?=$format_date ?>"/>
     </div>    


       <div class=" m-auto mt-0 col-11 py-2">
         <label class="pb-1" for="Lieu_def_rex">Lieu def rex
             <?php if(empty($_GET["Lieu_def_rex"])){ echo "<span class='text-danger'>*</span>";}?>
         </label><br>
         <textarea id="Lieu_def_rex"  class="w-100" rows="5" name="Lieu_def_rex"><?php if(isset($_GET['Lieu_def_rex'])){  echo $_GET['Lieu_def_rex'];}?></textarea>
       </div>

 <div class="my-3 p-5 col-11 m-auto">
    <button class="btn btn-info col-4 d-block m-auto">Envoyer</button>
 </div>
    </div>
<?php $container=ob_get_clean();
?>