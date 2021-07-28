const critere=document.getElementById("critere");

async  function getCriterB(){
    const id=location.search.split("=")[1];
    const url=`http://localhost:8888/index.php?action=get_bie&table=liste_bie&id=${id}`;
    let data= await fetch(url,{method:'get',headers:"application/json"});
    if(data.status !== 200) alert("une erreur");
    data= await data.json(); 
    let element='<h2 class="text-center text-info">Information de critère B</h2>'+

    '<h3 class="w-100 text-center"> CRITERE B <span class="text-danger">'+data.CritereB+'</span></h3>'+
   
    '<div class="d-flex flex-wrap align-items-flex-start col-11 m-auto justify-content-evently">'+
      
      '<div class="w-100 text-center">'+
          '<span class="m-auto p-1"><b>N° </b>'+data['Num_bie']+'</span><br>'+
          '<span class="m-auto p-1"><b>Date:</b>'+data['Date_Bie']+'</span>'+
      '</div>'+ 
      '<div class="m-auto col-11 col-md-5 bg-light my-2 p-1">'+
             '<span>Origine:<span>'+  
             '<span class="mx-2">'+data['Lib_Origine']+'</span><br>'+
             '<span>Nature:<span>'+ 
             '<span class="mx-2">'+data['Lib_nature']+'</span><br>'+
             '<span>Cause:<span>'+ 
             '<span class="mx-2">'+data['Lib_cause']+'</span><br>'+
             '<span>Type defaut:<span>'+  
             '<span class="mx-2">'+data['Lib_type']+'</span><br>'+
        '</div>'+

        '<div  class="m-auto col-11 col-md-5 bg-light my-2 p-1">'+
             '<span>Siege:<span>'+  
             '<span class="mx-2">'+data['Lib_siege']+'</span><br>'+
             '<span>Post source:<span>'+  
             '<span class="mx-2">'+data['libelle_poste']+'</span><br>'+
             '<span>Depart:<span>'+  
             '<span class="mx-2">'+data['Lib_depart']+'</span><br>'+
             '<span>Nombre clients:<span>'+  
             '<span class="mx-2">'+133+'</span><br>'+
        '</div>'+

        '<div  class="m-auto col-11 col-md-5 bg-light my-2 p-1">'+
             '<span>TypeJ :<span>'+  
             '<span class="mx-2">'+data['Lib_typej']+'</span><br>'+
             '<span>TypeH:<span>'+ 
             '<span class="mx-2">'+data['Lib_typeh'] +'</span><br>'+
             '<span>Nombre de omt man:<span>'+ 
             '<span class="mx-2">'+data['nb_omt_man'] +'</span><br>'+
             '<span>Nombre de omt def:<span>'+ 
             '<span class="mx-2">'+data['nb_omt_def'] +'</span><br>'+
        '</div>'+

        '<div  class="m-auto col-11 col-md-5 bg-light my-2 p-1">'+
             '<span> manoeuvre dernier omt:<span>'+  
             '<span class="mx-2">'+data['mderomt_bie']+'</span><br>'+
             '<span>Localisation du défaut:<span>'+ 
             '<span class="mx-2">'+data['locdef_bie'] +'</span><br>'+
             '<span>Fin de coupure:<span>'+ 
             '<span class="mx-2">'+data['findc_bie'] +'</span><br>'+
             "<span>Fin d'indisponiblité de l'ouvrage en défaut:<span>"+ 
             '<span class="mx-2">'+data['fin_indispod_bie'] +'</span><br>'+
        '</div>'+

        '<div  class="m-auto col-11 col-md-5 bg-light my-2 p-1">'+
             '<span>Prémier contact avec pdm:<span>'+ 
             '<span class="mx-2">'+data['pdm_bie'] +'</span><br>'+
             '<span>Nombre de renvois sur défaut:<span>'+ 
             '<span class="mx-2">'+data['nbrenvoi_defaut'] +'</span><br>'+
             "<span>fin indispot bie:<span>"+ 
             '<span class="mx-2">'+data['fin_indispot_bie'] +'</span><br>'+
        '</div>'+

        '<div  class="m-auto col-11 col-md-5 bg-light my-2 p-1">'+
             '<span>Dispatcheur 1 :<span>'+ 
             '<span>'+data['dsp1']+'</span><br>'+
             '<span>Dispatcheur 2 :<span>'+ 
             '<span>'+data['dsp2']+'</span><br>'+
        '</div>'+

        '<div class="m-auto col-11 col-md-11 bg-light my-2 p-1">'+
                '<span>Lieu de defaut et Rex:<span>'+  
                '<p>'+data['Lieu_def_rex']+'</p>'+
        '</div>'+
        '<div class="m-auto col-11 col-md-11 bg-light my-2 p-1 text-center">'+
                '<a href="critere_b.php"> Imprimer </a>'+
        '</div>'+
        

   '</div>';
    critere.innerHTML=element;
  
}

window.addEventListener("load",()=>{
    getCriterB();
})




