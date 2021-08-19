<?php ob_start(); $titre="Ajoute critere b"; 

  $erreur="";
  $format_date="2016-01-05 00:20:23";
  if(isset($_GET['erreur'])){ 

       $erreur="<div class='text-center text-danger'>".htmlspecialchars($_GET['erreur'])."</div>";
  }
  $message="";
  if(isset($_GET['message'])){ 

       $message="<div class='text-center text-success'>".htmlspecialchars($_GET['message'])."</div>";
  }
  $count=isset($_SESSION['session_critere_b'])? count($_SESSION['session_critere_b']):0;

?>

<h3 class="text-center text-dark">Ajouter un bie</h3>
 <div class="d-flex align-items-center justify-coneten-evently my-3 py-3">
 <a class="m-auto" href="index.php?action=gets&table=critere">Voir critere B <span class="text-danger" id="nbr"><?= $count?></span></a>
 </div>
  <?= $erreur?>
  <?=$message ?>

<form id="send" method="post" action="index.php?action=create&table=critere">

     <div class="d-flex mb-3 align-items-flex-center justify-content-center col-12 m-auto flex-wrap">
        <div class="col-5 col-md-3 py-2  text-center m-auto">
            <label class="pb-1" for="postes">Poste source
            <?php if(empty($_GET["Liste_postes"])){ echo "<span class='text-danger'>*</span>";}?>
            </label><br>
             <select id="Liste_postes"   name="Liste_postes"  class="form-select">  
                  <option value="" selected>Choisir</option>  
                   <?php  foreach($pos_sce as $value){  
                        $valid=($value['libelle_poste']==$_GET['Liste_postes'])? "selected":"";
                       ?>
                       <option <?= $valid ?>  value="<?= $value["libelle_poste"]?>"><?= $value["libelle_poste"] ?></option>;
                  <?php }?> 
             </select>
        </div>
        <div class="col-5 col-md-3 py-2  text-center m-auto">
            <label class="pb-1" for="departs">Depart
            <?php if(empty($_GET["departs"])){ echo "<span class='text-danger'>*</span>";}?>
            </label><br>
             <select id="departs" name="departs" class="form-select"> 
                   <option value="" selected>Choisir</option>  
                   <?php  foreach($pos_sce as $val){ ?>
                    <optgroup label="<?= $val["libelle_poste"] ?>">
                    <?php  foreach($depart_hta as $value){
                                $valid=($value['Lib_depart']==$_GET['departs'])? "selected":"";
                                if($value["Id_Psce"]==$val["Id"]){ ?>
                                <option <?= $valid ?>  value="<?= $value["Lib_depart"]?>"><?= $value["Lib_depart"] ?></option>;
                                <?php } ?>
                     <?php }?> 
                     </optgroup> 
                    <?php } ?> 
              </select>
         </div>
         <div class="col-5 col-md-3 py-2  text-center m-auto">

               <label class="pb-1" for="clients">Transformateur</label><br>
               
               <div  id="clients" class="form-select" >
                   <?php  foreach($depart_hta as $val){ ?>
                    <div> <span class="text-info"><?= $val["Lib_depart"]?></span><br>
                    <?php  foreach($clients as $value){ 
                                if($value["Id_depart"]==$val["Id_depart"]){ ?>
                                    <label for="<?= $value["Id_transf"]?>"><?= $value["Lib_transf"]?></label>
                                    <input id="<?= $value["Id_transf"]?>"   name="<?= $value["Lib_transf"] ?>" type="checkbox" value="<?= $value["nb_clients"]?>"/><br>
                                <?php } ?>
                     <?php }?> 
                   </div> 
                    <?php } ?> 
               </div>
         </div>
         
    </div> 
    <!-- autre -->
    <div class="d-flex mb-3 align-items-flex-center justify-content-center col-12 m-auto flex-wrap">

      <div class="col-5 col-md-3 py-2  text-center m-auto">
        <label class="pb-1" for="date_incident">Début de l'incident
        <?php if(empty($_GET["date_incident"])){ echo "<span class='text-danger'>*</span>";}?>
        </label><br>
        <input type="datetime-local" class="form-control"  value="<?php if(isset($_GET['date_incident'])){  echo $_GET['date_incident'];}?>"  id="date_incident" name="date_incident" placeholder="<?=$format_date?>"/>
      </div>

      <div class="col-5 col-md-3 py-2  text-center m-auto">
        <label class="pb-1" for="date_realim">Heure de réalimentation
        <?php if(empty($_GET["date_realim"])){ echo "<span class='text-danger'>*</span>";}?>
        </label><br>
        <input type="datetime-local" class="form-control"  value="<?php if(isset($_GET['date_realim'])){  echo $_GET['date_realim'];}?>"  id="date_realim" name="date_realim" placeholder="<?= $format_date?>"/>
      </div> 
      
      <div class="col-5 col-md-3 py-2  text-center m-auto">
        <label class="pb-1" for="mode_realim">Mode réalimentation
        <?php if(empty($_GET["mode_realim"])){ echo "<span class='text-danger'>*</span>";}?>
        </label><br>
        <input type="mode_realim"  class="form-control" value="<?php if(isset($_GET['mode_realim'])){  echo $_GET['mode_realim'];}?>" id="mode_realim" name="mode_realim" placeholder="Mode realim"/>
      </div>  
 <div class="my-3 p-5 col-11 m-auto">
    <button class="btn btn-secondary col-4 d-block m-auto">Ajouter +</button>
 </div>
</form>
<script src="../../public/javascript/critere.js"></script>
<?php $container = ob_get_clean() ?>