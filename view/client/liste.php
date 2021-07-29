<?php  ob_start(); $titre="Liste client";?>
  <h3 class="text-center py-2 my-3">Liste des clients</h3>
   <table  class='table t'>
          <thead>
            <tr>
              <th class='text-center'>Libelle</th>
              <th class='text-center'>Nombre de client</th>
              <th class='text-center'>ACTION</th>
            </tr>
        </thead>
        <body>
        <?php  foreach($res as $value){ ?>
              <tr>
                  <td class='text-center'><?= $value['Lib_transf'] ?></td>
                  <td class='text-center col-3'> <?=$value['nb_clients']?></td>
                  <td class='text-center'> 
                   <a class='btn btn-info' href="index.php?table=client&action=modifier&colonne=Id_transf&id=<?=$value['Id_transf']?>">Modifier</a>
                   <a class='btn btn-danger' href="index.php?action=delete&table=client&colonne=Id_transf&id=<?=$value['Id_transf']?>" onclick=" if(!confirm('confirmez la suppression')){return false}">supprimer</a>
                  </td>
             </tr>
       <?php } ?>

    </body></table>;

<?php $container= ob_get_clean(); ?>



