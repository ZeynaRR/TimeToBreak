<!doctype html>
<html lang="fr">
<?php require("../model/model.php");?>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" />
	<title>Mise à jour d'une pause</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../ressources/css/generalCss.css">
	<link rel="stylesheet" href="../ressources/css/interfaceSavingPause.css">
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
	<script type="text/javascript" src="../ressources/js/interfaceUpdatingPause.js">
	</script>
	<!--include a menue-->
	<?php include("../view/header.php"); ?>

	<div id="divFormEnregistrement" class="container">
		<div class="row text-center">
			<h1>Mise à jour d'une pause</h1>

			<section>
				<?php
				displayTheCorrepondingBreak();
				?>
			</section>
</body>

</html>
<?php
function displayTheCorrepondingBreak()
{
	$bdd = dataBaseConnection();
	$idBreak = htmlspecialchars($_GET['idBreak']);
	$request = $bdd->prepare('SELECT * FROM break WHERE idBreak = ?');
	$request->execute(array($idBreak));
	$data = $request->fetch();
?>
	<form method="post">
		<label for="dateOfTheBreak">Date pause</label>
		<div class="form-group centered">
			<div class="col-xs-6">
				<input type="date" name="dateOfTheBreak" id="dateOfTheBreak" value="<?php echo extractYearsFromDatetime($data["datetimeBeginBreak"]); ?>" required />
			</div>
		</div>
		<label for="beginOfTheBreak">Heure debut:</label>
		<div class="form-group centered">
			<div class="col-xs-6">
				<input type="time" name="beginOfTheBreak" id="beginOfTheBreak" value="<?php echo extractHoursMinFromDatetime($data["datetimeBeginBreak"]); ?>" required />
			</div>
		</div>
		<label for="endOfTheBreak">Heure fin</label>
		<div class="form-group centered">
			<div class="col-xs-6">
				<input type="time" name="endOfTheBreak" id="endOfTheBreak" value="<?php echo extractHoursMinFromDatetime($data["datetimeEndBreak"]); ?>" required />
			</div>
		</div>
		<label for="nameOfTheBreak">Nom de la pause</label>
		<div class="form-group centered">
			<div class="col-xs-6">
				<input type="text" name="nameOfTheBreak" id="nameOfTheBreak" value="<?php echo $data["nameOfTheBreak"]; ?>" />
			</div>
		</div>
		<input id="enregistrement" type="submit" value="Modifier ma pause >">
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