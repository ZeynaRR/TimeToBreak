<?php

	require("../model/model.php");
	
	$var=isDataCorrectForInscription();
	if($var==true){
		if(isThePseudoAlreadyUsed()==true && isTheMailAlreadyUsed()==true){
			generateEmailForInscriptionModerator();
			echo "azertyuiop";//The user have been inserted
		}
		else{
			echo 2;//The user haven't been inserted -problem already in the database : we return 2
		}
	}
	else{
		echo 0;//The user haven't been inserted: we return 0
	}
?>