<?php  ob_start(); $titre="Liste client";?>
  <h3 class="text-center py-2 my-3">Liste des clients</h3>
   <table id="table_id"  class='table t'>
          <thead>
            <tr>
              <th class='text-center'>Libelle(nombre clients)</th>
              <th class='text-center'>Modifier</th>
              <th class='text-center'>Supprimer</th>
            </tr>
        </thead>
        <tbody>
        <?php  foreach($res as $value){ ?>
              <tr>
                  <td class='text-center'><?= $value['Lib_transf'] ."(".$value['nb_clients'].")" ?></td>
                  <td class='text-center col-3'>
                    <a class='btn btn-secondary' href="index.php?table=client&action=modifier&colonne=Id_transf&id=<?=$value['Id_transf']?>">Modifier</a>
                  </td>
                  <td class='text-center'> 
                   <a class='btn btn-secondary' href="index.php?action=delete&table=client&colonne=Id_transf&id=<?=$value['Id_transf']?>" onclick=" if(!confirm('confirmez la suppression')){return false}">Supprimer</a>
                  </td>
             </tr>
       <?php } ?>
    </tbody></table>

<?php $container= ob_get_clean(); ?>



