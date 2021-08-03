<?php ob_start();?>

 <!DOCTYPE html>
   <html lang="en">
   <head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1?>">
     <title>Document</title>
     <style>
          
            *{
                 font-family:sans-serif;
            }
           .titre{
                 position:relative;
                 text-align:center;
                 width:100%;
            }
            .critere span{
                 color:red;
            }
            .titre:nth-child(1){
               color:rgb(137, 207, 240);
            }
             img{
                 width:120px;
             }
            #rapport td{
                text-align:left;
                padding-left:3px;
                background-color:whitesmoke;
                position: relative;
                width:50%;
                padding:3px;
                background-color:white;
                z-index:9;
            }
     
            #rapport .mx{
                 font-weight:bold;
                 line-height:1.5em;
            }
           table{
                width:90%;
                position:relative;
                margin:auto;
           }
           table,tr,td,th{
                border:1px solid black;
                border-collapse:collapse;
                text-align:center;
                font-size:1em;  
           }
           table th{
                background-color:rgb(137, 207, 240);
                padding:4px auto;
                font-size:1.1em;
           }
           #detail{
                 margin:20px auto;
           }
           #detail tr:nth-child(even) {
                background:#B0C4DE;
               }
           #detail tr:nth-child(odd) {
                background: #FFF
            }
           table .total td{
                background-color:rgba(0,0,0,0.5);
                color:white;
           }
           #info_bie,#info_bie tr,#info_bie td{
                 border:1px solid white;
           }
     </style>
  </head>
  <body>
   <?php $somme_client=0;
   $somme_critere_b=0; 
   foreach($res2 as $value){ 
      $somme_client+=$value["nbcli_poste"];
      $somme_critere_b+=$value["critere_B"];
    } ?>
     
    <h2 class="titre">Certificat de critère B</h2>
    <h3 class="titre critere"> CRITERE B <span><?=$res["CritereB"]?></span></h3>
  <table id="info_bie">
     <tbody> 
       <tr>
         <td><img class="item-logo" src="http://localhost:8888/view/images/edm.png" alt="..."/></td>
         <td> <b>N° </b><?=$res["Num_bie"]?></td>
         <td><b>Date: </b><?=$res["Heure_Bie"]?></td>
       <tr>
   </tbody>
 </table>

   <table id="rapport">
      
      <tbody>
         <tr>

          <td>
            <span class="mx">Origine:</span>  
            <span><?=$res["Lib_Origine"]?></span><br/>
            <span class="mx">Nature:</span> 
            <span><?=$res["Lib_nature"]?></span><br/>
            <span class="mx">Cause:</span> 
            <span><?=$res["Lib_cause"]?></span><br/>
            <span class="mx">Type defaut:</span>  
            <span><?=$res["Lib_type"]?></span><br/>
          </td>
          <td>
            <span class="mx">Siege:</span>  
            <span><?=$res["Lib_siege"]?></span><br/>
            <span class="mx">Post source:</span>  
            <span><?=$res["libelle_poste"]?></span><br/>
            <span class="mx">Depart:</span>  
            <span><?=$res["Lib_depart"]?></span><br/>
            <span class="mx">Nombre clients:</span>  
            <span><?= $somme_client?></span><br/>
         </td>
     </tr>
     <tr>

          <td>
            <span class="mx">TypeJ :</span>  
            <span><?=$res["Lib_typej"]?></span><br/>
            <span class="mx">TypeH:</span> 
            <span><?=$res["Lib_typeh"]?></span><br/>
            <span class="mx">Nombre de omt man:</span> 
            <span><?=$res["nb_omt_man"]?></span><br/>
            <span class="mx">Nombre de omt def:</span> 
            <span><?=$res["nb_omt_def"]?></span><br/>
          </td>     
          <td>
            <span class="mx"> Manoeuvre dernier omt:</span>  
            <span><?= date("H:i:s", strtotime($res["mderomt_bie"]))?></span><br/>
            <span class="mx">Localisation du défaut:</span> 
            <span><?= date("H:i:s", strtotime($res["locdef_bie"]))?></span><br/>
            <span class="mx">Fin de coupure:</span> 
            <span><?= date("H:i:s", strtotime($res["findc_bie"]))?></span><br/>
            <span class="mx">Fin d"indisponiblité de l"ouvrage en défaut:</span> 
            <span><?= date("H:i:s", strtotime($res["fin_indispod_bie"]))?></span><br/>
          </td>

     </tr>
     <tr>
          <td>
            <span class="mx">Prémier contact avec pdm:</span>  
            <span><?=$res["pdm_bie"]?></span><br/>
            <span class="mx">Nombre de renvois sur défaut:</span> 
            <span><?=$res["nbrenvoi_defaut"]?></span><br/>
        </td>
        <td>
            <span class="mx">Dispatcheur 1 :</span> 
            <span ><?=$res["dsp1"]?></span><br/>
            <span class="mx">Dispatcheur 2 :</span> 
            <span><?=$res["dsp2"]?></span><br/>
        </td>
    </tr>
     <tr>
           <td colspan="2">
               <span class="mx">Lieu de defaut et Rex:</span>  
               <p><?=$res["Lieu_def_rex"]?></p>
           </td>
    </tr>
  </tbody>

</table>
<table id="detail">
 <thead>
   <tr>
     <th>
          <span>Date</span>
     </th>
     <th>
          <span>Heure</span>
    </th>
     <th>
          <span>Poste réalimentés</span>
     </th>
     <th>
         <span>T</span>
     </th>
     <th >
          <span>Nombre de client</span>
     </th>
     <th>
       <span>Critère B(Ms)</span>
     </th>
  </tr>
 </thead>
 <tbody>
<?php foreach($res2 as $value){?>

     <tr class="text-center">
       <td><span><?= date("d/m/Y", strtotime($value["date_realim"]))?></span></td>
       <td> <span><?= date("H:i:s", strtotime($value["date_realim"]))?></span></td>
       <td ><span><?= $value["Liste_postes"]?></span></td>
       <td><span>T</span></td>
       <td><span><?= $value["nbcli_poste"]?></span></td>
       <td><span><?= $value["critere_B"]?></span></td> 
    </tr> 

<?php } ?>

     <tr class="total">
               <td colSpan="3"><b>Total</b><td>
               <td><span><b><?= $somme_client ?></b></span></td>
               <td><span><b><?= $somme_critere_b ?></b></span></td>
     </tr>
     </tbody>
     </table>   
</body>
</html>

 <?php $container= ob_get_clean();?>
