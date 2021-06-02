<?php

	require("../model/model.php");
	
	$var=isDataCorrectForInscription();
	if($var==true){
		generateEmailForInscriptionModerator();
	}
	else{
		echo 0;//The user haven't been inserted: we return 0
	}
?>