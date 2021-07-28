const body_table=document.getElementById('body_table');

async function get(table){
    const url=`http://localhost:8888/index.php?action=gets_bie`;
    let res= await fetch(url,{method:'get',headers:"application/json"});
    console.log(res);
    if(res.status!==200) alert("une erreur");
    res= await res.json(); 
    return res;
}
async function getBie (){

     const data= await get("liste_bie");
     console.log(data);
     let element="<table  class='table'>"+
        "<thead>"+ 
          "<tr>"
            "<th class='text-center'>ID#</th>"+
            "<th class='text-center'>CRITERE B</th>"+
            "<th class='text-center'>Fin disp bie</th>"+
            "<th class='text-center'>ACTION</th>"+
          "</tr>"+
      "</thead>"+
"<body>";

     for (let index = 0; index < data.length; index++) {
        element+='<tr>'+
        '<td class="text-center">'+data[index].id_bie+'</td>'+
         '<td class="text-center"><a class="btn btn-warning w-100" href="/view/critere_b.php?&id='+data[index].id_bie+'">'+data[index].CritereB+'</a></td>'+
        '<td class="text-center">'+data[index].fin_indispot_bie+'</td>'+
        '<td class="text-center"> <a  class="btn btn-info" href="index.php?action=getUpdate&id='+data[index].id_bie +
        '">modifier</a><a class="btn btn-danger" href="index.php?action=delete&id='+
          data[index].id_bie+'"> suprimer</a></td>'
        '</tr>';
     }
     element+="</body></table>";
     body_table.innerHTML=element;
}
window.addEventListener("load",()=>{
    
    getBie();
})