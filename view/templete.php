<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/css/bootstrap.min.css">
    <title><?= $titre ?></title>
    <style>

       *{
          font-family:sans-serif;
       }
        #clients{
             height:80px;
             overflow-y:scroll;
        }
        #clients label,#clients input{
             padding:3px;
             display:inline-block;
             cursor: pointer;
        }
        #header{
             position:relative;
        }
        #container{
            position:relative;
            top:20px;
        }
        form{
             margin-top:50px;
        }
        ul{
             list-style-type:none;
        }
        .item{
             text-decoration:none;
             transition:all 0.5s; 
             border-radius:10px;  
             font-size:1.2em;
             
         }
         .item:hover{
           background-color:rgba(0, 0, 0, 0.5);
        }
        #footer{
              position:relative;
              top:100px;
        }
        #img{
             position:relative;
             width:100%;
             left:100%;
             height:100%;
             height:140px;
        }
        #img img{
             position:relative;
             object-fit:cover;
        }
    </style>
    
</head>
<body>
      <heade class="w-100 header">

           <nav class="py-3 mb-3 bg-info d-flex justify-content-evently">
                <div class="col-md-3 col-12 col-md-12 text-center">
                    <a class="p-1 text-light item " href="index.php?action=gets&table=bie">Accueil</a>
                    <a class="p-1 text-light item" href="index.php?action=form&table=critere">Ajouter bie</a> |
                    <a class="p-1 text-light item" href="index.php?action=form&table=client">Ajouter client</a>
                    <a class="p-1 text-light item" href="index.php?action=gets&table=client">Liste client</a> 
              
               </div>
           </nav>
      </header>

      <section>
           <div class="image">
               <img src="view/images/edm.png" alt="...">
           </div>
           <div id="container" class="col-11 m-auto"> 
             <?= $container ?>
           </div>
           <footer id="footer">
                <div class="mt-3 bg-light">
                     <p class="py-4  text-ligth text-center"> &copy 2021-Electricit?? de Mayotte-Toute reproduction interdite</p>
                </div>
           </footer>
          <!-- Script en local -->
          <!-- <script src="view/javascript/critere.js"></script> -->
          <!-- <script src="view/javascript/client.js"></script> -->
           <!-- script et css pour le plugin query-datable-->
           <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"></script>
           <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
           <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>
           <script> 
              $(document).ready(function(){
                $('#table_id').DataTable();  
              })
              
           </script>
</body>
</html>