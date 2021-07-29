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
        #header{
             position:relative;
        }
        #container{
            position:relative;
        }
    </style>
</head>
<body>
      <heade class="w-100" id="header">
           <nav class="p-2  bg-info p-3 d-flex w-100 ">
                <div class="col-3">
                  <a class="p-1 text-light mx-2" href="http://localhost:8888/index.php?action=gets&table=bie">Accueil</a>
                   <a class="p-1 text-light mx-2" href="http://localhost:8888/index.php?action=form&table=critere">Ajouter bie</a>
                </div>
                <div class="col-3">
                   <a class="p-1 text-light mx-2" href="http://localhost:8888/index.php?action=form&table=client">Ajouter client</a>
                    <a class="p-1 text-light mx-2" href="http://localhost:8888/index.php?action=gets&table=client">Liste client</a> 
                </div>
                 
           </nav>
      </header>
      <div id="container"> 
         <?= $container ?>
      </div>
    
</script>
</body>
</html>