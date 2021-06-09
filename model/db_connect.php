<?php

function dbConnect()
{
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=timetobreak;charset=utf8', 'root', '');

		return $bdd;
	}
	
	catch(Exception $e)
	{
	        die('Erreur : '.$e->getMessage());
	}
}