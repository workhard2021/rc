async function get(url){

    let res= await fetch(url,{method:'get',headers:"application/json"});
     if(res.status !=200) alert("une erreur");
     return await res.json(); 

}

const Liste_postes=document.getElementById("Liste_postes");
const departs=document.getElementById("departs");
const clients=document.getElementById("clients");

Liste_postes.addEventListener("change",getDepart);
departs.addEventListener("change",getTransfo);

async  function getDepart(e){
               e.preventDefault();
               const id=this.value;
               url=`http://localhost:8888/e.php?table=pos_sce&colonne=libelle_poste&id=${id}`;
               let res=await get(url);
               url2=`http://localhost:8888/e.php?table=depart_hta&colonne=Id_Psce&id=${res[0].Id}`;
               res=await get(url2);
               let depart="<option selected>Choisir</option>";
               for(let value of res){
                    depart+="<option  value='"+value["Lib_depart"]+ "'>"+value["Lib_depart"]+"</option>";    
               }
               departs.innerHTML=depart;  
               clients.innerHTML="";                                 
}

async function  getTransfo(e){
               e.preventDefault();
               const id=this.value;
               let transf="";
               url=`http://localhost:8888/e.php?table=depart_hta&colonne=Lib_depart&id=${id}`;
               let res=await get(url);
               url2=`http://localhost:8888/e.php?table=clients&colonne=Id_depart&id=${res[0].Id_depart}`;
               res=await get(url2);
               for(let value of res){
                    
                    transf+="<label for='"+value["Id_transf"]+"'>"+value["Lib_transf"]+"</label>"+
                     "<input id='"+ value["Id_transf"]+ "' name='"+value["Lib_transf"]+"' type='checkbox' value='"+value["nb_clients"]+"'/><br>";
               }
               clients.innerHTML=transf;
}

window.addEventListener("load",()=>{
        clients.innerHTML="";
})