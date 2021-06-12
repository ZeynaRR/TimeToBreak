<!DOCTYPE html>

<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">

    <link rel="stylesheet" href="css/ban.css" />
    <!-- <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css"> -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>  
	<!--<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script> -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

	<script src="js/confirmation.js"></script>  

	<title>Bannir un membre</title>
</head>

<body>

	<?php include("../view/header.php"); ?>

	<h1 id="main_title">Bannir un membre</h1>

	<div class="container">

		<ul class="nav nav-tabs">  
		    <li class="nav-item"><a class="nav-link active" data-bs-toggle="tab" href="#users">Utilisateurs</a></li>  
		    <?php if(isAllowed($status,array("3"))){ ?><li class="nav-item"><a class="nav-link" data-bs-toggle="tab" href="#modos">Modérateurs</a></li> <?php }?>
		</ul>

		<div class="tab-content">
			<div id="users" class="tab-pane fade in active table-responsive">
				<table class="table">
					<?php while ($user = $users->fetch())
						{ ?>
							<tr>
								<td id="pseudo"><?php echo $user['pseudoUser']; ?></td>
								<td><?php echo $user['mailUser']; ?></td>
								<td><button type="button" class="btn btn-danger" onclick="confirmation('<?php echo $link_ban.$user['idUser']; ?>')"><i class="fa fa-ban" aria-hidden="true"></i></button></td>
							</tr>
						<?php }?>
				</table>
				
			</div>

			<?php if(isAllowed($status,array("3"))){ ?>
				<div id="modos" class="tab-pane fade">  
					<table>
						<tr>
							<?php while ($modo = $modos->fetch())
								{ ?>
									<td id="pseudo"><?php echo $modo['pseudoUser']; ?></td>
									<td><?php echo $modo['mailUser']; ?></td>
								<?php }
							?>
							<td><button type="button" class="btn btn-danger"><i class="fa fa-ban" aria-hidden="true"></i></button></td>
						</tr>
					</table>
			    </div> 
			<?php }?>
		</div>
	</div>
</body>	