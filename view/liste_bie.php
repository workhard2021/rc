
<?php ob_start(); $title="liste des bie"?>

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
   
   <?php foreach($donnees as $value){ ?>
       <tr>
                <td class="text-center"><?= $value["id_bie"] ?></td>
                <td class="text-center">
                  <a class="btn btn-warning col-3" href="/index.php?action=get&id=<?= $value["id_bie"] ?>"><?= $value["CritereB"] ?></a>
                </td>
                <td class='text-center'><?= $value["fin_indispot_bie"] ?></td>
                <td class='text-center'> 
                  <a  class='btn btn-info' href='index.php?action=update&id=<?= $value["id_bie"]?>'>modifier</a>
                  <a  class="btn btn-danger" href='index.php?action=delete&id=<?= $value["id_bie"]?>'> suprimer</a>
                </td>
        </tr>

  <?php } ?>

 </body>
</table>

<?php $container=ob_get_clean() ?>

