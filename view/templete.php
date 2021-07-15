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
      <header>
           <nav>
                 <a href="/">Accueil</a>
                 <a href="form">Ajoute bie</a>
                 <a href="gets">liste bie</a>
           </nav>
      </header>
      <main class="d-flex">
            <section class="w-100 m-auto" >
                <?= $container ?>
            </section>    
      </main>
</body>
</html>