<!DOCTYPE html>

<html lang="fr">
<head>
	<meta charset="utf-8">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

        <link rel="stylesheet" href="css/tdb.css" />
        <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">

	<title>Tableau de bord</title>
</head>

<body>

	<?php include("../view/header.php") ?>

        <h1 id="main_title">Mon tableau de bord</h1>

	<div class="contain">
		<div class="row">
                <div class="col justify-content-center align-items-center">
                	<div class="division" id="general" <?php if($status!="1"){ ?> style="margin-top: 3%;" <?php }?>>
                                <ul>
                                        <li><i class="fa fa-user" aria-hidden="true"></i><a href="">&nbsp;&nbsp; Accéder à mon profil</a></li>
                                        <br>
                                        <li><i class="fa fa-cog" aria-hidden="true"></i><a href="">&nbsp;&nbsp;Paramètres</a></li>
                                </ul>
                	</div>
                        <?php if($status=="1"){ ?>
                        	<div class="division" id="breaks">
                        		<h3>Gérer mes pauses</h3>
                                        <ul class="list-group">
                                                <li class="list-group-item"><i class="fa fa-plus" aria-hidden="true"></i><a href="?action=createBreak">&nbsp;&nbsp;Enregistrer une pause</a> </li>
                                                <li class="list-group-item"><i class="fa fa-pause" aria-hidden="true"></i><a href="?action=breakList">&nbsp;&nbsp;Liste de ses pauses</a></li>
                                        </ul>
                        	</div>
                        <?php } ?>
                </div>

                <div class="col justify-content-center align-items-center" id="right-part">
                	<div class="division" id="activities" <?php if($status=="1"){ ?> style="margin-top: 5%;" <?php } ?>>
                                <?php if($status=="1"){ ?>
                		      <h3>Mes activités</h3>
                        		<?php if($isTime){ ?>
                                                <ul class="list-group">
                                                        <li class="list-group-item"><i class="fa fa-comment-o" aria-hidden="true"></i><a href="?action=selectChatRoom">&nbsp;&nbsp;Salons de discussion</a></li>
                                                        <li class="list-group-item"><i class="fa fa-play-circle-o" aria-hidden="true"></i><a href="">&nbsp;&nbsp;Jouer</a></li>
                                                        <li class="list-group-item"><i class="fa fa-heart-o" aria-hidden="true"></i><a href="">&nbsp;&nbsp;Étirements</a></li>
                                                        <li class="list-group-item"><i class="fa fa-forward" aria-hidden="true"></i><a href="">&nbsp;&nbsp;Autres activités</a></li>  
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
                                                    <li class="list-group-item"><i class="fa fa-comment-o" aria-hidden="true"></i><a href="?action=selectChatRoom">&nbsp;&nbsp;Salons de discussion</a></li>
                                                    <li class="list-group-item"><i class="fa fa-ban" aria-hidden="true"></i><a href="?action=ban">&nbsp;&nbsp;Bannir un membre</a></li>
                                                    <li class="list-group-item"><i class="fa fa-trash" aria-hidden="true"></i><a href="">&nbsp;&nbsp;Supprimer un message</a></li>
                                                </ul>
                                        <?php } 
                                        elseif($status=="3"){ ?>
                                                <ul class="list-group">
                                                        <li class="list-group-item"><i class="fa fa-comment-o" aria-hidden="true"></i><a href="?action=selectChatRoom">&nbsp;&nbsp;Salons de discussion</a></li>
                                                        <li class="list-group-item"><i class="fa fa-ban" aria-hidden="true"></i><a href="?action=ban">&nbsp;&nbsp;Bannir un membre</a></li>
                                                        <li class="list-group-item"><a href="">&nbsp;&nbsp;A propos</a></li>
                                                        <li class="list-group-item"><a href="">&nbsp;&nbsp;Nous contacter</a></li>
                                                        <li class="list-group-item"></i><a href="">&nbsp;&nbsp;CGU</a></li>  
                                                </ul>
                                        <?php } ?>
                                <?php } ?>
                	</div>
                </div>
        </div>
	</div>

</body>