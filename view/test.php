<!DOCTYPE html>  
<html lang="fr">  
<head>  
  <title>Exemple</title>  
  <meta charset="utf-8">  
  <meta name="viewport" content="width=device-width, initial-scale=1">  
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">  
    
</head>  
<body>  
  
<div class="container">  
  <h2>Onglets dynamiques</h2>  
  <ul class="nav nav-tabs">  
    <li class="active"><a data-toggle="tab" href="#home">Accueil</a></li>  
    <li><a data-toggle="tab" href="#menu1">Menu 1</a></li>  
    <li><a data-toggle="tab" href="#menu2">Menu 2</a></li>  
    <li><a data-toggle="tab" href="#menu3">Menu 3</a></li>  
  </ul>  
  
  <div class="tab-content">  
    <div id="home" class="tab-pane fade in active">  
      <h3>HOME</h3>  
      <p>Un langage de balisage est un langage de programmation utilisé pour rendre le texte plus
            interactif et dynamique. Il peut transformer un texte en images, tableaux, liens, etc.</p>  
    </div>  
    <div id="menu1" class="tab-pane fade">  
      <h3>Menu 1</h3>  
      <p>Java est un langage de programmation de haut niveau, robuste, sécurisé et orienté objet.</p>  
    </div>  
    <div id="menu2" class="tab-pane fade">  
      <h3>Menu 2</h3>  
      <p>SQL est juste un langage de requête, ce n'est pas une base de données. Pour effectuer des requêtes SQL,
      vous devez installer n'importe quelle base de données, par exemple Oracle, MySQL, MongoDB, PostGre SQL, SQL Server, DB2, etc.</p>  
    </div>  
    <div id="menu3" class="tab-pane fade">  
      <h3>Menu 3</h3>  
      <p>Le langage C est développé pour créer des applications système qui dirigent
       interagit avec les périphériques matériels tels que les pilotes, les noyaux, etc.</p>  
    </div>  
  </div>  
</div>  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>  
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
</body>  
</html>