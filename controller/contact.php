<?php
	
	require("../model/model.php");

	if(isDataValidForSendingEmailToTimeToBreak()){
		generateEmailToAdminTimeToBreak();
		echo "1";
	}
	else{
		echo "0";
	}
?>