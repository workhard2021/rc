<?php $titre="Liste bie"; ob_start() ?>
   <table  class='table'>
          <thead>
            <tr>
              <th class='text-center'>ID#</th>
              <th class='text-center'>CRITERE B</th>
              <th class='text-center'>Fin disp bie</th>
              <th class='text-center'>ACTION</th>
            </tr>
        </thead>
        <body>
       <?php foreach($res as $value){ ?>
            <tr>
                  <td class='text-center'><?= $value['id_bie'] ?></td>
                  <td class='text-center'>
                     <a class='btn btn-warning w-100' href="/index.php?action=get_bie&id=<?=$value['id_bie']?>"> <?=$value['CritereB']?></a>
                  </td>
                  <td class='text-center'><?=$value['fin_indispot_bie']?></td>
                  <td class='text-center'> 
                   <a class='btn btn-danger' href="index.php?action=delete_bie&table=liste_bie&colonne=id_bie&id=<?=$value['id_bie']?>">suprimer</a>
                </td>
            </tr>
       <?php } ?>

    </body></table>;

<?php $container= ob_get_clean(); ?>



