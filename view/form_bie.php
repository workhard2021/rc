<?php $title="Ajoute bie"; ob_start() ?>

<h3 class="text-center text-dark">Ajouter un bie</h3>

<form method="post" action="index.php?action=form">

     <div class="d-flex m-3 align-items-flex-star justify-content-start   col-11 m-auto">
      
        <div class=" m-auto mt-0 col-2 py-2">
          <label class="pb-1" for="heur_bie">Heure bie</label><br>
          <input type="datetime-local" id="heur_bie" name="heur_bie" placeholder="Heure bie"/>
       </div>
     </div>
     <div class="d-flex m-3 align-items-flex-start justify-content-evenly   col-11 m-auto">

        <div class=" m-auto mt-0 col-2 py-2">
            <label class="pb-1" for="post_sce">Poste source</label><br>
             <select id="post_sce" name="post_sce"  class="form-select">
    
                  <?php foreach($poste_source as $value) { ?> 
                            <option value="<?= $value["Id"]?>"><?= $value["libelle_poste"]?></option>
                  <?php } ?>

             </select>
        </div>

        <div class=" m-auto mt-0 col-2 py-2">
            <label class="pb-1" for="post_sce">Depart</label><br>
             <select id="post_sce" name="post_sce"  multiple class="form-select">
                  <?php foreach($poste_source as $val){?>
                       <optgroup label="<?= $val['libelle_poste']?>">

                  <?php  foreach($departs as $value) {
                             if($value['Id_Psce']==$val['Id']){ ?> 
                               <option value="<?= $value['Id_depart']?>"> <?= $value["Lib_depart"]?></option>
                  <?php }} ?>
                  </optgroup>
                  <?php }?>
             </select>
        </div>

        <div class=" m-auto my-3 col-10 col-md-5">
            <label class="pb-1" for="lieu_defaut_rex">Lieu du Defaut et Rex</label><br>
            <textarea id="lieu_defaut_rex" name="lieu_defaut_rex" class="col-12" placeholder="commentaire"></textarea>
        </div>

    </div> 

         <!-- autre  -->
    <div class="d-flex mb-3 align-items-flex-start justify-content-evenly   col-11 m-auto">
        
        <div class=" m-auto mt-0 col-2 py-2">
            <label class="pb-1" for="Lib_origin">Origine</label><br>
             <select id="Lib_origin" name="Lib_origin"   class="form-select">
                   <option selected>Choisir cause</option>
                   <?php  foreach($origine as $value){ ?>
                        <option value="<?= $value["Id_origine"] ?>"><?= $value["Lib_Origine"] ?></option>   
                   <?php }?>
             </select>
        </div>
        <div class=" m-auto mt-0 col-2 py-2">
            <label class="pb-1" for="Lib_cause">Cause</label><br>
             <select id="Lib_cause" name="Id_cause"  class="form-select">
              <option selected>Choisir cause</option>
                   <?php  foreach($causes as $value){ ?>
                        <option value="<?= $value["Id_cause"] ?>"><?= $value["Lib_cause"] ?></option>   
                   <?php }?>
             </select>
        </div>

        <div class=" m-auto mt-0 col-2 py-2">

            <label class="pb-1" for="Lib_nature">Nature</label><br>
             <select id="Lib_nature" name="Id_nature"   class="form-select">
                  <option selected>Choisir nature</option>
                  <?php  foreach($nature as $value){ ?>
                        <option value="<?= $value["Id_nature"] ?>"><?= $value["Lib_nature"] ?></option>   
                   <?php }?>
             </select>
        </div>
        <div class=" m-auto mt-0 col-2 py-2">
            <label class="pb-1" for="id_typedf"> Defaut</label><br>
             <select id="id_typedf" name="id_typedf"   class="form-select">
                  <option selected>Choisir type </option>
                  <?php  foreach($defauts as $value){ ?>
                        <option value="<?= $value["Id_type"] ?>"><?= $value["Lib_type"] ?></option>   
                   <?php }?>
             </select>
        </div>

    </div> 

    <!-- autre -->
    <div class="d-flex mb-3 align-items-flex-start justify-content-evenly   col-11 m-auto">
      
      <div class=" m-auto mt-0 col-2 py-2">
          <label class="pb-1" for="Id_siege">Siege</label><br>
           <select id="Id_siege" name="Id_siege"   class="form-select">
                <option selected>Choisir siège</option>
                <?php  foreach($sieges as $value){ ?>
                        <option value="<?= $value["ID_siege"] ?>"><?= $value["Lib_siege"] ?></option>   
                 <?php }?>
           </select>
      </div>
      
      <div class=" m-auto mt-0 col-2 py-2">

          <label class="pb-1" for="Id_typeJ">Type H</label><br>
           <select id="Id_typeh" name="Id_typeh"   class="form-select">
               <option selected>Choisir type H</option>
               <?php  foreach($typeh as $value){ ?>
                        <option value="<?= $value["Id_typeh"] ?>"><?= $value["Lib_typeh"] ?></option>   
               <?php }?>
           </select>
      </div>
      <div class=" m-auto mt-0 col-2 py-2">
          <label class="pb-1" for="Id_typej">Type J</label><br>
           <select id="Id_typej" name="Id_typej"   class="form-select">
                 <option selected>Choisir type J</option>
                 <?php  foreach($typej as $value){ ?>
                        <option value="<?= $value["Id_typej"] ?>"><?= $value["Lib_typej"] ?></option>   
               <?php }?>
           </select>
      </div>

   </div> 

  <!-- autre  date -->
  <div class="d-flex mb-3 align-items-flex-start justify-content-center col-11 m-auto">
    
    <div class=" m-auto mt-0 col-2 py-2">
        <label class="pb-1" for="hpec_bie">Hpec bie </label><br>
        <input type="datetime-local" id="hpec_bie" name="hpec_bie" placeholder="Hpec bie"/>
    </div>

    <div class=" m-auto mt-0 col-2 py-2">
        <label class="pb-1" for="hdebut_bie">Hdebut bie </label><br>
        <input type="datetime-local" id="hdebut_bie" name="hdebut_bie" placeholder="Hdebut bie"/>
    </div>

    <div class=" m-auto mt-0 col-2 py-2">
        <label class="pb-1" for="mderomt_bie">Mderomt bie </label><br>
        <input type="datetime-local" id="mderomt_bie" name="mderomt_bie" placeholder="M deromt bie"/>
    </div>

    <div class=" m-auto mt-0 col-2 py-2">
        <label class="pb-1" for="manloc_bie">Manloc bie </label><br>
        <input type="datetime-local" id="manloc_bie" name="manloc_bie" placeholder="Manloc bie"/>
    </div>
