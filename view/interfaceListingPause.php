<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Titre de la page</title>
  <link rel="stylesheet" href="../ressources/css/interfaceListingPause.css">
</head>
<body>
	<h1>Mes pauses:</h1>
	<section>
		<a href="interfaceSavingPause.php">Ajouter une pause</a>
		<table>
			<thead>
				<tr>
					<th>
						Début de la pause
					</th>
					<th>
						Fin de la pause
					</th>
					<th>
						Nom de la pause
					</th>
					<th>
						Date derniere modification de la pause
					</th>
					<th>
						Modifier
					</th>
					<th>
						Supprimer ma pause
					</th>
				</tr>
			</thead>
			<tbody>
				
				<?php
					selectMyPauseFromDataBaseAndDisplayIt()
				?>
			</tbody>
		</table>
	</section>
</body>
</html>
<?php
	function dataBaseConnection(){
		$bdd = new PDO('mysql:host=localhost;dbname=timetobreak;charset=utf8', 'root', '');
		return $bdd;
	}
	
	function selectMyPauseFromDataBaseAndDisplayIt(){
		$bdd = dataBaseConnection();
		$request = $bdd->prepare('SELECT * FROM break');
		$request->execute(array());
		while($data=$request->fetch()){
			?>
			<tr>
				<td>
				<?php
					echo $data["datetimeBeginBreak"];
				?>
				</td>
				<td>
				<?php
					echo $data["datetimeEndBreak"];
				?>
				</td>
				<td>
				<?php
					echo $data["nameOfTheBreak"];
				?>
				</td>
				<td>
				<?php
					echo $data["datetimeLastUpdate"];
				?>
				</td>
				<td>
					<a href="interfaceUpdatingPause.php?idBreak=<?php echo $data["idBreak"];?>">Modifier ma pause</a>
				</td>
				<td>
					<a href="interfaceDeletingPause.php?idBreak=<?php echo $data["idBreak"];?>">Supprimer ma pause</a>
				</td>
			</tr>
			<?php
		}
	}
?>