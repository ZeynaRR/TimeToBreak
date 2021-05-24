<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Titre de la page</title>
  <!--<link rel="stylesheet" href="../ressources/style.css">-->
</head>
<body>
<?php
	controllerInterfaceSavingPause();
?>
</body>
</html>

<?php

	/**************CORE FUNCTION**************/
	function controllerInterfaceSavingPause(){
		if(isDataCorrectForInterfaceSavingPause()){
			insertIntoDatabaseNewBreak();
		}
		else{
			echo "redirection a faire";
		}
	}
	
	function isDataCorrectForInterfaceSavingPause(){
		$isDataCorrectForInterfaceSavingPause=true;
		if(isset($_POST["dateOfTheBreak"])==false || empty($_POST["dateOfTheBreak"])==true){
			$isDataCorrectForInterfaceSavingPause=false;
		}
		if(isset($_POST["beginOfTheBreak"])==false || empty($_POST["beginOfTheBreak"])==true){
			$isDataCorrectForInterfaceSavingPause=false;
		}
		if(isset($_POST["endOfTheBreak"])==false || empty($_POST["endOfTheBreak"])==true){
			$isDataCorrectForInterfaceSavingPause=false;
		}
		return $isDataCorrectForInterfaceSavingPause;
	}
	
	function dataBaseConnection(){
		$bdd = new PDO('mysql:host=localhost;dbname=timetobreak;charset=utf8', 'root', '');
		return $bdd;
	}
	
	function insertIntoDatabaseNewBreak(){
		$bdd = dataBaseConnection();
		$datetimeBeginBreak=htmlspecialchars($_POST["dateOfTheBreak"]).' '.htmlspecialchars($_POST["beginOfTheBreak"]);
		$datetimeEndBreak=htmlspecialchars($_POST["dateOfTheBreak"]).' '.htmlspecialchars($_POST["endOfTheBreak"]);
		$datetimeLastUpdate=''.date("Y-m-d H:i:s");
		
		$nameOfTheBreak="";
		if(isset($_POST["nameOfTheBreak"])==true && !(empty($_POST["nameOfTheBreak"]))){
			$nameOfTheBreak=htmlspecialchars($_POST["nameOfTheBreak"]);
		}			
		
		$req = $bdd->prepare('INSERT INTO break(idUser, datetimeBeginBreak, datetimeEndBreak, datetimeLastUpdate, nameOfTheBreak) VALUES(:idUser, :datetimeBeginBreak, :datetimeEndBreak, :datetimeLastUpdate, :nameOfTheBreak)');
		$req->execute(array(
			'idUser'=>118218,
			'datetimeBeginBreak' => $datetimeBeginBreak,
			'datetimeEndBreak' => $datetimeEndBreak,
			'datetimeLastUpdate' =>$datetimeLastUpdate,
			'nameOfTheBreak'=>$nameOfTheBreak,
		));
		echo 'Ajoute !';
	}
	
?>