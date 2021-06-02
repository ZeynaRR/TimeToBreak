<?php
	
	require("../model/model.php");
	
	$var=insertModeratorInTheDatabase();
	echo $var;//The user have been inserted: we return 1
	//The user haven't been inserted: we return 0
?>