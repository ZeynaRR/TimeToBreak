<!DOCTYPE html>

<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" />
    <title>Suggestions de jeux</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <link href="../ressources/css/generalCss.css" rel="stylesheet">
    <link href="../ressources/css/gameInterface.css" rel="stylesheet">
    <link rel="apple-touch-icon" sizes="180x180" href="../apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../favicon-16x16.png">
    <link rel="manifest" href="../site.webmanifest">
    <link rel="mask-icon" href="../safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
</head>

<body>
<?php if ($status=="1" && $isTime) {
    include("header.php"); ?>
    <h1>Suggestions de jeux pour vous ! </h1><br>
    <div class="gamesList">
        <?php
        while ($game = $gamesList->fetch()) { ?>
            <div class="game">
                <h3><?php echo $game['nameOfTheGame']?></h3>
                <img src="<?php echo $game['imageGame']?>" alt="name of the game" class="gameImage"/>
                <p class="theme">Thème(s) : <?php echo $game['tags'] ?></p>
                <p class="gameComment">
                    <?php echo $game['contentOfTheGame']?>
                </p>
                <a class="play" href="<?php echo $game['linkToTheGame']?>" style="text-decoration: none"><button class="play">Jouer !</button></a>
            </div>
        <?php } ?>
    </div>
<?php }
    else {
        header("Location: ?action=tdb");
    }?>
</body>
</html>