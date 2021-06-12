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

function controllerInterfaceSavingPause(){
	if(isDataCorrectForInterfaceSavingPause()){
		$sessionId=$_SESSION["id"];
		insertIntoDatabaseNewBreak($sessionId);
	}
}

function createBreak()
{
	if(isset($_SESSION["id"])){
		require("../view/interfaceSavingPause.php");
	}else{
		header("'Location: ?action=connection");
	}
}

function breakList()
{
	if(isset($_SESSION["id"])){
		$sessionId=$_SESSION["id"];
		$getBreaks=getAllBreaksByIdUser($sessionId);
		require("../view/interfaceListingPause.php");
	}
	else{
		header("'Location: ?action=connection");
	}
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
	require("../view/interfaceUpdatingPause.php");
}

function contact()
{
	require("../view/contact.html");
}


function selectChatRoom() {
    require("../view/selectChatRoom.php");
}

function chatRoom() {
    require("../view/ChatRoom.php");
}

function sendMessageController()
{
    $messageContent = htmlspecialchars($_POST['messageInput']);
    $idRoom = htmlspecialchars($_POST['idRoom']);
    $idUser = $_SESSION['id'];
    sendMessage($messageContent, $idRoom, $idUser);
    header('Location: ../public/index.php?action=chatRoom&idRoom=' . $idRoom . '');
}

function deleteMessageController() {
    $messageId= htmlspecialchars($_GET['messageId']);
    $idRoom = htmlspecialchars($_GET['idRoom']);
    deleteMessage($messageId);
    header('Location: ../public/index.php?action=chatRoom&idRoom=' . $idRoom . '');
}

function banUserFromRoomController()
{
    $userId = htmlspecialchars($_GET['userId']);
    $idRoom = htmlspecialchars($_GET['idRoom']);
    banUser($userId);
    header('Location: ../public/index.php?action=chatRoom&idRoom=' . $idRoom . '');
}

function games() {
    if (isset($_SESSION['status'])) {
        $status = $_SESSION['status'];
        $breaksTime = getBreaksTime();
        $isTime = isTimeToBreak($breaksTime);

        $gamesList = getAllGames();
        require("../view/gameInterface.php");
    } else {
        header("Location: ?action=connection");
    }

}

function profile() {
    if (isset($_SESSION['status'])) {
        $session = $_SESSION['status'];
        if ($session == 1) {
            require("../view/profil-user.php");
        } else if ($session == 2) {
            require("../view/Profil-moder.php");
        } else if ($session == 3) {
            require("../view/Profil-admin.php");
        }
    } else {
        header("Location: ?action=connection");
    }
}