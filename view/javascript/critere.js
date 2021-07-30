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
                let options="<option value='' selected>Choisir</option>";
                for(let value of res){
                     options+="<option  value='"+value["Lib_depart"]+ "'>"+value["Lib_depart"]+"</option>";    
                }
                departs.innerHTML=options;  
                clients.innerHTML="";                                 
 }
 
 async function  getTransfo(e){
                e.preventDefault();
                const id=this.value;
                let input="";
                url=`http://localhost:8888/e.php?table=depart_hta&colonne=Lib_depart&id=${id}`;
                let res=await get(url);
                url2=`http://localhost:8888/e.php?table=clients&colonne=Id_depart&id=${res[0].Id_depart}`;
                res=await get(url2);
                for(let value of res){
                     input+="<label for='"+value["Id_transf"]+"'>"+value["Lib_transf"]+"</label>"+
                      "<input id='"+ value["Id_transf"]+ "' name='"+value["Lib_transf"]+"' type='checkbox' value='"+value["nb_clients"]+"'/><br>";
                }
                clients.innerHTML=input;
 }
 
 window.addEventListener("load",()=>{
         clients.innerHTML="";
 })
 