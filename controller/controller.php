<?php

require("../model/model.php");

function tdb()
{

	if(isset($_SESSION['status'])){
		$status = $_SESSION['status'];
		$breaksTime = getBreaksTime();
		$isTime = isTimeToBreak($breaksTime);

		require("../view/tdb.php");
	}
	else
	{
		var_dump($_SESSION);
		throw new Exception('Access Denied');
	}
}

function ban()
{
	$status =  $_SESSION['status'];
	if(isAllowed($status, array("2","3")))
	{
		$users = getUsers();
		$modos = getModos();

		$link_ban = "?action=ban_user&id=";

		require("../view/ban.php");
	}
	else
	{
		throw new Exception('Access Denied');
	}
}

function ban_user()
{
	$id = htmlspecialchars($_GET['id']);
	banUser($id);
	header("Location: ?action=ban");
}
