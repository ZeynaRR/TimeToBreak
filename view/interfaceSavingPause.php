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
		<form action="../controller/interfaceSavingPauseController.php" method="post">
			<label for="dateOfTheBreak">Date pause</label>
			<input type="date" name="dateOfTheBreak" id="dateOfTheBreak" required/><br>
			<label for="beginOfTheBreak">Heure debut:</label>
			<input type="time" name="beginOfTheBreak" id="beginOfTheBreak" required/><br>
			<label for="endOfTheBreak">Heure fin</label>
			<input type="time" name="endOfTheBreak" id="endOfTheBreak" required/><br>
			<label for="nameOfTheBreak">Nom de la pause</label>
			<input type="text" name="nameOfTheBreak" id="nameOfTheBreak" placeholder="pause du midi"/><br>
			<input type="submit">
		</form>
	</section>
</body>
</html>