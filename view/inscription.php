<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <title>Inscription</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="../ressources/css/generalCss.css">
    <link rel="stylesheet" type="text/css" href="../ressources/css/inscription.css">
    <link rel="apple-touch-icon" sizes="180x180" href="../apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="../favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="../favicon-16x16.png">
	<link rel="manifest" href="../site.webmanifest">
	<link rel="mask-icon" href="../safari-pinned-tab.svg" color="#5bbad5">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="theme-color" content="#ffffff">
</head>

<body>
    <div id="divForm" class="container">
        <div class="row text-center">
            <h1> Inscription </h1>

            <form id='form' method="post" action=".php" onsubmit="return valideFormulaire(this)">

                <label>Adresse mail</label>
                <div class="form-group centered">
                    <div class="col-xs-6">
                        <input type="email" name='mail'>
                    </div>
                </div>

                <label>Pseudo</label>
                <div class="form-group centered">
                    <div class="col-xs-6">
                        <input type="text" name='pseudo'>
                    </div>
                </div>

                <p class="erreurs" id="erreurs"></p>
                <label>Mot de passe</label>
                <div class="form-group centered">
                    <div class="col-xs-6">
                        <input type="password" name="motdepasse" placeholder="Saisissez le mot de passe" id="motdepasse" onkeyup="motDePasseConforme(this.form)">
                    </div>
                </div>
                <label>Confirmation du mot de passe</label>
                <div class="form-group centered">
                    <div class="col-xs-6">
                        <input type="password" name="motdepasse2" placeholder="Confirmez le mot de passe" id="motdepasse2" onblur="motDePasseCorrespondant(this.form)">
                    </div>
                </div>
                <div class="form-group centered"> <input type="image" src="../ressources/images/mdp.png" id="masque" title="Masquer/demasquer le mot de passe pour vérifier" onclick="affichageMotDePasse();return false;"> </div>



                <p id="warning"></p>
                <br>
                <div class="row">
                    <input type="checkbox" id="accept" name="accept">
                    <label for="accept">J'accepte les conditions générales</label>
                </div>
                <br>
                <div class="form-group centered">
                    <div class="col-xs-6">
                        <input id="inscription" type="submit" value="S'inscrire >">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <footer></footer>
    <script type="text/javascript" src="../ressources/js/inscription.js">
    </script>
</body>

</html>