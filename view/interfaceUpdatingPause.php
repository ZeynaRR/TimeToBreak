<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Titre de la page</title>
  <link rel="stylesheet" href="../ressources/css/interfaceSavingPause.css">
</head>
<body>
	<!--include a menue-->
	<!--include a header-->
	<h1>Enregistrement d'une pause</h1>
	
	<section>
	<?php
		displayTheCorrepondingBreak();
	?>
	</section>
</body>
</html>

<?php

	function dataBaseConnection(){
		$bdd = new PDO('mysql:host=localhost;dbname=timetobreak;charset=utf8', 'root', '');
		return $bdd;
	}
	
	function displayTheCorrepondingBreak(){
		$bdd=dataBaseConnection();
		$idBreak=htmlspecialchars($_GET['idBreak']);
		$request = $bdd->prepare('SELECT * FROM break WHERE idBreak = ?');
		$request->execute(array($idBreak));
		$data=$request->fetch();
		?>
		<form action="../controller/interfaceUpdatingPauseController.php?idBreak=<?php echo $idBreak;?>" method="post">
			<label for="dateOfTheBreak">Date pause</label>
			<input type="date" name="dateOfTheBreak" id="dateOfTheBreak" value="<?php echo extractYearsFromDatetime($data["datetimeBeginBreak"]);?>" required/><br>
			<label for="beginOfTheBreak">Heure debut:</label>
			<input type="time" name="beginOfTheBreak" id="beginOfTheBreak" value="<?php echo extractHoursMinFromDatetime($data["datetimeBeginBreak"]);?>" required/><br>
			<label for="endOfTheBreak">Heure fin</label>
			<input type="time" name="endOfTheBreak" id="endOfTheBreak" value="<?php echo extractHoursMinFromDatetime($data["datetimeEndBreak"]);?>" required/><br>
			<label for="nameOfTheBreak">Nom de la pause</label>
			<input type="text" name="nameOfTheBreak" id="nameOfTheBreak" value="<?php echo $data["nameOfTheBreak"];?>"/><br>
			<input type="submit">
		</form>
		<?php
	}
	
	function extractYearsFromDatetime($myDatetime){
		$tableTime=explode(" ",$myDatetime);
		return $tableTime[0];
	}
	function extractHoursMinFromDatetime($myDatetime){
		$tableTime=explode(" ",$myDatetime);
		return $tableTime[1];
	}
?>