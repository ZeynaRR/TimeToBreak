<?php

require("../controller/controller.php");

try
{
	if(isset($_GET['action'])){
		$action = htmlspecialchars($_GET['action']);
		switch($action)
		{
			case 'test':
				test();
			break;
		}
	}
	
		
}
catch (Exception $e)
{
	echo 'Error :'.$e->getMessage();
}
?>