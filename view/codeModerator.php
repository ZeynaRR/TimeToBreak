<?php
    setcookie('page', 'inscription', time() + 365 * 24 * 3600, null, null, false, true);
?>
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
	<script src="https://code.jquery.com/jquery-3.1.1.js"></script>
</head>

<body>
    <?php include("header.php"); ?>
    <div id="divForm" class="container">
        <div class="row text-center">
            <h1> Code Moderator </h1>
            <form id='form' method="post" onsubmit="return valideFormulaire(this)">
                <label>Code Recu</label>
                <div class="form-group centered">
                    <div class="col-xs-6">
                        <input type="text" name='codeModerator' id="codeModerator" required>
                    </div>
                </div>
                <p id="warning"></p>
                <div class="form-group centered">
                    <div class="col-xs-6">
                        <input id="inscription" type="submit" value="Valider>">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <footer></footer>
    <script type="text/javascript" src="../ressources/js/codeModerator.js">
    </script>
</body>
</html>