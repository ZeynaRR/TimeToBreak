<?php
	
	require("../model/model.php");
	$var=isDataCorrectForInscription();
	if($var==true){
		if(isThePseudoAlreadyUsed()==true && isTheMailAlreadyUsed()==true){
			insertUserInTheDatabase();
			echo 1;//The user have been inserted: we return 1
		}
		else{
			echo 2;//The user haven't been inserted -problem already in the database : we return 2
		}
	}
	else{
		echo 0;//The user haven't been inserted -problem data : we return 0
	}
?>