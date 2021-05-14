<!DOCTYPE html>

<html lang="fr">
<head>
	<meta charset="utf-8">

	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">  

    <link rel="stylesheet" href="css/ban.css" />
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>  
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

	<script src="js/confirmation.js"></script>  

	<title>Bannir un membre</title>
</head>

<body>

	<h1 id="main_title">Bannir un membre</h1>

	<div class="contain">

		<ul class="nav nav-tabs">  
		    <li class="active"><a data-toggle="tab" href="#users">Utilisateurs</a></li>  
		    <?php if(isAllowed($status,array("admin"))){ ?><li class=""><a data-toggle="tab" href="#modos">Modérateurs</a></li> <?php }?>
		</ul>

		<div class="tab-content">
			<div id="users" class="tab-pane fade in active">
				<h4>Utilisateurs</h4>
				<table>
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

			<?php if(isAllowed($status,array("admin"))){ ?>
				<div id="modos" class="tab-pane fade">  
			    	<h4>Modérateurs</h4>
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