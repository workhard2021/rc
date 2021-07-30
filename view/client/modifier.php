<?php  ob_start(); 
 
  $titre="FORMULAIRE CLEINT"; 
  $erreur="";$message="";
  if(isset($_GET['erreur'])){ 

       $erreur="<div class='text-center text-danger'>".htmlspecialchars($_GET['erreur'])."</div>";
  }
  if(isset($_GET['message'])){ 

    $message="<div class='text-center text-success'>".htmlspecialchars($_GET['message'])."</div>";
  }
  

?>

<h3 class="text-center text-dark my-3">Modifier Client</h3>
  <?= $erreur?>
  <?=$message ?>
<form id="send" method="post" action="index.php?action=update&table=client&id=<?=$res['Id_transf']?>">

     <div class="d-flex mb-3 align-items-flex-center justify-content-center col-11 m-auto  flex-wrap">
        
        <div class="col-5 col-md-2 py-2 text-center m-auto">
            <label class="pb-1" for="Id_posSce">Poste source
            </label><br>
             <select id="Id_posSce"   name="Id_posSce"  class="form-select">   
                  <option value="" selected>Choisir</option>   
                   <?php foreach($pos_sce as $value){  
                        $valid=($value['Id']==$res['Id_posSce'])? "selected":"";
                    ?>
                   <option <?= $valid ?> value="<?= $value["Id"]?>"><?= $value["libelle_poste"] ?></option>;
                  <?php }?> 
             </select>
        </div>

        <div class="col-5 col-md-2 py-2 text-center m-auto">
            <label class="pb-1" for="Id_depart">Depart 
            </label><br>
             <select id="Id_depart" name="Id_depart" class="form-select"> 
                  <option value="" selected>Choisir</option> 
                   <?php  foreach($pos_sce as $val){ ?>
                    <optgroup label="<?= $val["libelle_poste"] ?>">
                    <?php  foreach($depart_hta as $value){ 
                                if($value["Id_Psce"]==$val["Id"]){
                                    $valid=($value['Id_depart']==$res['Id_depart'])? "selected":"";
                                 ?>
                                    <option <?= $valid ?> value="<?= $value["Id_depart"]?>"><?= $value["Lib_depart"] ?></option>;
                                <?php } ?>
                     <?php }?> 
                     </optgroup> 
                    <?php } ?> 
              </select>
        </div>

        <div class="col-5 col-md-2 py-2 text-center m-auto">
            
            <label class="pb-1" for="Id_commune">Commune</label><br>
             <select id="Id_commune"   name="Id_commune"  class="form-select">  
                   <option value="" selected>Choisir</option>   
                   <?php foreach($liste_commune as $value){  

                        $valid=($value['Id_Commune']==$res['Id_commune'])? "selected":""
                    ?>
                   <option <?= $valid ?>  value="<?= $value["Id_Commune"]?>"><?= $value["Lib_Commune"] ?></option>;
                  <?php }?> 
             </select>
        </div>

    </div> 
    <!-- autre -->
    <div class="d-flex mb-3 align-items-flex-center justify-content-center col-11 m-auto flex-wrap">
      
        <div class="col-5 col-md-2 py-2 text-center m-auto">
            <label class="pb-1" for="Id_village">Village</label><br>
             <select id="Id_village" name="Id_village" class="form-select"> 
                   <option value="" selected>Choisir</option> 
                   <?php  foreach($liste_commune as $val){ ?>
                    <optgroup label="<?= $val["Lib_Commune"] ?>">
                    <?php  foreach($liste_village as $value){ 

                                $valid=($value['Id_village']==$res['Id_village'])? "selected":"";

                                if($value["id_commune"]==$val["Id_Commune"]){?>

                                    <option <?= $valid ?> value="<?= $value["Id_village"]?>"><?= $value["lib_village"] ?></option>;
                               
                                <?php } ?>
                     <?php }?> 
                     </optgroup> 
                    <?php } ?> 
              </select>
        </div>
        <div class="col-5 col-md-2 py-2 text-center m-auto">
           <label class="pb-1" for="nb_clients">Nombre de client</label><br>
           <input type="number" id="nb_clients" value="<?php echo $res['nb_clients'];?>" name="nb_clients" placeholder="Nombre de client"/>
        </div>

        <div class="col-5 col-md-2 py-2 text-center m-auto">
           <label class="pb-1" for="Num_transf">Numero tranfo</label><br>
           <input type="number" id="Num_transf" value="<?php echo $res['Num_transf'];?>" name="Num_transf" placeholder="Numéro transfo"/>
        </div>
        <div class="col-5 col-md-2 py-2 text-center m-auto">
           <label class="pb-1" for="Lib_transf">Libelle transfo</label><br>
           <input type="text" id="Lib_transf" value="<?php  echo $res['Lib_transf'];?>" name="Lib_transf" placeholder="Libelle"/>
        </div>
    </div>
  <div class="my-3 p-5 col-11 m-auto">
        <button class="btn btn-info col-4 d-block m-auto">Modifier</button>
   </div>
</form>
<?php $container = ob_get_clean() ?>