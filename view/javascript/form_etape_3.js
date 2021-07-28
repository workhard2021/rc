
const Id_nature=document.getElementById('Id_nature');
const Id_cause=document.getElementById('Id_cause');
const id_typedf=document.getElementById('id_typedf');
const Id_origin=document.getElementById('Id_origine');
const ID_siege=document.getElementById('ID_siege');

const Id_typeh=document.getElementById('Id_typeh');
const Id_typej=document.getElementById('Id_typej');

const nb_omt_man=document.getElementById('nb_omt_man');
const nb_omt_def=document.getElementById('nb_omt_def');

const nb_ild_visu=document.getElementById('nb_ild_visu');
const nb_ild_def=document.getElementById('nb_ild_def');


 function sommeBie(){

    let somme=localStorage.getItem("somme")!=undefined? localStorage.getItem("somme"):0;
    const critere_b=document.getElementById("critere_b");
    const total_critere=document.getElementById("total_critere");
    critere_b.value=somme
    total_critere.innerHTML="<span class='mx-3'><b>CRITERE B TOTAL :</b></span> <span class='mx-3'>"+somme+"</span>";
}

async function  omt(){

    data= await get("omt");
    let option='<option value="" selected>chosir nature</option>';
    for(let i=0; i<data.length;i++){
          option+='<option value='+data[i].Id_omt+'>'+data[i].Lib_omt+'</option>';
    }
    nb_omt_def.innerHTML=option;
    nb_omt_man.innerHTML=option; 
}


async function  ild(){
    data= await get("ild");
    let option='<option value="" selected>chosir nature</option>';
     
    for(let i=0; i<data.length;i++){
      option+='<option value='+data[i].Id_ild+'>'+data[i].lib_ild+'</option>';
    }
    nb_ild_visu.innerHTML=option;    
    nb_ild_def.innerHTML=option;       
} 

async function  typeh(){
    data= await get("typeh");
    let option='<option value="" selected>chosir nature</option>';
    for(let i=0; i<data.length;i++){
          option+='<option value='+data[i].Id_typej+'>'+data[i].Lib_typeh+'</option>';
    }
    Id_typeh.innerHTML=option;       
}

async function  typej(){
    data= await get("typej");
    let option='<option value="" selected>chosir nature</option>';
    for(let i=0; i<data.length;i++){
          option+='<option value='+data[i].Id_typej+'>'+data[i].Lib_typej+'</option>';
    }
    Id_typej.innerHTML=option;       
}

 async function get(table){
    const url=`http://localhost:8888/index.php?action=gets&table=${table}`;
    let res= await fetch(url,{method:'get',headers:"application/json"});
    console.log(res);
    if(res.status !==200) alert("une erreur");
    res= await res.json(); 
    return res;
}

async function  nature(){
    data= await get("nature");
    let option='<option value="" selected>chosir nature</option>';
    for(let i=0; i<data.length;i++){
          option+='<option value='+data[i].Id_nature+'>'+data[i].Lib_nature+'</option>';
    }
    Id_nature.innerHTML=option;       
}

async function  causes(){

    data= await get("causes");
    let option='<option value="" selected>Chosir cause</option>';
    for(let i=0; i<data.length;i++){
          option+='<option value='+data[i].Id_cause+'>'+data[i].Lib_cause+'</option>';
    }
    Id_cause.innerHTML=option;       
}
async function  Origine(){

    data= await get("origine");
    let option='<option value="" selected>Chosir cause</option>';
    for(let i=0; i<data.length;i++){
          option+='<option value='+data[i].Id_origine+'>'+data[i].Lib_Origine+'</option>';
    }
    Id_origine.innerHTML=option;       
}

async function  defauts(){

    data= await get("defauts");
    let option='<option value="" selected>Chosir cause</option>';
    for(let i=0; i<data.length;i++){
          option+='<option value='+data[i].Id_type+'>'+data[i].Lib_type+'</option>';
    }
    id_typedf.innerHTML=option;       
}

async function  siege(){

    data= await get("siege");
    let option='<option value="" selected>Chosir cause</option>';
    for(let i=0; i<data.length;i++){
          option+='<option value='+data[i].ID_siege+'>'+data[i].Lib_siege+'</option>';
    }
    ID_siege.innerHTML=option;       
}


window.addEventListener("load",async()=>{
    //charger les donnée les fiformation de formulaire
    // nature();
    // causes();
    // defauts();
    // Origine();
    siege();
    // typeh();
    // typej();
    // omt();
    // ild();
    // injection de totalbie 
    sommeBie();
});