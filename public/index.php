<?php

session_start();

$_SESSION['status'] = "admin";

require("../controller/controller.php");

try
{
	if(isset($_GET['action'])){
		$action = htmlspecialchars($_GET['action']);
		switch($action)
		{
			case 'tdb':
				tdb();
			break;
		}
	}
}
catch (Exception $e)
{
	echo 'Error :'.$e->getMessage();
}