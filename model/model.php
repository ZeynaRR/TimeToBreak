<?php

require("../model/db_connect.php");

function getBreaksTime()
{
	$breaksTime = [['begin' => date("2021-05-04 01:24:32"),'end' => date("2021-05-04 03:30:00")], ['begin' => date("2021-05-07 01:24:32"),'end' => date("2021-05-11 03:30:00")]];

	return $breaksTime;
}

function isTimeToBreak($breaksTime)
{
	$now = date("Y-m-d H:i:s");

	$isBreak = false;

	foreach($breaksTime as $break){
		if($break['begin'] <= $now && $now <= $break['end'])
		{
			$isBreak = true;
		}
	}

	return $isBreak;
}

function isAllowed($status, $allowed)
{
	return in_array($status, $allowed);
}

function getUsers()
{
	$bdd = dbConnect();
	
	$req = $bdd->query('SELECT idUser,pseudoUser,mailUser FROM `user` WHERE credentialUser=1 AND Ban=0');

	return $req;
}

function getModos()
{
	$bdd = dbConnect();
	
	$req = $bdd->query('SELECT idUser,pseudoUser,mailUser FROM `user` WHERE credentialUser=2 AND Ban=0');

	return $req;
}

function getAdmins()
{
	$bdd = dbConnect();
	
	$req = $bdd->query('SELECT idUser,pseudoUser,mailUser FROM `user` WHERE credentialUser=3 AND Ban=0');

	return $req;
}

function banUser($id)
{
	$bdd = dbConnect();
	$req = $bdd->prepare('UPDATE user SET Ban = TRUE WHERE idUser = ?');
	$req->execute(array($id));
}
