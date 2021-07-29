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

<script>
const nbcli_poste=document.getElementById("nbcli_poste");
const date_realim=document.getElementById("date_realim");

const mode_realim=document.getElementById("mode_realim");
const debut_incident=document.getElementById('debut_incident');
const critere_B=document.getElementById('critere_B');
const Liste_postes=document.getElementById("Liste_postes");

const postes=document.getElementById("postes");
const departs=document.getElementById("departs");
const clients=document.getElementById("clients");

const send=document.getElementById('send');
postes.addEventListener("change",getDepart);
departs.addEventListener("change",getTranfo);

async  function getDepart(){ 

               const id=this.value;
               if(id=='') return false;
               const url=`http://localhost:8888/index.php?action=get&table=depart_hta&colonne=id_psce&id=${id}`;
               let res= await get(url);
               let option='<option value="" selected>poste source</option>';
               for(let i=0; i<res.length;i++){
                     option+='<option value='+res[i].Id_depart+'>'+res[i].Lib_depart+'</option>';
                } 
                departs.innerHTML=option; 
                nb_Clients.value=0; 
                clients.innerHTML='';                
}

async  function getTranfo(){ 

     const id=this.value;
     const url=`http://localhost:8888/index.php?action=gets&table=clients`;
     const res= await get(url);
     let option=''; 
     for(let i=0; i<res.length;i++){
         
           if(res[i].Id_depart==id){
             option +='<label for="'+res[i].Id_transf+'">'+res[i].Lib_transf+'</label>';
             option+='<input  id="'+res[i].Id_transf+'" onchange="getNbClient(this)" type="checkbox" class="inputClient" value='+res[i].nb_clients +'><br>';
           }
      } 
      clients.innerHTML=option; 
      nb_Clients.value=0;  
}
//utitliser dans getTranfo pour connaitre le nombre de client 
async  function getNbClient(el){
       let somme=0;
      if(Number(nb_Clients.value)>0){
          somme=Number(nb_Clients.value);
      }
     if(el.checked){
            somme+=Number(el.value); 
     }else{

         if(Number(el.value)>0 && Number(el.value)!=undefined){
              somme= somme - Number(el.value);
          }else{
               alert("Nombre de client n'est valide");
          }
     }
      //injecter dans la l'inpute

     nb_Clients.value=somme;
}

async function get(url){
    let res= await fetch(url,{method:'get',headers:"application/json"});
    if(res.status !==200) alert("une erreur");
    res= await res.json();  
    return res;
}

async function  post_src(){
    const url=`http://localhost:8888/index.php?action=gets&table=pos_sce`;
    const post_source= await get(url);

    let option='<option value="" selected>poste source</option>';
    for(let i=0; i<post_source.length;i++){
          option+='<option value='+post_source[i].Id+'>'+post_source[i].libelle_poste+'</option>';
    }
    Liste_postes.innerHTML=option;       
}

async function  siege(){
    const url=`http://localhost:8888/index.php?action=gets&table=siege`;
    data= await get(url);
    let option='<option value="" selected>Chosir cause</option>';
    for(let i=0; i<data.length;i++){
          option+='<option value='+data[i].ID_siege+'>'+data[i].Lib_siege+'</option>';
    }
    ID_siege.innerHTML=option;       
}
async function valider(e){
        
 
}

send.addEventListener("submit",(e)=>{
     e.preventDefault();
     valider();
})

window.addEventListener("load",async()=>{
    post_src();
    let array=JSON.parse(localStorage.getItem("critere_b"))!=undefined?JSON.parse(localStorage.getItem("critere_b")):[];
    nbr.textContent=array.length;
})
</script>


<?php $container = ob_get_clean() ?>