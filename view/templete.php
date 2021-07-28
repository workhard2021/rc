<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"  crossorigin="anonymous"></script>
    <title><?= $titre ?></title>
    <style>
        #clients{
             height:70px;
             overflow-y:scroll;
        }
    </style>
</head>
<body>
      <heade class="w-100">
           <nav class="p-2">
                 <a class="p-1" href="http://localhost:8888/index.php?action=gets_bie">Accueil</a>
                 <a class="p-1" href="http://localhost:8888/index.php?action=form_critere_b">Ajoute bie</a>
                 <a class="p-1" href="http://localhost:8888/index.php?action=ajoute_client/">ajoute client</a>
                 <a class="p-1" href="http://localhost:8888/index.php?action=ajouter_user/user.php">ajoute utilisateur</a>
           </nav>
      </header>
      <div id="container"> 
         <?= $container ?>
      </div>
</script>
</body>
</html>