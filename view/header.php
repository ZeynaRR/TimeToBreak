<!DOCTYPE html>

<html lang="fr">

<head>
    <meta charset="utf-8">
    <link href="../ressources/css/generalCss.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-fluid">
                <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <img class="logoTTB" src="../ressources/images/logoTTB2.png" alt="logoTTB" />
                <div class="collapse navbar-collapse" id="navbarToggler">
                    <ul class="navbar-nav  mb-2 mb-lg-0 ">
                        <li class="nav-item">
                            <a href="?action=tdb" id="home" class="nav-link"><img class="logoHome" src="../ressources/images/logoHome2.png" alt="logo accueil de l'application" /> Accueil </a>
                        </li>
                        <li class="nav-item">
                            <?php if (isset($_SESSION['id'])) { ?>

                                <a class="disconnection nav-link" href="?action=disconnect" style="text-decoration: none"> <img class="logoDisconnection" src="../ressources/images/logoDisconnection.png" alt="logo déconnection de l'application" /> Me déconnecter</a>
                        </li>
                        <li class="nav-item">
                            <?php } else {
                                if ($_GET['action'] == 'inscription') { ?>
                                <a class="inscription-connexion nav-link" href="?action=connection" style="text-decoration: none"> <img class="logoInscription-Connexion" src="../ressources/images/profilLogo.png" alt="logo clicable connexion de l'application " /> Me connecter</a>
                        </li>
                        <li class="nav-item">
                        <?php } else if ($_GET['action'] == 'connection' || $_GET['action'] == 'connect') { ?>
                            <a class="inscription-connexion nav-link" href="?action=inscription" style="text-decoration: none"> <img class="logoInscription-Connexion" src="../ressources/images/profilLogo.png" alt="logo clicable inscription de l'application " /> M'inscrire</a>
                        </li>
                    <?php } ?>
                <?php } ?>
                    </ul>
                </div>
            </div>
    </header>
</body>

</html>