<!doctype html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" />
	<title>Mes pauses</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../ressources/css/generalCss.css">
	<link rel="stylesheet" href="../ressources/css/interfaceListingPause.css">
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

	<?php include("../view/header.php"); ?>
	
	<h1>Mes pauses:</h1>
	<section class="container">
		<div class="row">
			<div class="col-sm-12">
				<a href="?action=createBreak" id="addBreak"> Ajouter une pause</a>
			</div>
			<br> <br>
			<div class="col-sm-12 table-responsive">
				<table class="table">
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
							</th>
						</tr>
					</thead>
					<tbody>

						<?php
						selectMyPauseFromDataBaseAndDisplayIt()
						?>
					</tbody>
				</table>
			</div>
		</div>
	</section>
</body>

</html>
<?php

function selectMyPauseFromDataBaseAndDisplayIt()
{
	$bdd = dbConnect();
	$request = $bdd->prepare('SELECT * FROM break');
	$request->execute(array());
	while ($data = $request->fetch()) {
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
				<a class="fas fa-edit" id="updateBreak" href="../public/index.php?action=updateBreak&idBreak=<?php echo $data["idBreak"]; ?>"></a>
				<a class="far fa-trash-alt" id="deleteBreak" href="" onclick="deleteByIdBreak(<?php echo $data["idBreak"]; ?>)"></a>
			</td>
		</tr>
<?php
	}
}
?>
<footer></footer>
<script type="text/javascript" src="../ressources/js/inscription.js">
</script>
<script type="text/javascript" src="../ressources/js/interfaceListingPause.js">
</script>
</body>

</html>