<!doctype html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" />
	<title>Mise à jour d'une pause</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/generalCss.css">
	<link rel="stylesheet" href="css/interfaceSavingPause.css">
	<link rel="apple-touch-icon" sizes="180x180" href="../apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="../favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="../favicon-16x16.png">
	<link rel="manifest" href="../site.webmanifest">
	<link rel="mask-icon" href="../safari-pinned-tab.svg" color="#5bbad5">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="theme-color" content="#ffffff">
</head>

<body>
	<script src="https://code.jquery.com/jquery-3.1.1.js"></script>
	<script type="text/javascript" src="js/interfaceUpdatingPause.js">
	</script>
	<!--include a menue-->
	<?php include("../view/header.php"); ?>

	<div id="divFormEnregistrement" class="container-sm">
		<div class="row text-center">
			<h1>Mise à jour d'une pause</h1>

			<section>
				<?php
				displayTheCorrepondingBreak();
				?>
			</section>
			<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>
<?php

//********NO MVC FOR SOME REASONS PURPOSES----
function dataBaseConnection2(){
	$bdd = new PDO('mysql:host=localhost;dbname=timetobreak;charset=utf8', 'root', '');
	return $bdd;
}
function displayTheCorrepondingBreak()
{
	$bdd = dataBaseConnection2();
	$idBreak = htmlspecialchars($_GET['idBreak']);
	$request = $bdd->prepare('SELECT * FROM break WHERE idBreak = ?');
	$request->execute(array($idBreak));
	$data = $request->fetch();
?>
	<form method="post" id="formSavingBreaks">
		<label for="dateOfTheBreak">Date pause</label>
		<div class="form-group centered">
			<div class="col-sm-6">
				<input type="date" name="dateOfTheBreak" id="dateOfTheBreak" value="<?php echo extractYearsFromDatetime($data["datetimeBeginBreak"]); ?>" required />
			</div>
		</div>
		<label for="beginOfTheBreak">Heure debut:</label>
		<div class="form-group centered">
			<div class="col-sm-6">
				<input type="time" name="beginOfTheBreak" id="beginOfTheBreak" value="<?php echo extractHoursMinFromDatetime($data["datetimeBeginBreak"]); ?>" required />
			</div>
		</div>
		<label for="endOfTheBreak">Heure fin</label>
		<div class="form-group centered">
			<div class="col-sm-6">
				<input type="time" name="endOfTheBreak" id="endOfTheBreak" value="<?php echo extractHoursMinFromDatetime($data["datetimeEndBreak"]); ?>" required />
			</div>
		</div>
		<label for="nameOfTheBreak">Nom de la pause</label>
		<div class="form-group centered">
			<div class="col-sm-6">
				<input type="text" name="nameOfTheBreak" id="nameOfTheBreak" value="<?php echo $data["nameOfTheBreak"]; ?>" />
			</div>
		</div>
		<div class="form-group centered">
			<input id="enregistrement" type="submit" value="Enregistrer ma pause >">
		</div>
	</form>
<?php
}

function extractYearsFromDatetime($myDatetime)
{
	$tableTime = explode(" ", $myDatetime);
	return $tableTime[0];
}
function extractHoursMinFromDatetime($myDatetime)
{
	$tableTime = explode(" ", $myDatetime);
	return $tableTime[1];
}
?>