</div> 
 <!-- date date -->
<div class="d-flex mb-3 align-items-flex-start justify-content-center col-11 m-auto">

    <div class=" m-auto mt-0 col-2 py-2">
        <label class="pb-1" for="findc_bie">Locdef bie </label><br>
        <input type="datetime-local" id="locdef_bie" name="locdef_bie" placeholder="Locdef bie"/>
    </div>

    <div class=" m-auto mt-0 col-2 py-2">
        <label class="pb-1" for="findc_bie">Findc bie </label><br>
        <input type="datetime-local" id="findc_bie" name="findc_bie" placeholder="Findc bie"/>
    </div>

    <div class=" m-auto mt-0 col-2 py-2">
        <label class="pb-1" for="fin_indispod_bie">Fin indispod bie </label><br>
        <input type="datetime-local" id="fin_indispod_bie" name="fin_indispod_bie" placeholder="Find indispod bie"/>
    </div>

    <div class=" m-auto mt-0 col-2 py-2">
        <label class="pb-1" for="fin_indispot_bie">Fin d'insdispot bie</label><br>
        <input type="datetime-local" id="fin_indispot_bie" name="fin_indispot_bie" placeholder="Find indispot bie"/>
    </div>

</div>
      <!-- autre date  -->
<div class="d-flex mb-3 align-items-flex-start justify-content-evenly   col-11 m-auto">
    
       <div class=" m-auto mt-0 col-2 py-2">
          <label class="pb-1" for="premappelcex_bie">Prémier appel cex </label><br>
          <input type="datetime-local" id="premappelcex_bie" name="premappelcex_bie" placeholder="Premier appel cex"/>
       </div>

      <div class=" m-auto mt-0 col-2 py-2">
          <label class="pb-1" for="premactactcex_bie">Prémier contact cex </label><br>
          <input type="datetime-local" id="premactactcex_bie" name="premactactcex_bie" placeholder="Premier contact cex"/>
       </div>

       <div class=" m-auto mt-0 col-2 py-2">
           <label class="pb-1" for="nbrenvoi_defaut">Nbrenvoi defaut</label><br>
           <input type="number" id="nbrenvoi_defaut" name="nbrenvoi_defaut" />
      </div>

    <div class=" m-auto mt-0 col-2 py-2">
        <label class="pb-1" for="id_transf">Transformateur</label><br>
        <select  id="id_transf" name="id_transf" multiple class="form-select">
           <option selected>Choisir Transfo</option>
           <?php foreach($transfo as $value){ ?>
                    <option value="<?= $value["Id_transf"] ?>"><?= $value["Lib_transf"] ?></option>   
           <?php }?>
       </select>
    </div>

