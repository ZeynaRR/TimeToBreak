<!DOCTYPE html>

<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" />
    <title>Connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <link href="../ressources/css/generalCss.css" rel="stylesheet">
    <link href="../ressources/css/connexion.css" rel="stylesheet">
    <link rel="apple-touch-icon" sizes="180x180" href="../apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../favicon-16x16.png">
    <link rel="manifest" href="../site.webmanifest">
    <link rel="mask-icon" href="../safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
</head>

<body>
    <?php if (!isset($_SESSION['id'])) {
        include("header.php");
    ?>
        <div id="divForm" class="container-sm">
            <div class="row text-center">
                <h1>Connexion</h1>
                <div class="connexion">
                    <form action="?action=connect" method="post">
                        <label for="login">Adresse mail : </label><br><br>
                        <input id="login" type="email" name="login" /><br><br><br><br>
                        <label for="password">Mot de passe : </label><br><br>
                        <div id="passwordZone">
                            <input type="password" name="password" id="password" />
                        </div>
                        <input name="passwordView" type="image" src="../ressources/images/mdp.png" id="masque" title="Masquer/démasquer le mot de passe pour vérifier" onclick="displayPassword(); return false;">
                       ><br>
                        <div class="errors" id="erreurs"></div>
                        <?php
                        if (isset($error) && !empty($error)) {
                        ?>
                            <div class="errorAuthentication">
                                <?php echo $error; ?>
                            </div>
                        <?php } ?>
                        <input id="connexion" type="submit" value="Se connecter  >" onclick="return areAllFieldsCompleted()" />
                    </form>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="../ressources/js/connexion.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <?php } else {
        header("Location: ?action=tdb");
    }
    ?>

</body>

</html>