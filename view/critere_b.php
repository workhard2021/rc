<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"  crossorigin="anonymous"></script>
    <title>Critere B</title>
    <!-- <script src="./javascript/critere_b.js" async></script> -->
</head>

<body>
       <div id="critere">
           <!-- info critere b -->
       </div>
       <div id="criter_b_detail" class="d-flex bg-light align-items-flex-start col-11 col-md-11 m-auto justify-content-evently">
               <!-- critere b -->
        </div>

        <script>
            const critere=document.getElementById("critere");
            const criter_b_detail=document.getElementById("criter_b_detail");

function formatDate(x,f){

       let date={annee:"",heure:{}};
       if(x==undefined) x="00/00/00 00:00:00";
       const y=x.split(" ");
       const annees=y[0].split("-");
       const h_mn_s=y[1].split(":");
       //heure 
       const h=h_mn_s[0];
       const mn=h_mn_s[1];
       const s=h_mn_s[2];
       //annne;
       annee=annees[0];
       moi=annees[1];
       jour=annees[2];
       date={annee:jour+'/'+moi+'/'+annee,heure:{h,mn,s}}
       if(f=="formath"){
           return {annee:jour+'/'+moi+'/'+annee,heure:h +' H '+ mn+' Ms '+s+' S '}
       }
       return date;
}

