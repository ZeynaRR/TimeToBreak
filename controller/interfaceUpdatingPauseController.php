<?php
	require("../model/model.php");

	$var=isDataCorrectForInterfaceUpdatingPause();
	if($var==true){
		updateDatabaseBreak();
		echo 1;
	}
	else{
		echo 0;
	}
?>