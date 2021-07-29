<?php  ob_start(); $titre="Liste bie";
  $message="sdsdsd";
  $message=isset($_GET['message'])? htmlspecialchars($_GET['message']):"";
?>
  
  <h3 class="py-2 my-2 text-center ">LISTE BIE</h3>
  <p class="py-2 my-2 text-center text-success"><?= $message ?></p>
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
                     <a class='btn btn-warning w-100' href="/index.php?table=bie&action=get&id=<?=$value['id_bie']?>"><?=$value['CritereB']?></a>
                  </td>
                  <td class='text-center'><?=$value['fin_indispot_bie']?></td>
                  <td class='text-center'> 
                   <a class='btn btn-danger' href="index.php?action=delete&table=bie&id=<?=$value['id_bie']?>">supprimer</a>
                </td>
            </tr>
       <?php } ?>

    </body></table>;

<?php $container= ob_get_clean(); ?>



