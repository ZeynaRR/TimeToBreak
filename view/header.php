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

            <?php if(isset($_SESSION['id'])) { ?>
                <img class="logoDisconnection" src="../ressources/images/logoDisconnection.png" alt="logoHome"/>
                <a class="disconnection" href="?action=disconnect" style="text-decoration: none">Déconnexion</a>
            <?php }
            else {
                if($_GET['action'] == 'inscription') { ?>
                    <img class="logoInscription-Connexion" src="../ressources/images/profilLogo.png" alt="logoInscription"/>
                    <a class="inscription-connexion" href="?action=connection" style="text-decoration: none">Connexion</a>
                <?php }
                else if ($_GET['action'] == 'connection') { ?>
                    <img class="logoInscription-Connexion" src="../ressources/images/profilLogo.png" alt="logoInscription"/>
                    <a class="inscription-connexion" href="?action=inscription" style="text-decoration: none">Inscription</a>
                <?php } ?>
            <?php } ?>
        </div>
    </header>
</body>
</html>