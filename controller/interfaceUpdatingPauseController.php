<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Titre de la page</title>
  <!--<link rel="stylesheet" href="../ressources/style.css">-->
</head>
<body>
<?php
	controllerInterfaceUpdatingPause();
	echo date("Y-m-d H:i:s");
?>
</body>
</html>

<?php

	
	function controllerInterfaceUpdatingPause(){
		if(isDataCorrectForInterfaceUpdatingPause()){
			updateDatabaseBreak();
		}
		else{
			echo "redirection a faire";
		}
	}
	
	function isDataCorrectForInterfaceUpdatingPause(){
		$isDataCorrectForInterfaceUpdatingPause=true;
		if(isset($_POST["dateOfTheBreak"])==false || empty($_POST["dateOfTheBreak"])==true){
			$isDataCorrectForInterfaceUpdatingPause=false;
		}
		if(isset($_POST["beginOfTheBreak"])==false || empty($_POST["beginOfTheBreak"])==true){
			$isDataCorrectForInterfaceUpdatingPause=false;
		}
		if(isset($_POST["endOfTheBreak"])==false || empty($_POST["endOfTheBreak"])==true){
			$isDataCorrectForInterfaceUpdatingPause=false;
		}
		return $isDataCorrectForInterfaceUpdatingPause;
	}
	
	function dataBaseConnection(){
		$bdd = new PDO('mysql:host=localhost;dbname=timetobreak;charset=utf8', 'root', '');
		return $bdd;
	}
	
	function updateDatabaseBreak(){
		$bdd = dataBaseConnection();
		$datetimeBeginBreak=htmlspecialchars($_POST["dateOfTheBreak"]).' '.htmlspecialchars($_POST["beginOfTheBreak"]);
		$datetimeEndBreak=htmlspecialchars($_POST["dateOfTheBreak"]).' '.htmlspecialchars($_POST["endOfTheBreak"]);
		$datetimeLastUpdate=''.date("Y-m-d H:i:s");
		
		$nameOfTheBreak="";
		if(isset($_POST["nameOfTheBreak"])==true && !(empty($_POST["nameOfTheBreak"]))){
			$nameOfTheBreak=htmlspecialchars($_POST["nameOfTheBreak"]);
		}			
		
		$request = $bdd->prepare('UPDATE break SET idUser=:newIdUser, datetimeBeginBreak=:newDatetimeBeginBreak, datetimeEndBreak=:newDatetimeEndBreak, datetimeLastUpdate=:newDatetimeEndBreak, nameOfTheBreak=:newNameOfTheBreak WHERE idBreak='.htmlspecialchars($_GET['idBreak']));
		$request->execute(array(
			'newIdUser'=>118218,
			'newDatetimeBeginBreak' => $datetimeBeginBreak,
			'newDatetimeEndBreak' => $datetimeEndBreak,
			'newDatetimeLastUpdate' =>$datetimeLastUpdate,
			'newNameOfTheBreak'=>$nameOfTheBreak,
		));
		echo 'Modifie !';
	}
	
?>