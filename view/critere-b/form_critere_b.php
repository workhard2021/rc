<?php $titre="Ajoute critere b"; 

  $erreur="";
  if(isset($_GET['erreur'])){ 

       $erreur="<div class='text-center text-danger'>".htmlspecialchars($_GET['erreur'])."</div>";
  }
  $count=isset($_SESSION['session_critere_b'])? count($_SESSION['session_critere_b']):0;

ob_start()?>

<h3 class="text-center text-dark">Ajouter un bie</h3>
 <div class="d-flex align-items-center justify-coneten-evently my-3 py-3">
 <a class="m-auto" href="http://localhost:8888/index.php?action=gets_bie">Home</a>
 <a class="m-auto" href="http://localhost:8888/index.php?action=liste_critere_b">Liste critere B <span class="text-danger" id="nbr"><?= $count?></span></a>
 </div>
  <?= $erreur?>
<form id="send" method="post" action="index.php?action=ajouter_critere_b">

     <div class="d-flex mb-3 align-items-flex-center justify-content-center col-11 m-auto  flex-wrap">
        <div class="col-5 col-md-2 py-2 text-center m-auto">
            <label class="pb-1" for="postes">Poste source</label><br>
             <select id="Liste_postes"   name="Liste_postes"  class="form-select">    
                   <?php foreach($pos_sce as $value){   ?>
                       <option data="<?= $value['Id']?>" value="<?= $value["libelle_poste"]?>"><?= $value["libelle_poste"] ?></option>;
                  <?php }?> 
             </select>
        </div>
        <div class="col-5 col-md-2 py-2 text-center m-auto">
            <label class="pb-1" for="departs">Depart</label><br>
             <select id="departs" name="departs" class="form-select"> 
                   <?php  foreach($pos_sce as $val){ ?>
                    <optgroup label="<?= $val["libelle_poste"] ?>">
                    <?php  foreach($depart_hta as $value){ 
                                if($value["Id_Psce"]==$val["Id"]){ ?>
                                    <option value="<?= $value["Lib_depart"]?>"><?= $value["Lib_depart"] ?></option>;
                                <?php } ?>
                     <?php }?> 
                     </optgroup> 
                    <?php } ?> 
              </select>
        </div>

        <div class="col-5 col-md-3 py-2 text-center m-auto">
            <label class="pb-1" for="clients">Transformateur</label><br>
             <div  id="clients" class="form-select" >
                   <?php  foreach($depart_hta as $val){ ?>

                    <div> <span class="text-info"><?= $val["Lib_depart"]?></span><br>
                    <?php  foreach($clients as $value){ 
                                if($value["Id_depart"]==$val["Id_depart"]){ ?>

                                    <label for="<?= $value["Id_transf"]?>"><?= $value["Lib_transf"]?></label>
                                    <input id="<?=$value["Id_transf"]?>" name="<?= $value["Lib_transf"] ?>" type="checkbox" value="<?= $value["nb_clients"]?>" /><br>
                                <?php } ?>
                     <?php }?> 
                   </div> 
                    <?php } ?> 
            </div>
       </div>

       <!-- <div class=" col-5 col-md-2 py-2 text-center m-auto">
            <label class="pb-1" for="nbcli_poste">Nombre de client</label><br>
            <input type="text" id="nbcli_poste" name="nbcli_poste" class="col-12" placeholder="nombre de client"/>
       </div> -->

    </div> 
    <!-- autre -->
    <div class="d-flex mb-3 align-items-flex-center justify-content-center col-11 m-auto flex-wrap">

      <div class="col-5 col-md-2 py-2 text-center m-auto">
        <label class="pb-1" for="date_incident">Début de l'incident</label><br>
        <input type="datetime-local" id="date_incident" name="date_incident" placeholder="debut"/>
      </div>

      <div class="col-5 col-md-2 py-2 text-center m-auto">
        <label class="pb-1" for="date_realim">Heure de réalimentation</label><br>
        <input type="datetime-local" id="date_realim" name="date_realim" placeholder="fin"/>
      </div> 

      <div class="col-5 col-md-2 py-2 text-center m-auto">
        <label class="pb-1" for="mode_realim">Mode réalimentation</label><br>
        <input type="mode_realim" id="mode_realim" name="mode_realim" placeholder="Mode realim"/>
      </div>  
 <div class="my-3 p-5 col-11 m-auto">
    <button class="btn btn-info col-4 d-block m-auto">Ajouter +</button>
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