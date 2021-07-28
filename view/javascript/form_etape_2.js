function supprimer(value){
        
    id=value.id;
    let array=JSON.parse(localStorage.getItem("bie"))!=undefined?JSON.parse(localStorage.getItem("bie")):[];
     array=array.filter(value=> value.id!=id);
     localStorage.setItem("bie",JSON.stringify(array));
     getBie("liste");         
}
function getBie(action="init",value=0){

let array=JSON.parse(localStorage.getItem("bie"))!=undefined?JSON.parse(localStorage.getItem("bie")):[];
switch(action){
        case "liste":
              let element='';
              const liste=document.getElementById("list_bie");
             for (let index = 0; index < array.length; index++) {

                 element +='<li class="my-2 mx-auto"><span class="btn btn-dark text-light my-2 mx-3"> #CB '
                  +(index+1)+'</span><span  class=" my-2 mx-3 btn btn-info col-2">'
                  +array[index].bie.toFixed(2)+'</span>'+
                   '<span>'+array[index].date+'</span>'+
                   '<span>'+array[index].+'</span>'+
                   '<span onclick="supprimer(this)" id='
                  +array[index].id+' class="btn btn-danger my-2 mx-3" >supprimer</span></li>'; 
             }
             if(array.length==0){
                 element="<div class='text-info text-center'>La liste de critère b est vide</div>";
             }
             liste.innerHTML=element;
       case "somme":
            let somme=0;
            for (let index = 0; index < array.length; index++) {
                 somme+=array[index].bie;
            }
            localStorage.setItem("somme",somme);
            const critere_b=document.getElementById("critere_b");
            critere_b.innerHTML="<span class='mx-3'><b>CRITERE B TOTAL :</b></span> <span class='mx-3'>"+somme.toFixed(2) +"</span>";
       break;
       default:
       localStorage.clear("bie");
}
}
window.addEventListener("load",()=>{
    //getBie('load');
     getBie("liste");
     getBie("somme");
     
})