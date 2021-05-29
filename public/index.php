<?php

session_start();

$_SESSION['status'] = "admin";

require("../controller/controller.php");
require("../controller/connexionController.php");

try
{
	if(isset($_GET['action'])){
		$action = htmlspecialchars($_GET['action']);
		switch($action)
		{
			case 'tdb':
				tdb();
			break;
			case 'ban':
				ban();
			break;
			case 'ban_user':
				ban_user();
			break;
            case 'connection':
                connection();
                break;
            case 'connect':
                connect();
                break;
		}
	}
}
catch (Exception $e)
{
	echo 'Error :'.$e->getMessage();
}
?>