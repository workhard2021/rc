
async function get(url){

     let res= await fetch(url,{method:'get',headers:"application/json"});
     if(res.status !=200) alert("une erreur");
     return await res.json(); 
    
    }
    
    const Id_posSce=document.getElementById("Id_posSce");
    const Id_depart=document.getElementById("Id_depart");
    
    const Id_commune=document.getElementById("Id_commune");
    const Id_village=document.getElementById("Id_village");
    
    Id_posSce.addEventListener("change",getDepart);
    Id_commune.addEventListener("change",getVillage);
    
    
    async  function getDepart(e){
    
               e.preventDefault();
               const id=this.value;
               url=`http://localhost:8888/e.php?table=depart_hta&colonne=Id_Psce&id=${id}`;
               res=await get(url);
               let options="<option value='' selected>Choisir</option>";
               for(let value of res){
                    options+="<option  value='"+value["Id_depart"]+ "'>"+value["Lib_depart"]+"</option>";    
                }
               Id_depart.innerHTML=options;                                  
    }
    
    async  function getVillage(e){
               e.preventDefault();
               const id=this.value;
               url=`http://localhost:8888/e.php?table=liste_village&colonne=Id_Commune&id=${id}`;
               res=await get(url);
               let options="<option value='' selected>Choisir</option>";
               for(let value of res){
    
                        options+="<option  value='"+value["Id_village"]+ "'>"+value["lib_village"]+"</option>";    

                }
                Id_village.innerHTML=options;                               
    }
    