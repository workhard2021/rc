<?php ob_start(); 
 
  $titre="FORMULAIRE CLEINT"; 
  $erreur="";$message="";
  if(isset($_GET['erreur'])){ 

       $erreur="<div class='text-center my-2  text-danger'>".htmlspecialchars($_GET['erreur'])."</div>";
  }
  if(isset($_GET['message'])){ 
    $message="<div class='text-center my-2 text-success'>".htmlspecialchars($_GET['message'])."</div>";
  }
  
?>

<h3 class="text-center text-dark my-3">Ajouter un client</h3>
  <?= $erreur?>
  <?=$message ?>
<form id="send" method="post" action="index.php?action=create&table=client">

     <div class="d-flex mb-3 align-items-flex-center justify-content-center col-11 m-auto flex-wrap">
        
        <div class="col-5 col-md-2 py-2 text-center m-auto">
            <label class="pb-1" for="Id_posSce">Poste source
                <?php if(empty($_GET["Id_posSce"])){ echo "<span class='text-danger'>*</span>";}?>
            </label><br>
             <select id="Id_posSce"   name="Id_posSce"  class="form-select">   
                  <option value="" selected>Choisir</option>   
                   <?php foreach($pos_sce as $value){  
                        $valid=($value['Id']==$_GET['Id_posSce'])? "selected":"";
                    ?>
                   <option <?= $valid ?> value="<?= $value["Id"]?>"><?= $value["libelle_poste"] ?></option>;
                  <?php }?> 
             </select>
        </div>

        <div class="col-5 col-md-2 py-2 text-center m-auto">
            <label class="pb-1" for="Id_depart">Depart 
                  <?php if(empty($_GET["Id_depart"])){ echo "<span class='text-danger'>*</span>";}?>
            </label><br>
             <select id="Id_depart" name="Id_depart" class="form-select"> 
                  <option value="" selected>Choisir</option> 
                   <?php  foreach($pos_sce as $val){ ?>
                    <optgroup label="<?= $val["libelle_poste"] ?>">
                    <?php  foreach($depart_hta as $value){ 
                                if($value["Id_Psce"]==$val["Id"]){

                                    $valid=($value['Id_depart']==$_GET['Id_depart'])? "selected":"";
                                 ?>
                                    <option <?= $valid ?> value="<?= $value["Id_depart"]?>"><?= $value["Lib_depart"] ?></option>;
                                <?php } ?>
                     <?php }?> 
                     </optgroup> 
                    <?php } ?> 
              </select>
        </div>

        <div class="col-5 col-md-2 py-2 text-center m-auto">
            
            <label class="pb-1" for="Id_commune">Commune
            <?php if(empty($_GET["Id_commune"])){ echo "<span class='text-danger'>*</span>";}?>
            </label><br>
             <select id="Id_commune"   name="Id_commune"  class="form-select">  
                   <option value="" selected>Choisir</option>   
                   <?php foreach($liste_commune as $value){  

                        $valid=($value['Id_Commune']==$_GET['Id_commune'])? "selected":""
                    ?>
                   <option <?= $valid ?>  value="<?= $value["Id_Commune"]?>"><?= $value["Lib_Commune"] ?></option>;
                  <?php }?> 
             </select>
        </div>

    </div> 
    <!-- autre -->
    <div class="d-flex mb-3 align-items-flex-center justify-content-center col-11 m-auto flex-wrap">
      
        <div class="col-5 col-md-2 py-2 text-center m-auto">
            <label class="pb-1" for="Id_village">Village
             <?php if(empty($_GET["Id_village"])){ echo "<span class='text-danger'>*</span>";}?>
            </label><br>
             <select id="Id_village" name="Id_village" class="form-select"> 
                   <option value="" selected>Choisir</option> 
                   <?php  foreach($liste_commune as $val){ ?>
                    <optgroup label="<?= $val["Lib_Commune"] ?>">
                    <?php  foreach($liste_village as $value){ 

                                $valid=($value['Id_village']==$_GET['Id_village'])? "selected":"";

                                if($value["id_commune"]==$val["Id_Commune"]){?>

                                    <option <?= $valid ?> value="<?= $value["Id_village"]?>"><?= $value["lib_village"] ?></option>;
                               
                                <?php } ?>
                     <?php }?> 
                     </optgroup> 
                    <?php } ?> 
              </select>
        </div>
        <div class="col-5 col-md-2 py-2 text-center m-auto">
           <label class="pb-1" for="nb_clients">Nombre de client
           <?php if(empty($_GET["nb_clients"])){ echo "<span class='text-danger'>*</span>";}?>
           </label><br>
           <input type="number" class="form-control" id="nb_clients" value="<?php if(isset($_GET['nb_clients'])){  echo $_GET['nb_clients'];}?>" name="nb_clients" placeholder="Nombre de client"/>
        </div>

        <div class="col-5 col-md-2 py-2 text-center m-auto">
           <label class="pb-1" for="Num_transf">Numero tranfo
           <?php if(empty($_GET["Num_transf"])){ echo "<span class='text-danger'>*</span>";}?>
           </label><br>
           <input type="number" class="form-control" id="Num_transf" value="<?php if(isset($_GET['Num_transf'])){  echo $_GET['Num_transf'];}?>" name="Num_transf" placeholder="Numéro transfo"/>
        </div>
        <div class="col-5 col-md-2 py-2 text-center m-auto">
           <label class="pb-1" for="Lib_transf">Libelle transfo
           <?php if(empty($_GET["Lib_transf"])){ echo "<span class='text-danger'>*</span>";}?>
           </label><br>
           <input type="text" class="form-control" id="Lib_transf" value="<?php if(isset($_GET['Lib_transf'])){  echo $_GET['Lib_transf'];}?>" name="Lib_transf" placeholder="Libelle"/>
        </div>

    </div>
  <div class="my-3 p-5 col-11 m-auto">
        <button class="btn btn-info col-4 d-block m-auto">Enregistrer</button>
   </div>
</form>
<script src="view/javascript/client.js"></script>
<?php $container = ob_get_clean() ?>