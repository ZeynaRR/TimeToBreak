<?php

require("../controller/controller.php");
require("../controller/connexionController.php");

try
{
	if(isset($_GET['action'])){
		$action = htmlspecialchars($_GET['action']);
		switch($action)
		{
			case 'test':
				test();
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