<!doctype html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" />
	<title>Mes pauses</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/generalCss.css">
	<link rel="stylesheet" href="css/interfaceListingPause.css">
	<link rel="apple-touch-icon" sizes="180x180" href="../apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="../favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="../favicon-16x16.png">
	<link rel="manifest" href="../site.webmanifest">
	<link rel="mask-icon" href="../safari-pinned-tab.svg" color="#5bbad5">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="theme-color" content="#ffffff">
</head>

<body onLoad="window.setTimeout('history.go(0)', 30000)">
	<script src="https://code.jquery.com/jquery-3.1.1.js"></script>

	<?php include("../view/header.php"); ?>

	<h1>Mes pauses:</h1>
	<section class="container content">
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
							<th>
							</th>
						</tr>
					</thead>
					<tbody>
					<?php
						runningMailingNotificationForBreakBegin();
						autodestructionBreakFinishedUsingDateTimeEndBreak();
						while ($data = $getBreaks->fetch()) {
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
								</td>
								<td>
									<a class="far fa-trash-alt" id="deleteBreak" href="" onclick="deleteByIdBreak(<?php echo $data["idBreak"]; ?>)"></a>
								</td>
							</tr>
						<?php
							}					
						?>
					</tbody>
				</table>
			</div>
		</div>
	</section>
<script type="text/javascript" src="js/inscription.js">
</script>
<script type="text/javascript" src="js/interfaceListingPause.js">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
<?php include("footer.php");?>
</html>