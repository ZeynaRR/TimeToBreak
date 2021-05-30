<?php
	require("../model/model.php");

	$var=isDataCorrectForInterfaceUpdatingPause();
	if($var==true){
		updateDatabaseBreak();
		echo 1;//The user have been inserted: we return 1
	}
	else{
		echo 0;//The user haven't been inserted: we return 0
	}
?>