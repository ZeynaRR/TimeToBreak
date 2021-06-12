<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/generalCss.css">
    <link rel="stylesheet" type="text/css" href="css/inscription.css">
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
    <?php include("header.php"); ?>
    <h1> Inscription </h1>
    <div id="divForm" class="container-sm">
        <div class="row text-center">
            <form id='form' method="post" onsubmit="return valideFormulaire(this)">
                <label>Adresse mail</label>
                <div class="form-group centered">
                    <div class="col-sm-6">
                        <input type="email" name='mail' id="mail" required>
                    </div>
                </div>

                <label>Pseudo</label>
                <div class="form-group centered">
                    <div class="col-sm-6">
                        <input type="text" name='pseudo' id="pseudo" required>
                    </div>
                </div>

                <p class="erreurs" id="erreurs"></p>
                <label>Mot de passe</label>
                <div class="form-group centered">
                    <div class="col-sm-6">
                        <input type="password" name="motdepasse" placeholder="Saisissez le mot de passe" id="motdepasse" onkeyup="motDePasseConforme(this.form)" required>
                    </div>
                </div>
                <label>Confirmation du mot de passe</label>
                <div class="form-group centered">
                    <div class="col-sm-6">
                        <input type="password" name="motdepasse2" placeholder="Confirmez le mot de passe" id="motdepasse2" onblur="motDePasseCorrespondant(this.form)" required>
                    </div>
                </div>
                <div class="form-group centered"> <input type="image" src="images/mdp.png" id="masque" title="Masquer/demasquer le mot de passe pour vérifier" onclick="affichageMotDePasse();return false;"> </div>



                <p id="warning"></p>
                <br>
                <div class="row">
                    <input type="checkbox" id="accept" name="accept">
                    <label for="accept">J'accepte les conditions générales</label>
                </div>
                <div class="form-group centered">
                    <div class="col-sm-6">
                        <input id="inscription" type="submit" value="S'inscrire >">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <footer></footer>
    <script type="text/javascript" src="js/inscription.js">
    </script>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>