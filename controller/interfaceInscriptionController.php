<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Titre de la page</title>
  <!--<link rel="stylesheet" href="../ressources/style.css">-->
</head>
<body>
<?php
	echo date("Y-m-d H:i:s");
	$var=isDataCorrectForInscription();
	controllerInterfaceInscription();
?>
</body>
</html>

<?php

	
	function controllerInterfaceInscription(){
		if(isDataCorrectForInscription()){
			insertUserInTheDatabase();
		}
		else{
			echo "redirection a faire";
		}
	}
	
	function isDataCorrectForInscription(){
		$isItDataCorrectForInscription=true;
		if(isset($_POST["pseudo"])==false || empty($_POST["pseudo"])==true){
			$isItDataCorrectForInscription=false;
		}
		if(isset($_POST["mail"])==false || empty($_POST["mail"])==true){
			$isItDataCorrectForInscription=false;
		}
		if(isset($_POST["motdepasse"])==false || empty($_POST["motdepasse"])==true){
			$isItDataCorrectForInscription=false;
		}
		if(isset($_POST["motdepasse2"])==false || empty($_POST["motdepasse2"])==true){
			$isItDataCorrectForInscription=false;
		}
		if(isset($_POST["accept"])==false || empty($_POST["accept"])==true){
			$isItDataCorrectForInscription=false;
		}
		if($_POST["motdepasse"]!=$_POST["motdepasse"]){
			$isItDataCorrectForInscription=false;
		}
		return $isItDataCorrectForInscription;
	}
	
	function dataBaseConnection(){
		$bdd = new PDO('mysql:host=localhost;dbname=timetobreak;charset=utf8', 'root', '');
		return $bdd;
	}
	
	function insertUserInTheDatabase(){
		$bdd = dataBaseConnection();
		$pseudoUser=htmlspecialchars($_POST["pseudo"]);
		$mailUser=htmlspecialchars($_POST["mail"]);
		$passwordUser=htmlspecialchars($_POST["motdepasse"]);
		
		
		$request = $bdd->prepare('INSERT INTO user (pseudoUser,mailUser,passwordUser,credentialUser) VALUES (:pseudoUser,:mailUser,:passwordUser,:credentialUser)');
		$request->execute(array(
			'pseudoUser'=>$pseudoUser,
			'mailUser' => $mailUser,
			'passwordUser' => sha1($passwordUser),
			'credentialUser' =>1,
		));
		echo 'Insere !';
	}
	
?>