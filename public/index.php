<?php

session_start();

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
            case 'disconnect':
                disconnect();
            break;
            case 'createBreak':
                createBreak();
            break;
            case 'breakList':
                breakList();
            break;
			case 'inscription':
				inscription();
			break;
			case 'inscriptionModerator':
				inscriptionModerator();
			break;
			case 'codeModerator':
				codeModerator();
			break;
			case 'updateBreak';
				updateBreak();
			break;
			case 'contact';
				contact();
			break;
			case 'games';
			    games();
			break;

		}
	}
}
catch (Exception $e)
{
	echo 'Error :'.$e->getMessage();
}
?>