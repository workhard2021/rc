<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"  crossorigin="anonymous"></script>
    <title><?= $title ?></title>
</head>
<body>
      <heade class="w-100">

           <nav class="p-2">

                 <a class="p-1" href="/">Accueil</a>
                 <a class="p-1" href="/index.php?action=form">Ajoute bie</a>
                 <a class="p-1" href="/index.php?action=formClient">ajoute client</a>
                 <a class="p-1" href="/index.php?action=form-utilisateur">ajoute utilisateur</a>
           </nav>
      </header>
      <main class="d-flex">
            <section class="w-100 m-auto" >
                <?= $container ?>
            </section>    
      </main>
</body>
</html>