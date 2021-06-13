<!DOCTYPE html>

<html lang="fr">
<head>
	<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="css/tdb.css" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css" integrity="sha384-SZXxX4whJ79/gErwcOYf+zWLeJdY/qpuqC4cAa9rOGUstPomtqpuNWT9wdPEn2fk" crossorigin="anonymous">

	<title>Tableau de bord</title>
</head>

<body>

	<?php include("../view/header.php") ?>

        <h1 id="main_title">Mon tableau de bord</h1>

	<div class="container-fluid content">
		<div class="row">
                <div class="col-sm-6 justify-content-center align-items-center">
                	<div class="division" id="general" <?php if($status!="1"){ ?> style="margin-top: 3%;" <?php }?>>
                                <ul>
                                        <li><i class="fa fa-user" aria-hidden="true"></i><a href="?action=profile">&nbsp;&nbsp; Accéder à mon profil</a></li>
                                </ul>
                	</div>
                        <?php if($status=="1"){ ?>
                        	<div class="division" id="breaks">
                        		<h3>Gérer mes pauses</h3>
                                        <ul class="list-group">
                                                <li class="list-group-item"><i class="fa fa-plus" aria-hidden="true"></i><a href="?action=createBreak">&nbsp;&nbsp;Enregistrer une pause</a> </li>
                                                <li class="list-group-item"><i class="fa fa-pause" aria-hidden="true"></i><a href="?action=breakList">&nbsp;&nbsp;Liste de mes pauses</a></li>
                                        </ul>
                        	</div>
                        <?php } ?>
                </div>

                <div class="col-sm-6 justify-content-center align-items-center" id="right-part">
                	<div class="division" id="activities" <?php if($status=="1"){ ?> style="margin-top: 18%;" <?php } ?>>
                                <?php if($status=="1"){ ?>
                		      <h3>Mes activités</h3>
                        		<?php if($isTime){ ?>
                                                <ul class="list-group">
                                                        <li class="list-group-item"><i class="fa fa-camera-retro"aria-hidden ="true" ></i><a href="?action=selectChatRoom">&nbsp;&nbsp;Salons de discussion</a></li>
                                                        <li class="list-group-item"><i class="fa fa-play-circle" aria-hidden="true"></i><a href="?action=games">&nbsp;&nbsp;Jouer</a></li>
                                                </ul>
                        		<?php } 
                                        else { ?>
                                                <p>Aucune pause en cours.</p>
                                        <?php } ?>
                                <?php } 
                                else{ ?>
                                        <h3>Mes tâches</h3>
                                        <?php if($status=="2"){ ?>
                                                <ul class="list-group">
                                                    <li class="list-group-item"><i class="fa fa-comment" aria-hidden="true"></i><a href="?action=selectChatRoom">&nbsp;&nbsp;Salons de discussion</a></li>
                                                </ul>
                                        <?php } 
                                        elseif($status=="3"){ ?>
                                                <ul class="list-group">
                                                        <li class="list-group-item"><i class="fa fa-comment" aria-hidden="true"></i><a href="?action=selectChatRoom">&nbsp;&nbsp;Salons de discussion</a></li>
                                                        <li class="list-group-item"><i class="fa fa-ban" aria-hidden="true"></i><a href="?action=ban">&nbsp;&nbsp;Bannir un membre</a></li>
                                                       
                                                </ul>
                                        <?php } ?>
                                <?php } ?>
                	</div>
                </div>
        </div>
	</div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</body>
<?php include("footer.php");?>
</html>