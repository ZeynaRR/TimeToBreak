<?php
	$var=isDataCorrectForInterfaceUpdatingPause();
	if($var==true){
		updateDatabaseBreak();
		echo 1;//The user have been inserted: we return 1
	}
	else{
		echo 0;//The user haven't been inserted: we return 0
	}
?>
<?php
	
	function isDataCorrectForInterfaceUpdatingPause(){
		$isDataCorrectForInterfaceUpdatingPause=true;
		if(isset($_POST["dateOfTheBreak1"])==false || empty($_POST["dateOfTheBreak1"])==true){
			$isDataCorrectForInterfaceUpdatingPause=false;
		}
		if(isset($_POST["beginOfTheBreak1"])==false || empty($_POST["beginOfTheBreak1"])==true){
			$isDataCorrectForInterfaceUpdatingPause=false;
		}
		if(isset($_POST["endOfTheBreak1"])==false || empty($_POST["endOfTheBreak1"])==true){
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
		$datetimeBeginBreak=htmlspecialchars($_POST["dateOfTheBreak1"]).' '.htmlspecialchars($_POST["beginOfTheBreak1"]);
		$datetimeEndBreak=htmlspecialchars($_POST["dateOfTheBreak1"]).' '.htmlspecialchars($_POST["endOfTheBreak1"]);
		$datetimeLastUpdate=''.date("Y-m-d H:i:s");
		
		$nameOfTheBreak="";
		if(isset($_POST["nameOfTheBreak1"])==true && !(empty($_POST["nameOfTheBreak1"]))){
			$nameOfTheBreak=htmlspecialchars($_POST["nameOfTheBreak1"]);
		}			
		
		$request = $bdd->prepare('UPDATE break SET idUser=:newIdUser, datetimeBeginBreak=:newDatetimeBeginBreak, datetimeEndBreak=:newDatetimeEndBreak, datetimeLastUpdate=:newDatetimeEndBreak, nameOfTheBreak=:newNameOfTheBreak WHERE idBreak='.htmlspecialchars($_GET['idBreak']));
		$request->execute(array(
			'newIdUser'=>118218,
			'newDatetimeBeginBreak' => $datetimeBeginBreak,
			'newDatetimeEndBreak' => $datetimeEndBreak,
			'newDatetimeLastUpdate' =>$datetimeLastUpdate,
			'newNameOfTheBreak'=>$nameOfTheBreak,
		));
	}
	
?>