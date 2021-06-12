<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';
require("../model/db_connect.php");

//-----------------------------------------------------
function dataBaseConnection()
{
	$bdd = new PDO('mysql:host=localhost;dbname=timetobreak;charset=utf8', 'root', '');
	return $bdd;
}

//-----------------------------------------------------
function getBreaksTime()
{
    $allBreaks = getAllBreaks();
	$breaksTime['begin'][]= "";
	$breaksTime['end'][]="";
    foreach($allBreaks as $break) {
        $breaksTime['begin'][] = $break['datetimeBeginBreak'];
        $breaksTime['end'][] = $break['datetimeEndBreak'];
    }
	return $breaksTime;
}

function isTimeToBreak($breaksTime)
{
	date_default_timezone_set('Europe/Paris');
	$now = date("Y-m-d H:i:s");
	$isBreak = false;

	for ($i = 0; $i < sizeof($breaksTime['begin']); $i++) {
		if (strtotime($breaksTime['begin'][$i]) <= strtotime($now) && strtotime($now) <= strtotime($breaksTime['end'][$i])) {
			return true;
		}
	}

	return $isBreak;
}

function isAllowed($status, $allowed)
{
	return in_array($status, $allowed);
}

function getAll()
{
	$bdd = dbConnect();

	$req = $bdd->query('SELECT idUser,pseudoUser,mailUser,passwordUser FROM `user` WHERE Ban=0');

	return $req;
}

