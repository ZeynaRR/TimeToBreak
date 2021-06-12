<!DOCTYPE html>

<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" />
    <title>Suggestions de jeux</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
    <link href="css/generalCss.css" rel="stylesheet">
    <link href="css/gameInterface.css" rel="stylesheet">
    <link rel="apple-touch-icon" sizes="180x180" href="../apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../favicon-16x16.png">
    <link rel="manifest" href="../site.webmanifest">
    <link rel="mask-icon" href="../safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
</head>

<body>
    <?php if ($status == "1" && $isTime) {
        include("header.php"); ?>
        <h1>Suggestions de jeux pour vous ! </h1><br>
        <div class="gamesList container">
        <div class="row">
            <?php
            while ($game = $gamesList->fetch()) { ?>
                    <div class="game col-6 ">
                        <div class="text-center">
                            <h3><?php echo $game['nameOfTheGame'] ?></h3>
                            <div class="row">
                            <img src="<?php echo $game['imageGame'] ?>" alt="name of the game" class="gameImage" />
                            </div>
                            <p class="theme">Thème(s) : <?php echo $game['tags'] ?></p>
                            <p class="gameComment">
                                <?php echo $game['contentOfTheGame'] ?>
                            </p>
                            <a class="play" href="<?php echo $game['linkToTheGame'] ?>" style="text-decoration: none"><button class="play">Jouer !</button></a>
                        </div>
                    </div>
            <?php } ?>
            </div>

        </div>
    <?php } else {
        header("Location: ?action=tdb");
    } ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

<?php include("footer.php");?>
</html>