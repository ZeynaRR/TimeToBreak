<!DOCTYPE html>

<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Connexion</title>
    <link href="../ressources/css/generalCss.css" rel="stylesheet">
    <link href="../ressources/css/connexion.css" rel="stylesheet">
</head>

<body>
    <!--<header></header>-->
    <h1>Connexion</h1>
    <div class="connexion">
        <form action="" method="post">
            <label for="login">Adresse mail : </label><br><br>
            <input id="login" type="email" name="login"/><br><br><br><br>
            <label for="password">Mot de passe : </label><br><br>
            <div id="passwordZone">
                <input type="password" name="password" id="motdepasse"/>
                <input type="image" src="../ressources/images/mdp.png" id="masque" title="Masquer/demasquer le mot de passe pour vérifier" onclick="displayPassword();">
            </div><br><br><br><br>

            <input id="connexion" type="submit" value="Se connecter  >" onclick="areAllFieldsCompleted()"/>
        </form>
    </div>
    <script type="text/javascript" src="../ressources/js/connexion.js"></script>
</body>
</html>
