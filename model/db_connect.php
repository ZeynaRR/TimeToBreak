<?php

function dbConnect()
{
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=timeToBreak;charset=utf8', 'root', 'Tinpl127.0.0.1');

		return $bdd;
	}
	
	catch(Exception $e)
	{
	        die('Erreur : '.$e->getMessage());
	}
}