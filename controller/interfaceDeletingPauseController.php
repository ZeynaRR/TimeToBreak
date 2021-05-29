<?php

	deleteById();
	
	function dataBaseConnection(){
		$bdd = new PDO('mysql:host=localhost;dbname=timetobreak;charset=utf8', 'root', '');
		return $bdd;
	}
	
	function deleteById(){
		$bdd = dataBaseConnection();
		$idBreak=htmlspecialchars($_GET['idBreak']);
		$request = $bdd->prepare('DELETE FROM break WHERE idBreak=?');
		$request->execute(array($idBreak));
		header('Location:../view/interfaceListingPause.php');
	}
?>