async  function getCriterB(){
    const id=location.search.split("=")[1];
    const url=`http://localhost:8888/index.php?action=get_bie&table=liste_bie&id=${id}`;
    let data= await fetch(url,{method:'get',headers:"application/json"});
    if(data.status !== 200) alert("une erreur");
    data= await data.json(); 
    const {bie,critere_b}=data;
    somme_critere_b=0;
    somme_nbr_client=0;

    critere_b_contenu='<table class="table text-light">'+
  '<thead>'+
    '<tr class="text-center">'+
      '<th scope="col" class="col-2 px-2 mx-1 bg-info text-dark">'+
           '<span>Date</span>'+
      '</th>'+
      '<th scope="col" class="col-2 px-2 mx-1 bg-info text-dark">'+
           '<span>Heure</span>'+
     '</th>'+
      '<th scope="col" class="col-3 px-2 mx-1 bg-info text-dark">'+
           '<span>Poste réalimentés</span>'+
      '</th>'+
      '<th scope="col"  class="col-1 px-2 mx-1 bg-info text-dark">'+
          '<span>T</span>'+
      '</th>'+
      '<th scope="col"  class="col-2 px-2 mx-1 bg-info text-dark">'+
           '<span>Nombre</span>'+
      '</th>'+
      '<th class="col-3 px-2 mx-1 bg-info text-dark">'+
        '<span>Critère B(Ms)</span>'+
      '</th>'+
   '</tr>'+
  '</thead>'+
  '<tbody>';
for(let index=0;index<critere_b.length;index++){
       const date=formatDate(critere_b[index]["date_realim"]);
       const {annee,heure}=date;
       const {h,mn,s}=heure;
       somme_critere_b+=Number(critere_b[index]["critere_B"]);
       somme_nbr_client+=Number(critere_b[index]["nbcli_poste"]);
       
       
    critere_b_contenu+='<tr class="text-center">'+
        '<td><span class="px-2 bg-secondary  m-2">'+annee+'</span></td>'+
        '<td>'+
             '<span class="px-2 bg-secondary  m-2"> '+
               '<span>'+h+' <b>H</b></span> '+
               '<span>'+mn+' <b>Mn</b></span> '+
               '<span>'+s+' <b>S</b></span> '+
             '</span>'+
       '</td>'+
        '<td ><span class="px-2 bg-secondary  m-2">'+critere_b[index]["Liste_postes"]+'</span></td>'+
        '<td><span class="px-2 bg-secondary  m-2">T</span></td>'+
        '<td><span class="px-2 bg-secondary  m-2">'+critere_b[index]["nbcli_poste"]+'</span></td>'+
        '<td><span class="px-2 bg-secondary  m-2">'+critere_b[index]["critere_B"]+'</span></td>'+ 
    '</tr>';     
     
    }
    critere_b_contenu+='<tr class="text-center">'+
                '<td colSpan="3 " class="text-dark">Total<td>'+
                '<td><span class="px-2  bg-danger text-dark m-2"><b>'+somme_nbr_client+'</b></span></td>'+
                '<td><span class="px-2 bg-danger text-dark m-2"><b>'+somme_critere_b.toFixed(2)+'</b></span></td>'+
          '<tr>';
    critere_b_contenu+='</tbody></table>';
  

    let element='<h2 class="text-center text-info">Information de critère B</h2>'+
    '<div class="m-3 col-2 bg-light my-2 p-1">'+
                '<a href="critere_b.php">Télécharger Pdf</a>'+
        '</div>'+
    '<h3 class="w-100 text-center"> CRITERE B <span class="text-danger">'+bie.CritereB+'</span></h3>'+
   
    '<div class="d-flex flex-wrap align-items-flex-start col-12 m-auto justify-content-evently">'+
      
      '<div class="w-100 text-center">'+
          '<span class="m-auto p-1"><b>N° </b>'+bie['Num_bie']+'</span><br>'+
          '<span class="m-auto p-1"><b>Date:</b>'+bie['Date_Bie']+'</span>'+
      '</div>'+ 
      '<div class="m-auto col-11 col-md-5 bg-light my-2 p-1">'+
             '<span>Origine:</span>'+  
             '<span class="mx-2">'+bie['Lib_Origine']+'</span><br>'+
             '<span>Nature:</span>'+ 
             '<span class="mx-2">'+bie['Lib_nature']+'</span><br>'+
             '<span>Cause:</span>'+ 
             '<span class="mx-2">'+bie['Lib_cause']+'</span><br>'+
             '<span>Type defaut:</span>'+  
             '<span class="mx-2">'+bie['Lib_type']+'</span><br>'+
        '</div>'+

        '<div  class="m-auto col-11 col-md-5 bg-light my-2 p-1">'+
             '<span>Siege:</span>'+  
             '<span class="mx-2">'+bie['Lib_siege']+'</span><br>'+
             '<span>Post source:</span>'+  
             '<span class="mx-2">'+bie['libelle_poste']+'</span><br>'+
             '<span>Depart:</span>'+  
             '<span class="mx-2">'+bie['Lib_depart']+'</span><br>'+
             '<span>Nombre clients:</span>'+  
             '<span class="mx-2">'+133+'</span><br>'+
        '</div>'+

        '<div  class="m-auto col-11 col-md-5 bg-light my-2 p-1">'+
             '<span>TypeJ :</span>'+  
             '<span class="mx-2">'+bie['Lib_typej']+'</span><br>'+
             '<span>TypeH:</span>'+ 
             '<span class="mx-2">'+bie['Lib_typeh'] +'</span><br>'+
             '<span>Nombre de omt man:</span>'+ 
             '<span class="mx-2">'+bie['nb_omt_man'] +'</span><br>'+
             '<span>Nombre de omt def:</span>'+ 
             '<span class="mx-2">'+bie['nb_omt_def'] +'</span><br>'+
        '</div>';

            // formater les  date 
             let mderomt_bie=formatDate(bie['mderomt_bie'],'formath').heure;
             mderomt_bie=mderomt_bie;
             let locdef_bie=formatDate(bie['locdef_bie'],'formath').heure;
             locdef_bie=locdef_bie;
             let findc_bie=formatDate(bie['findc_bie'],'formath').heure;
             findc_bie=findc_bie;
             let fin_indispod_bie=formatDate(bie['fin_indispod_bie'],'formath');
             let fin_indispod_bie_annee=fin_indispod_bie.annee;
             fin_indispod_bie=fin_indispod_bie.heure;
            
       element+='<div  class="m-auto col-11 col-md-5 bg-light my-2 p-1">'+
             '<span> Manoeuvre dernier omt:</span>'+  
             '<span class="mx-2">'+mderomt_bie+'</span><br>'+
             '<span>Localisation du défaut:</span>'+ 
             '<span class="mx-2">'+locdef_bie +'</span><br>'+
             '<span>Fin de coupure:</span>'+ 
             '<span class="mx-2">'+findc_bie+'</span><br>'+
             "<span>Fin d'indisponiblité de l'ouvrage en défaut:</span>"+ 
             '<span class="mx-2">'+fin_indispod_bie_annee+' à '+fin_indispod_bie+'</span><br>'+
        '</div>';
        //   formater la date 

             let pdm_bie=formatDate(bie['pdm_bie'],'formath').heure;
             pdm_bie=pdm_bie;
             let fin_indispot_bie=formatDate(bie['fin_indispot_bie'],'formath').heure;
             fin_indispot_bie=fin_indispot_bie;
             

     element+='<div  class="m-auto col-11 col-md-5 bg-light my-2 p-1">'+
             '<span>Prémier contact avec pdm:</span>'+ 
             '<span class="mx-2">'+pdm_bie+'</span><br>'+
             '<span>Nombre de renvois sur défaut:</span>'+ 
             '<span class="mx-2">'+bie['nbrenvoi_defaut'] +'</span><br>'+
             "<span>fin indispot bie:</span>"+ 
             '<span class="mx-2">'+fin_indispot_bie+'</span><br>'+
        '</div>'+

        '<div  class="m-auto col-11 col-md-5 bg-light my-2 p-1">'+
             '<span>Dispatcheur 1 :</span>'+ 
             '<span>'+bie['dsp1']+'</span><br>'+
             '<span>Dispatcheur 2 :</span>'+ 
             '<span>'+bie['dsp2']+'</span><br>'+
        '</div>'+

        '<div class="m-auto col-11 col-md-11 bg-light my-2 p-1">'+
                '<span>Lieu de defaut et Rex:</span>'+  
                '<p>'+bie['Lieu_def_rex']+'</p>'+
        '</div>'+
   '</div>';
    critere.innerHTML=element;
    criter_b_detail.innerHTML=critere_b_contenu;

}

window.addEventListener("load",()=>{
    getCriterB();
})

</script>
</body>
</html>