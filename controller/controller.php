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
		
		header("Location: ?action=connection");
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

function disconnect()
{
	session_destroy();
	header("Location: ?action=connection");
}

function createBreak()
{
	require("../view/interfaceSavingPause.php");
}

function breakList()
{
	require("../view/interfaceListingPause.php");
}

function inscription()
{
	require("../view/inscription.php");
}

function inscriptionModerator()
{
	require("../view/inscriptionModerator.php");
}

function codeModerator()
{
	require("../view/codeModerator.php");
}

function interfaceListingPause()
{
	require("../view/interfaceListingPause.php");
}

function updateBreak()
{
	$idBreak = htmlspecialchars($_GET['idBreak']);
	$adressToGo='Location:../view/interfaceUpdatingPause.php?idBreak='.$idBreak;
	header($adressToGo);
}

function contact()
{
	require("../view/contact.html");
}

function games() {
    if(isset($_SESSION['status'])){
        $status = $_SESSION['status'];
        $breaksTime = getBreaksTime();
        $isTime = isTimeToBreak($breaksTime);

        $gamesList = getAllGames();
        require("../view/gameInterface.php");
    }
    else
    {
        header("Location: ?action=connection");
    }
}