</div>

<!-- autre omt  -->
<div class="d-flex mb-3 align-items-flex-start justify-content-evenly   col-11 m-auto">
    
    <div class=" m-auto mt-0 col-2 py-2">
        <label class="pb-1" for="nb_omt_man">Nb omt man</label><br>
        <select  id="nb_omt_man" name="nb_omt_man" multiple class="form-select">
        <option selected>Choisir Nb omt man</option>
        <?php   foreach($omt as $value){ ?>
                        <option value="<?= $value["Id_omt"] ?>"><?= $value["Lib_omt"] ?></option>   
         <?php }?>
       </select>
    </div>
    <div class=" m-auto mt-0 col-2 py-2">
        <label class="pb-1" for="nb_omt_def">Nb omt def</label><br>
        <select  id="nb_omt_def" name="nb_omt_def" multiple class="form-select">
             <option selected>Choisir Nb omt def</option>
           <?php   foreach($omt as $value){ ?>
                        <option value="<?= $value["Id_omt"] ?>"><?= $value["Lib_omt"] ?></option>   
           <?php }?>
       </select>
    </div>

    <div class=" m-auto mt-0 col-2 py-2">
       <label class="pb-1" for="nb_ild_visu">Nb ild visu</label><br>
       <select  id="nb_ild_visu" name="nb_ild_visu" multiple class="form-select">
       <option selected>Choisir Nb ild visu</option>
           <?php  foreach($ild as $value){ ?>
                        <option value="<?= $value["Id_ild"] ?>"><?= $value["lib_ild"] ?></option>   
           <?php }?>
       </select>
    </div>
    <div class=" m-auto mt-0 col-2 py-2">
       <label class="pb-1" for="nb_ild_def">Nb ild def</label><br>
       <select id="nb_ild_def" name="nb_ild_def" multiple class="form-select">
       <option selected>Choisir Nb ild def</option>
           <?php  foreach($ild as $value){ ?>
                        <option value="<?= $value["Id_ild"] ?>"><?= $value["lib_ild"] ?></option>   
           <?php }?>
       </select>
    </div>

</div>

<!--Nb illd visu  -->
<div class="d-flex mb-3 align-items-flex-start justify-content-center col-11 m-auto">
    
    <div class=" m-auto mt-0 col-2 py-2">
        <label class="pb-1" for="dsp1">Dispatch 1</label><br>
        <input type="text" id="dsp1" name="dsp1" placeholder="Dispatcher 1"/>
    </div>
    <div class=" m-auto mt-0 col-2 py-2">
        <label class="pb-1" for="dsp2">Dispatch 2</label><br>
        <input type="text" id="dsp2" name="dsp2" placeholder="Dispatcher 2"/>
    </div>

</div>


 <div class="my-3 p-5 col-11 m-auto">
    <button class="btn btn-info col-4 d-block m-auto">Envoyer</button>
 </div>

      
      
</form>



<?php $container=ob_get_clean() ?>