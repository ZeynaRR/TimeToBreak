<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
				<meta name="viewport" content="width=device-width, initial-scale=1.0">
					<!--Getting Bootstrap -->
					<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
						<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
						<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
						<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> -->
						<link href="css/styles-profil.css" rel="stylesheet">
						</head>
                        <title> Profil Moderateur</title>
						<body>
                            <?php  include("header.php"); ?>
							<div class="row dashboard">
								<div class="col-md-4">
									<div class="profile">
										<img src="https://images.unsplash.com/photo-1522075469751-3a6694fb2f61?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=80" class="rounded-circle"  width="155">
											<h2>Mon profil</h2>
										</div>
									</div>
									<div class="col-8">
										<div class="row">
											<div class="col-8">
												<section class="form1">
													<div class="row">
														
														<div class="col">
                                                            <form action="">
                                                                <label for="">Login : <input type="text" name="">
                                                                <button class="btn btn-primary btn-lg float-end">Modifier</button></label>
                                                                <label for="">Mot de passe: <input type="password" name="">
                                                                <button class="btn btn-primary btn-lg float-end"> Rénitialiser</button></label>
                                                            </form>
                                                        </div>
													</div>
												</section>
											</div>
										</div>
										<div class="row">
											<div class="col-8">
												
											</div>
										</div>
									</div>
								</div>
							</body>
							<?php include("footer.php");?>
						</html>
