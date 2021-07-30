<?php  ob_start(); $titre="Liste bie";
  $message="";
  $message=isset($_GET['message'])? htmlspecialchars($_GET['message']):"";
?>
  
  <h3 class="py-2 my-2 text-center ">LISTE BIE</h3>

  <p class="py-2 my-2 text-center text-success"><?= $message ?></p>
  
   <table  id="table_id" class='table'>
          <thead>
            <tr>
              <th class='text-center'>Détail</th>
              <th class='text-center'>CRITERE B</th>
              <th class='text-center'>NUMERO BIE</th>
              <th class='text-center'>ACTION</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($res as $value){ ?>
            <tr>
                  <td class='text-center'>
                    <a class='btn btn-secondary' href="/index.php?table=bie&action=get&id=<?=$value['id_bie']?>">Détail</a>
                  </td>
                  <td class='text-center'>
                      <?=$value['CritereB']?>
                  </td>
                  <td class='text-center'><?=$value['Num_bie']?></td>
                  <td class='text-center'> 
                   <a class='btn btn-secondary' href="index.php?action=delete&table=bie&id=<?=$value['id_bie']?>" onclick=" if(!confirm('confirmez la suppression')){return false}">supprimer</a>
                </td>
            </tr>
       <?php } ?>
    </tbody>
   </table>
<?php $container= ob_get_clean(); ?>