function getUsers()
{
	$bdd = dbConnect();

	$req = $bdd->query('SELECT idUser,pseudoUser,mailUser,passwordUser FROM `user` WHERE credentialUser=1 AND Ban=0');

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



function getUserByMail(String $mail)
{
	$bdd = dbConnect();
	$req = $bdd->prepare('SELECT * FROM user WHERE mailUser = ?');
	$req->execute(
		array(
			$mail
		)
	);
	return $req->fetch();
}


function banUser($id)
{
	$bdd = dbConnect();
	$req = $bdd->prepare('UPDATE user SET Ban = TRUE WHERE idUser = ?');
	$req->execute(array($id));
}

function isBanned($login)
{
	$user = getUserByMail($login);
	return $user['Ban'];
}

function deleteUserByMail($mail)
{
	$bdd = dbConnect();
	$req = $bdd->prepare('DELETE FROM user WHERE mailUser = ?');
	$req->execute(
		array(
			$mail
		)
	);
}

//-----------------------------------------------------

function isDataCorrectForInscription()
{
	$isItDataCorrectForInscription = true;
	if (isset($_POST["pseudo1"]) == false || empty($_POST["pseudo1"]) == true) {
		$isItDataCorrectForInscription = false;
	}
	if (isset($_POST["mail1"]) == false || empty($_POST["mail1"]) == true) {
		$isItDataCorrectForInscription = false;
	}
	if (isset($_POST["password1"]) == false || empty($_POST["password1"]) == true) {
		$isItDataCorrectForInscription = false;
	}
	if (isset($_POST["password2"]) == false || empty($_POST["password2"]) == true) {
		$isItDataCorrectForInscription = false;
	}
	if (isset($_POST["accept1"]) == false || empty($_POST["accept1"]) == true) {
		$isItDataCorrectForInscription = false;
	}
	if ($_POST["password1"] != $_POST["password1"]) {
		$isItDataCorrectForInscription = false;
	}
	return $isItDataCorrectForInscription;
}

function insertUserInTheDatabase()
{
	$bdd = dataBaseConnection();
	$pseudoUser = htmlspecialchars($_POST["pseudo1"]);
	$mailUser = htmlspecialchars($_POST["mail1"]);
	$passwordUser = htmlspecialchars($_POST["password1"]);


	$hashedPassword = password_hash($passwordUser, PASSWORD_DEFAULT);

	$request = $bdd->prepare('INSERT INTO user (pseudoUser,mailUser,passwordUser,credentialUser,Ban) VALUES (:pseudoUser,:mailUser,:passwordUser,:credentialUser,:Ban)');
	$request->execute(array(
		'pseudoUser' => $pseudoUser,
		'mailUser' => $mailUser,
		'passwordUser' => $hashedPassword,
		'credentialUser' => 1,
		'Ban' => 0,
	));
}


//-----------------------------------------------------
function deleteById()
{
	$bdd = dataBaseConnection();
	$idBreak = htmlspecialchars($_GET['idBreak']);
	$request = $bdd->prepare('DELETE FROM break WHERE idBreak=?');
	$request->execute(array($idBreak));
	header('Location:../public/index.php?action=breakList');
}

//-----------------------------------------------------

function isDataCorrectForInterfaceSavingPause(){
	$isDataCorrectForInterfaceSavingPause=true;
	if(isset($_POST["dateOfTheBreak"])==false || empty($_POST["dateOfTheBreak"])==true){
		$isDataCorrectForInterfaceSavingPause=false;
	}
	if (isset($_POST["beginOfTheBreak"]) == false || empty($_POST["beginOfTheBreak"]) == true) {
		$isDataCorrectForInterfaceSavingPause = false;
	}
	if (isset($_POST["endOfTheBreak"]) == false || empty($_POST["endOfTheBreak"]) == true) {
		$isDataCorrectForInterfaceSavingPause = false;
	}
	return $isDataCorrectForInterfaceSavingPause;
}
	
	
function insertIntoDatabaseNewBreak($idUser){
	$bdd = dataBaseConnection();
	$datetimeBeginBreak = htmlspecialchars($_POST["dateOfTheBreak"]) . ' ' . htmlspecialchars($_POST["beginOfTheBreak"]);
	$datetimeEndBreak = htmlspecialchars($_POST["dateOfTheBreak"]) . ' ' . htmlspecialchars($_POST["endOfTheBreak"]);
	$datetimeLastUpdate = '' . date("Y-m-d H:i:s");

	$nameOfTheBreak = "";
	if (isset($_POST["nameOfTheBreak"]) == true && !(empty($_POST["nameOfTheBreak"]))) {
		$nameOfTheBreak = htmlspecialchars($_POST["nameOfTheBreak"]);
	}

	$req = $bdd->prepare('INSERT INTO break(idUser, datetimeBeginBreak, datetimeEndBreak, datetimeLastUpdate, nameOfTheBreak) VALUES(:idUser, :datetimeBeginBreak, :datetimeEndBreak, :datetimeLastUpdate, :nameOfTheBreak)');
	$req->execute(array(
		'idUser'=>$idUser,//////////////////////////////////////////////////////////////////*********
		'datetimeBeginBreak' => $datetimeBeginBreak,
		'datetimeEndBreak' => $datetimeEndBreak,
		'datetimeLastUpdate' => $datetimeLastUpdate,
		'nameOfTheBreak' => $nameOfTheBreak,
	));
	header('Location:../public/index.php?action=breakList');
}

//-----------------------------------------------------
function isDataCorrectForInterfaceUpdatingPause()
{
	$isDataCorrectForInterfaceUpdatingPause = true;
	if (isset($_POST["dateOfTheBreak1"]) == false || empty($_POST["dateOfTheBreak1"]) == true) {
		$isDataCorrectForInterfaceUpdatingPause = false;
	}
	if (isset($_POST["beginOfTheBreak1"]) == false || empty($_POST["beginOfTheBreak1"]) == true) {
		$isDataCorrectForInterfaceUpdatingPause = false;
	}
	if (isset($_POST["endOfTheBreak1"]) == false || empty($_POST["endOfTheBreak1"]) == true) {
		$isDataCorrectForInterfaceUpdatingPause = false;
	}
	return $isDataCorrectForInterfaceUpdatingPause;
}



function updateDatabaseBreak()
{
	$bdd = dbConnect();
	$datetimeBeginBreak = htmlspecialchars($_POST["dateOfTheBreak1"]) . ' ' . htmlspecialchars($_POST["beginOfTheBreak1"]);
	$datetimeEndBreak = htmlspecialchars($_POST["dateOfTheBreak1"]) . ' ' . htmlspecialchars($_POST["endOfTheBreak1"]);
	$datetimeLastUpdate = '' . date("Y-m-d H:i:s");

	$nameOfTheBreak = "";
	if (isset($_POST["nameOfTheBreak1"]) == true && !(empty($_POST["nameOfTheBreak1"]))) {
		$nameOfTheBreak = htmlspecialchars($_POST["nameOfTheBreak1"]);
	}

	$request = $bdd->prepare('UPDATE break SET datetimeBeginBreak=:newDatetimeBeginBreak, datetimeEndBreak=:newDatetimeEndBreak, datetimeLastUpdate=:newDatetimeEndBreak, nameOfTheBreak=:newNameOfTheBreak WHERE idBreak=' . htmlspecialchars($_GET['idBreak']));
	$request->execute(array(
		'newDatetimeBeginBreak' => $datetimeBeginBreak,
		'newDatetimeEndBreak' => $datetimeEndBreak,
		'newDatetimeLastUpdate' => $datetimeLastUpdate,
		'newNameOfTheBreak' => $nameOfTheBreak,
	));
}
function extractYearsFromDatetime($myDatetime)
{
	$tableTime = explode(" ", $myDatetime);
	return $tableTime[0];
}
function extractHoursMinFromDatetime($myDatetime)
{
	$tableTime = explode(" ", $myDatetime);
	return $tableTime[1];
}

function getTheBreakByTheId($idBreak)
{
	$bdd = dataBaseConnection();
	$request = $bdd->prepare('SELECT * FROM break WHERE idBreak = ?');
	$request->execute(array($idBreak));
	$data = $request->fetch();
	return $data;
}

function getAllBreaks()
{
	$bdd = dbConnect();
	$breaksList = $bdd->query('SELECT * FROM break');
	return $breaksList;
}

function getAllBreaksByIdUser($idUser){
    $bdd = dbConnect();
    $request = $bdd->prepare('SELECT * FROM break WHERE idUser=?');
	$request->execute(array($idUser));
	return $request;
}
//-------------------------------------

function isDataValidForSendingEmailToTimeToBreak()
{
	$isItDataCorrectForSendingMailToTTB = true;
	if (isset($_POST["identifiant"]) == false || empty($_POST["identifiant"]) == true) {
		$isItDataCorrectForInscription = false;
	}
	if (isset($_POST["mailUtilisateur"]) == false || empty($_POST["mailUtilisateur"]) == true) {
		$isItDataCorrectForInscription = false;
	}
	if (isset($_POST["objet"]) == false || empty($_POST["objet"]) == true) {
		$isItDataCorrectForInscription = false;
	}
	if (isset($_POST["Demande"]) == false || empty($_POST["Demande"]) == true) {
		$isItDataCorrectForInscription = false;
	}
	return $isItDataCorrectForSendingMailToTTB;
}

function generateEmailToAdminTimeToBreak()
{

	$mail = htmlspecialchars($_POST["mailUtilisateur"]);
	$pseudo = htmlspecialchars($_POST["identifiant"]);
	$object = htmlspecialchars($_POST["objet"]);
	$description = htmlspecialchars($_POST["Demande"]);

	$globalInformation = $mail . '<br>' . $description;

	$mail = new PHPMailer;
	$mail->isSMTP();
	$mail->SMTPDebug = 2;
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 587; // typically 587 
	$mail->SMTPSecure = 'tls'; // ssl is depracated
	$mail->SMTPAuth = true;
	$mail->Username = "geai4dai@gmail.com";
	$mail->Password = "blaAPPL313d";
	$mail->setFrom("geai4dai@gmail.com", $pseudo);
	$mail->addAddress("geai4dai@gmail.com", "geai");
	$mail->Subject = $object;
	$mail->msgHTML($globalInformation); // remove if you do not want to send HTML email
	$mail->AltBody = 'HTML not supported';
	$mail->send();
}


//---------------------------------------
function generateEmailForInscriptionModerator()
{
	$pseudoUser = htmlspecialchars($_POST["pseudo1"]);
	$mailUser = htmlspecialchars($_POST["mail1"]);
	$passwordUser = htmlspecialchars($_POST["password1"]);

	$link = 'http://127.0.0.1/gitTimeToBreak/TimeToBreak/public/index.php?action=codeModerator&pseudo=' . $pseudoUser . '&mail=' . $mailUser . '&password=' . $passwordUser;

	$text = 'Bonjour. Veuillez recopier le code suivant<br>
					5194815
					<br>sur le lien suivant<br>
					<a href="' . $link . '">lien</a>
					<br> Ou si le lien ne s ouvre pas :' . $link . '<br>L equipe TimeToBreak';
	$mail = new PHPMailer;
	$mail->isSMTP();
	$mail->SMTPDebug = 2;
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 587; // typically 587 
	$mail->SMTPSecure = 'tls'; // ssl is depracated
	$mail->SMTPAuth = true;
	$mail->Username = "geai4dai@gmail.com";
	$mail->Password = "blaAPPL313d";
	$mail->setFrom("geai4dai@gmail.com", "geai");
	//$mail->addAddress("geai4dai@gmail.com", "geai");
	$mail->addAddress($mailUser, $pseudoUser);
	$mail->Subject = 'Inscription Moderateur';
	$mail->msgHTML($text); // remove if you do not want to send HTML email
	$mail->AltBody = 'HTML not supported';

	$mail->send();
}

function insertModeratorInTheDatabase()
{
	$bdd = dataBaseConnection();
	$pseudoUser = htmlspecialchars($_POST["pseudo1"]);
	$mailUser = htmlspecialchars($_POST["mail1"]);
	$passwordUser = htmlspecialchars($_POST["password1"]);

	$hashedPassword = password_hash($passwordUser, PASSWORD_DEFAULT);

	$request = $bdd->prepare('INSERT INTO user (pseudoUser,mailUser,passwordUser,credentialUser,Ban) VALUES (:pseudoUser,:mailUser,:passwordUser,:credentialUser,:Ban)');
	$request->execute(array(
		'pseudoUser' => $pseudoUser,
		'mailUser' => $mailUser,
		'passwordUser' => $hashedPassword,
		'credentialUser' => 2,
		'Ban' => 0,
	));
	return 1;
}

function isTheMailAlreadyUsed()
{
	$mailUser = htmlspecialchars($_POST["mail1"]);
	$bdd = dataBaseConnection();
	$statement = 'SELECT * FROM user WHERE mailUser="' . $mailUser . '"';
	$counter = 0;
	$request = $bdd->query($statement);
	while ($donnee = $request->fetch()) {
		$counter = $counter + 1;
	}
	if ($counter == 1) {
		return false;
	}
	return true;
}


function isThePseudoAlreadyUsed()
{
	$pseudoUser = htmlspecialchars($_POST["pseudo1"]);
	$bdd = dataBaseConnection();
	$statement = 'SELECT * FROM user WHERE pseudoUser="' . $pseudoUser . '"';
	$counter = 0;
	$request = $bdd->query($statement);
	while ($donnee = $request->fetch()) {
		$counter = $counter + 1;
	}
	if ($counter == 1) {
		return false;
	}
	return true;
}



function generateArrayForEmail()
{
	$arrayForMailing[0] = htmlspecialchars($_POST["mail1"]);
	$arrayForMailing[1] = htmlspecialchars($_POST["pseudo1"]);
	return $arrayForMailing;
}


function affSalonsDeDiscussions()
{
	$bdd = dataBaseConnection();

	$sqlSelectRooms = 'SELECT * FROM room';
	$queryRooms = $bdd->query($sqlSelectRooms);

	$queryUsersBelong = $bdd->prepare('SELECT * FROM belong WHERE idRoom = :idRoom');

	if ($queryRooms != false) {
		foreach ($queryRooms as $row) {
			$queryUsersBelong->bindParam(':idRoom', $row["idRoom"], PDO::PARAM_INT);
			$queryUsersBelong->execute();
			$numberOfUsers = 0;
			if ($queryUsersBelong != false) {
				$numberOfUsers = $queryUsersBelong->rowCount();
			}
			echo ("
           <div class='exempleSalon col-6'>
               <a class='linkRoom' href='?action=chatRoom&idRoom=" . $row["idRoom"] . "'><div class='nomSalon'>Salon " . $row["nameOfTheRoom"] . " >  </div></a>
            </div>
            ");
		}
	}
	$bdd = null;
}

function getRoomInfo()
{
	$bdd = dataBaseConnection();
	$idRoom = htmlspecialchars($_GET['idRoom']);
	$sqlSelectRoom = 'SELECT * FROM room WHERE idRoom = "' . $idRoom . '"';
	$queryRoom = $bdd->query($sqlSelectRoom);

	if ($queryRoom != false) {
		$row = $queryRoom->fetch();
		$bdd = null;
		return $row["nameOfTheRoom"];
	}
	$bdd = null;
	return "NoNameFound";
}

function getMessages($idRoom)
{
	$bdd = dataBaseConnection();
	$sqlSelectMessages = 'SELECT * FROM message WHERE idRoom = "' . $idRoom . '"';
	$queryMessage = $bdd->query($sqlSelectMessages);
	$queryUsersBelong = $bdd->prepare('SELECT * FROM user WHERE idUser = :idUser');
	if (isset($_SESSION['id'])) {
		$idActualUser = $_SESSION['id'];
		if ($queryMessage != false) {
			foreach ($queryMessage as $row) {

				$queryUsersBelong->bindParam(':idUser', $row["idUser"], PDO::PARAM_INT);
				$queryUsersBelong->execute();
				$rowUser = $queryUsersBelong->fetch();
				if ($row["idUser"] == $idActualUser) {
					$messageClass = 'myMessages';
					echo ("<div class='d-flex flex-row-reverse'>");
				} else {
					$messageClass = 'othersMessages';
					echo ("<div class='d-flex flex-row'>");
				}

				echo ("<div class='" . $messageClass . "'>
         	           <div class='content'>" . $row['contentOfTheMessage'] . "</div>
        	            <div class='peudo'>" . $rowUser['pseudoUser'] . $_SESSION['status'] . "</div>
        	            <div class='time'>" . $row['datetimeSendMessage'] .   "</div>");
				showDeleteButton($row['idMessage'], $idRoom);
				showBanButton($row["idUser"], $idRoom);
				echo "</div> </div>";
			}
		}
	}
}

function sendMessage($content, $idRoom, $idUser)
{
	$bdd = dataBaseConnection();
	$sqlInsertMessage = 'INSERT INTO message (idRoom, idUser, contentOfTheMessage) VALUES (?,?,?)';
	$queryInsertMessage = $bdd->prepare($sqlInsertMessage);
	$queryInsertMessage->execute([$idRoom, $idUser, $content]);
	$bdd = null;
}

function showDeleteButton($idMessage, $idRoom)
{
	if (isset($_SESSION['status']) and $_SESSION['status'] >= 2) {
		echo ("<a class='deleteMessageButton' href='?action=deleteMessage&messageId=$idMessage&idRoom=$idRoom'>Delete</a>");
	}
}
function showBanButton($idUser, $idRoom)
{
	if (isset($_SESSION['status']) and $_SESSION['status'] >= 2) {
		echo ("<a class='deleteMessageButton' href='?action=banUserRoom&userId=$idUser&idRoom=$idRoom'>  Ban</a>");
	}
}

function deleteMessage($idMessage)
{
	$bdd = dataBaseConnection();
	$queryDeleteMessage = $bdd->prepare("DELETE FROM message WHERE idMessage=:id");
	$queryDeleteMessage->bindParam(":id", $idMessage, PDO::PARAM_INT);
	$queryDeleteMessage->execute();
	$bdd = null;
}

function getAllGames()
{
	$bdd = dbConnect();
	return $bdd->query('SELECT * FROM game');
}


function selectAllThePauseInThe1MinAreaAndSendNotification($statement)
{
	$bdd = dataBaseConnection();
	$request = $bdd->prepare($statement);
	$request->execute(array());
	while ($data = $request->fetch()) {
		$varRes = should_I_Send_a_Email($data["idBreak"]);
		if ($varRes == 1 || $varRes == 2) {
			$mailUserToSendNotif = selectMailCorrespondantUser($data["idUser"]);
			$pseudoUserToSendNotif = selectPseudoCorrespondantUser($data["idUser"]);
			sendNotificationMailForBreak($mailUserToSendNotif, $pseudoUserToSendNotif);
			successIncrementNumberEmail($data["idBreak"]);
		}
	}
}

function selectMailCorrespondantUser($idUser)
{
	$bdd = dataBaseConnection();
	$request = $bdd->query('SELECT mailUser FROM user WHERE idUser=' . $idUser);
	$data = $request->fetch();
	return $data["mailUser"];
}

function selectPseudoCorrespondantUser($idUser)
{
	$bdd = dataBaseConnection();
	$request = $bdd->query('SELECT pseudoUser FROM user WHERE idUser=' . $idUser);
	$data = $request->fetch();
	return $data["pseudoUser"];
}

function sendNotificationMailForBreak($mailUser, $pseudoUserToSendNotif)
{
	$mail = new PHPMailer;
	$mail->isSMTP(); 
	$mail->SMTPDebug = 2; 
	$mail->Host = "smtp.gmail.com";
	$mail->Port = 587; // typically 587 
	$mail->SMTPSecure = 'tls'; // ssl is depracated
	$mail->SMTPAuth = true;
	$mail->Username = "geai4dai@gmail.com";
	$mail->Password = "blaAPPL313d";
	$mail->setFrom("geai4dai@gmail.com", "geai");
	$mail->addAddress($mailUser, $mailUser);
	$mail->Subject = 'C est le moment de se faire une petite pause!';
	$mail->msgHTML('Hi,'.$pseudoUserToSendNotif.'<br>
					C est le moment de faire un petit break avec TimeToBreak<br>
					<br>L equipe TimeToBreak'); // remove if you do not want to send HTML email
	$mail->AltBody = 'HTML not supported';

	$mail->send();
}

function runningMailingNotificationForBreakBegin()
{
	date_default_timezone_set('Europe/Paris');

	$nextMin = time() + 12 * 60 * 60; //decalage de 12 heures


	$date = new DateTime();

	//current time
	$var2 = strtotime('NOW');
	$date->setTimestamp($var2);
	$currentDateTime = $date->format("Y-m-d H:i:s");

	//1min later
	$var = strtotime('NOW + 1 min');
	$date->setTimestamp($var);
	$currentDateTimeIn1Min = $date->format("Y-m-d H:i:s");

	$statement = "SELECT * FROM break WHERE `datetimeBeginBreak` BETWEEN '$currentDateTime' AND '$currentDateTimeIn1Min'";
	selectAllThePauseInThe1MinAreaAndSendNotification($statement);
}

/////////////////////
function should_I_Send_a_Email($idBreak)
{
	$bdd = dataBaseConnection();
	$request = $bdd->query('SELECT * FROM mailingnotification WHERE idBreak=' . $idBreak);
	$data = $request->fetch();
	if (is_null($data['numberMail'])) {
		return 2;
	} else if ($data['numberMail'] == 1) {
		return 1;
	} else {
		return 0;
	}
}

function successIncrementNumberEmail($idBreak){
	$bdd=dataBaseConnection();
	$request=$bdd->query('SELECT * FROM mailingnotification WHERE idBreak='.$idBreak);
	$data=$request->fetch();
	if(is_null($data['numberMail'])){
		incrementByInsertingNumberEmail($idBreak);
	}
	else if($data['numberMail']==1){
		incrementByUpdatingNumberEmail($idBreak);
	}
}

function incrementByInsertingNumberEmail($idBreak)
{
	$bdd = dataBaseConnection();
	$request = $bdd->prepare('INSERT INTO mailingnotification (idBreak,numberMail) VALUES (:idBreak,:numberMail)');
	$request->execute(array(
		'idBreak' => $idBreak,
		'numberMail' => 1,
	));
}

function incrementByUpdatingNumberEmail($idBreak)
{
	$bdd = dataBaseConnection();
	$request = $bdd->prepare('UPDATE mailingnotification SET numberMail=:newNumberMail WHERE idBreak=' . $idBreak);
	$request->execute(array(
		'newNumberMail' => 2,
	));
}

////************************
function autodestructionBreakFinishedUsingDateTimeEndBreak()
{
	$bdd = dataBaseConnection();
	$request = $bdd->prepare("DELETE FROM `break` WHERE `datetimeEndBreak`<=NOW()");
	$request->execute(array());
}
