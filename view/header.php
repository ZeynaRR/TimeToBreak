<!DOCTYPE html>

<html lang="fr">
<head>
    <meta charset="utf-8">
    <link href="../ressources/css/generalCss.css" rel="stylesheet">
</head>

<body>
    <header>
        <div class="header">
            <img class="logoTTB" src="../ressources/images/logoTTB2.png" alt="logoTTB"/>

            <a href="?action=tdb"><img class="logoHome" src="../ressources/images/logoHome2.png" alt="logoHome"/></a>

            <?php if(isset($_SESSION['mail'])) { ?>
                <img class="logoDisconnection" src="../ressources/images/logoDisconnection.png" alt="logoHome"/>
                <a class="disconnection" href="?action=connection" style="text-decoration: none">Déconnexion</a>
            <?php }
            else {
                if(isset($_COOKIE['page']) && $_COOKIE['page'] == 'inscription') { ?>
                    <img class="logoInscription-Connexion" src="../ressources/images/profilLogo.png" alt="logoInscription"/>
                    <a class="inscription-connexion" href="?action=connection" style="text-decoration: none">Connexion</a>
                <?php }
                else if (isset($_COOKIE['page']) && $_COOKIE['page'] == 'connexion') { ?>
                    <img class="logoInscription-Connexion" src="../ressources/images/profilLogo.png" alt="logoInscription"/>
                    <a class="inscription-connexion" href="../view/inscription.php" style="text-decoration: none">Inscription</a>
                <?php } ?>
            <?php } ?>
        </div>
    </header>
</body>
</html>