<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--Getting Bootstrap -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
	<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> -->
	<link href="css/styles-profil.css" rel="stylesheet">
</head>
<title> Profil Admin</title>

<body>
	<?php include("header.php"); ?>
	<div class="row dashboard content">
		<div class="col-md-4 text-center">
			<div class="profile">
				<img src="images/admin" class="rounded-circle" width="155">
				<h2>Mon profil</h2>
			</div>
		</div>
		<div class="col-md-8 mt-4">
			<div class="row">
				<section class="form1">
					<div class="col">
						<label for="login">Login :</label> <input type="text" value="<?php echo $mail ?>" name="login"><br><br>
						<label for="pseudo">Pseudo : </label><input type="text" value="<?php echo $pseudo ?>" name="pseudo">
					</div>
				</section>
			</div>
		</div>
	</div>
</body>
<?php include("footer.php"); ?>

</html>