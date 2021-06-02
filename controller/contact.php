<?php
	
	require("../model/model.php");

	if(isDataValidForSendingEmailToTimeToBreak()){
		generateEmailToAdminTimeToBreak();
	}
	else{
		echo "0";
	}
?>