 <!DOCTYPE html>
 <html>

 <head>
     <meta charset="utf-8" />
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
     <title> Contact </title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
     <link rel="stylesheet" type="text/css" href="css/generalCss.css">
     <link rel="stylesheet" type="text/css" href="css/mentionsContact.css">
     <link rel="apple-touch-icon" sizes="180x180" href="../apple-touch-icon.png">
     <link rel="icon" type="image/png" sizes="32x32" href="../favicon-32x32.png">
     <link rel="icon" type="image/png" sizes="16x16" href="../favicon-16x16.png">
     <link rel="manifest" href="../site.webmanifest">
     <link rel="mask-icon" href="../safari-pinned-tab.svg" color="#5bbad5">
     <meta name="msapplication-TileColor" content="#da532c">
     <meta name="theme-color" content="#ffffff">
	<script src="https://code.jquery.com/jquery-3.1.1.js"></script>

 </head>

 <body>
 <?php   include("header.php");
    ?>
         <h1> Contact </h1>

         <div class="container content">
             <div id="texte" class="row text-center">
                 <p id=" entete">
                     Vous avez un souci, contacter nous.
                 </p>

                 <form method="post"  class="form-inline">

                     <label for="identifiant"> Identifiant</label>
                     <br>
                     <input type="text" id="identifiant" name="identifiant" required> <br> <br>

                     <label for="mailUtilisateur"> Adresse mail</label>
                     <br>
                     <input type="email" name="mailUtilisateur" id="mailUtilisateur" size="35" required> <br><br>
                     <label for=" objet"> Objet de la demande </label>
                     <br>
                     <select name="objet" id="objet">
                         <option value="Profil"> Probl??me de profil</option>
                         <option value="Jeu"> Probl??me li?? au jeu en ligne </option>
                         <option value="Salon"> Probl??me li?? au(x) salon(s) de discussion </option>
                         <option value=" Autre"> Autres</option>

                     </select>
                     <br> <br> <br>

                     <label for=" Demande "> Votre demande </label> <br>
                     <textarea name="Demande" id="Demande"> </textarea>
                     <br> <br>

                     <button type="submit" name=" Envoyer" id="boutonEnvoi"> Envoyer </button>

                     <br> <br> Le d??lai de prise en charge est de 48h.


                 </form>
             </div>
         </div>
     <?php include("footer.php");?>
    <script type="text/javascript" src="js/contact.js">
    </script>
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
 </body>
 </html>