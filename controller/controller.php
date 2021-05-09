<?php

require("../model/model.php");

function tdb()
{
	$status =  $_SESSION['status'];
	
	$breaksTime = getBreaksTime();
	$isTime = isTimeToBreak($breaksTime);

	require("../view/tdb.php");
}