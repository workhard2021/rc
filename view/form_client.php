<?php $title="Ajoute bie"; ob_start() ?>

<h3 class="text-center text-dark">Ajouter un client</h3>

<form method="post" action="index.php?action=insertClient">

     <div class="d-flex m-3 py-2 align-items-flex-start justify-content-evenly   col-11 m-auto">
        
        <div class=" m-auto mt-0 col-2">
            <label for="Lib_transf">Libélle transformateur</label><br>
             <select id="Lib_transf" name="Lib_transf"  class="form-select">
                  <option value="A transf">A transf</option>
                  <option value="B transf">B transf</option>
                  <option value="C transf">C transf</option>
             </select>
        </div>

        <div class=" m-auto mt-0 col-2">

            <label for="id_commune">Commune </label><br>
             <select id="id_commune" name="id_commune"   class="form-select">
                  <option value="1">A commune </option>
                  <option value="2">B commune </option>
                  <option value="3">C commune </option>
             </select>
        </div>
       
         <div class=" m-auto mt-0 col-2">
            <label for="id_village">Post</label><br>
             <select id="id_village" name="id_village"   class="form-select">
                  <option value="1">A village </option>
                  <option value="2">B village </option>
                  <option value="3">C village </option>
             </select>
         </div>
     </div>
     <div class="d-flex m-3 py-2 align-items-flex-start justify-content-evenly   col-11 m-auto">

         <div class=" m-auto mt-0 col-2">
            <label for="id_posSce">Post source</label><br>
             <select id="id_posSce" name="id_posSce"   class="form-select">
                  <option value="1">A source </option>
                  <option value="2">B source </option>
                  <option value="3">C source </option>
             </select>
         </div>
         <div class=" m-auto mt-0 col-2">
            <label for="id_posSce">depart</label><br>
             <select id="id_posSce" name="id_posSce"  class="form-select">
                  <option value="1">A  depart </option>
                  <option value="2">B  depart </option>
                  <option value="3">C  depart </option>
             </select>
        </div>
        <div class=" m-auto mt-0 col-2">
            <label for="nb_clients">Nombre de client</label><br>
            <input type="number" name="nb_clients"/>
         </div>
    </div>

    <div class="my-3 p-5 col-11 m-auto">
         <button class="btn btn-info col-4 d-block m-auto">Enregister client</button>
    </div>
</form>



<?php $container=ob_get_clean() ?>