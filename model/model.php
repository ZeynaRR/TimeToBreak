<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';
require("../model/db_connect.php");

//-----------------------------------------------------
function dataBaseConnection(){
	$bdd = new PDO('mysql:host=localhost;dbname=timetobreak;charset=utf8', 'root', '');
	return $bdd;
}

//-----------------------------------------------------
function getBreaksTime()
{
    $allBreaks = getAllBreaks();
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

	for($i = 0; $i < sizeof($breaksTime['begin']); $i++){
		if(strtotime($breaksTime['begin'][$i]) <= strtotime($now) && strtotime($now) <= strtotime($breaksTime['end'][$i]))
		{
		    return true;
		}
	}

	return $isBreak;
}

function isAllowed($status, $allowed)
{
	return in_array($status, $allowed);
}

function getAll() {
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



function getUserByMail(String $mail) {
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

function isDataCorrectForInscription(){
	$isItDataCorrectForInscription=true;
	if(isset($_POST["pseudo1"])==false || empty($_POST["pseudo1"])==true){
		$isItDataCorrectForInscription=false;
	}
	if(isset($_POST["mail1"])==false || empty($_POST["mail1"])==true){
		$isItDataCorrectForInscription=false;
	}
	if(isset($_POST["password1"])==false || empty($_POST["password1"])==true){
		$isItDataCorrectForInscription=false;
	}
	if(isset($_POST["password2"])==false || empty($_POST["password2"])==true){
		$isItDataCorrectForInscription=false;
	}
	if(isset($_POST["accept1"])==false || empty($_POST["accept1"])==true){
		$isItDataCorrectForInscription=false;
	}
	if($_POST["password1"]!=$_POST["password1"]){
		$isItDataCorrectForInscription=false;
	}
	return $isItDataCorrectForInscription;
}
	
function insertUserInTheDatabase(){
	$bdd = dataBaseConnection();
	$pseudoUser=htmlspecialchars($_POST["pseudo1"]);
	$mailUser=htmlspecialchars($_POST["mail1"]);
	$passwordUser=htmlspecialchars($_POST["password1"]);
		
	$hashedPassword=$res=password_hash($passwordUser,PASSWORD_DEFAULT);
		
	$request = $bdd->prepare('INSERT INTO user (pseudoUser,mailUser,passwordUser,credentialUser) VALUES (:pseudoUser,:mailUser,:passwordUser,:credentialUser)');
	$request->execute(array(
		'pseudoUser'=>$pseudoUser,
		'mailUser' => $mailUser,
		'passwordUser' => $hashedPassword,
		'credentialUser' =>1,
	));
}


//-----------------------------------------------------
function deleteById(){
	$bdd = dataBaseConnection();
	$idBreak=htmlspecialchars($_GET['idBreak']);
	$request = $bdd->prepare('DELETE FROM break WHERE idBreak=?');
	$request->execute(array($idBreak));
	header('Location:../public/index.php?action=breakList');
}

//-----------------------------------------------------
function controllerInterfaceSavingPause(){
	if(isDataCorrectForInterfaceSavingPause()){
		insertIntoDatabaseNewBreak();
	}
	else{
		header('Location:../public/index.php?action=createBreak');
	}
}
	
function isDataCorrectForInterfaceSavingPause(){
	$isDataCorrectForInterfaceSavingPause=true;
	if(isset($_POST["dateOfTheBreak"])==false || empty($_POST["dateOfTheBreak"])==true){
		$isDataCorrectForInterfaceSavingPause=false;
	}
	if(isset($_POST["beginOfTheBreak"])==false || empty($_POST["beginOfTheBreak"])==true){
		$isDataCorrectForInterfaceSavingPause=false;
	}
	if(isset($_POST["endOfTheBreak"])==false || empty($_POST["endOfTheBreak"])==true){
		$isDataCorrectForInterfaceSavingPause=false;
	}
	return $isDataCorrectForInterfaceSavingPause;
}
	
	
function insertIntoDatabaseNewBreak(){
	$bdd = dataBaseConnection();
	$datetimeBeginBreak=htmlspecialchars($_POST["dateOfTheBreak"]).' '.htmlspecialchars($_POST["beginOfTheBreak"]);
	$datetimeEndBreak=htmlspecialchars($_POST["dateOfTheBreak"]).' '.htmlspecialchars($_POST["endOfTheBreak"]);
	$datetimeLastUpdate=''.date("Y-m-d H:i:s");
	
	$nameOfTheBreak="";
	if(isset($_POST["nameOfTheBreak"])==true && !(empty($_POST["nameOfTheBreak"]))){
		$nameOfTheBreak=htmlspecialchars($_POST["nameOfTheBreak"]);
	}			
	
	$req = $bdd->prepare('INSERT INTO break(idUser, datetimeBeginBreak, datetimeEndBreak, datetimeLastUpdate, nameOfTheBreak) VALUES(:idUser, :datetimeBeginBreak, :datetimeEndBreak, :datetimeLastUpdate, :nameOfTheBreak)');
	$req->execute(array(
		'idUser'=>118218,
		'datetimeBeginBreak' => $datetimeBeginBreak,
		'datetimeEndBreak' => $datetimeEndBreak,
		'datetimeLastUpdate' =>$datetimeLastUpdate,
		'nameOfTheBreak'=>$nameOfTheBreak,
	));
	header('Location:../public/index.php?action=breakList');
}

//-----------------------------------------------------
function isDataCorrectForInterfaceUpdatingPause(){
	$isDataCorrectForInterfaceUpdatingPause=true;
	if(isset($_POST["dateOfTheBreak1"])==false || empty($_POST["dateOfTheBreak1"])==true){
		$isDataCorrectForInterfaceUpdatingPause=false;
	}
	if(isset($_POST["beginOfTheBreak1"])==false || empty($_POST["beginOfTheBreak1"])==true){
		$isDataCorrectForInterfaceUpdatingPause=false;
	}
	if(isset($_POST["endOfTheBreak1"])==false || empty($_POST["endOfTheBreak1"])==true){
		$isDataCorrectForInterfaceUpdatingPause=false;
	}
	return $isDataCorrectForInterfaceUpdatingPause;
}
	
	
	
function updateDatabaseBreak(){
	$bdd = dbConnect();
	$datetimeBeginBreak=htmlspecialchars($_POST["dateOfTheBreak1"]).' '.htmlspecialchars($_POST["beginOfTheBreak1"]);
	$datetimeEndBreak=htmlspecialchars($_POST["dateOfTheBreak1"]).' '.htmlspecialchars($_POST["endOfTheBreak1"]);
	$datetimeLastUpdate=''.date("Y-m-d H:i:s");
	
	$nameOfTheBreak="";
	if(isset($_POST["nameOfTheBreak1"])==true && !(empty($_POST["nameOfTheBreak1"]))){
		$nameOfTheBreak=htmlspecialchars($_POST["nameOfTheBreak1"]);
	}			
		
	$request = $bdd->prepare('UPDATE break SET idUser=:newIdUser, datetimeBeginBreak=:newDatetimeBeginBreak, datetimeEndBreak=:newDatetimeEndBreak, datetimeLastUpdate=:newDatetimeEndBreak, nameOfTheBreak=:newNameOfTheBreak WHERE idBreak='.htmlspecialchars($_GET['idBreak']));
	$request->execute(array(
		'newIdUser'=>118218,
		'newDatetimeBeginBreak' => $datetimeBeginBreak,
		'newDatetimeEndBreak' => $datetimeEndBreak,
		'newDatetimeLastUpdate' =>$datetimeLastUpdate,
		'newNameOfTheBreak'=>$nameOfTheBreak,
	));
}

function getAllBreaks() {
    $bdd = dbConnect();
    $breaksList = $bdd->query('SELECT * FROM break');
    return $breaksList;
}
//-------------------------------------

function isDataValidForSendingEmailToTimeToBreak(){
	$isItDataCorrectForSendingMailToTTB=true;
	if(isset($_POST["identifiant"])==false || empty($_POST["identifiant"])==true){
		$isItDataCorrectForInscription=false;
	}
	if(isset($_POST["mailUtilisateur"])==false || empty($_POST["mailUtilisateur"])==true){
		$isItDataCorrectForInscription=false;
	}
	if(isset($_POST["objet"])==false || empty($_POST["objet"])==true){
		$isItDataCorrectForInscription=false;
	}
	if(isset($_POST["Demande"])==false || empty($_POST["Demande"])==true){
		$isItDataCorrectForInscription=false;
	}
	return $isItDataCorrectForSendingMailToTTB;
}
	
function generateEmailToAdminTimeToBreak(){
	
	$mail=htmlspecialchars($_POST["mailUtilisateur"]);
	$pseudo=htmlspecialchars($_POST["identifiant"]);
	$object=htmlspecialchars($_POST["objet"]);
	$description=htmlspecialchars($_POST["Demande"]);
		
	$globalInformation=$mail.'<br>'.$description;
		
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
function generateEmailForInscriptionModerator(){
	$pseudoUser=htmlspecialchars($_POST["pseudo1"]);
	$mailUser=htmlspecialchars($_POST["mail1"]);
	$passwordUser=htmlspecialchars($_POST["password1"]);
	
	$link='http://127.0.0.1/gitTimeToBreak/TimeToBreak/public/index.php?action=codeModerator&pseudo='.$pseudoUser.'&mail='.$mailUser.'&password='.$passwordUser;
	
	$text='Bonjour. Veuillez recopier le code suivant<br>
					5194815
					<br>sur le lien suivant<br>
					<a href="'.$link.'">lien</a>
					<br> Ou si le lien ne s ouvre pas :'.$link.'<br>L equipe TimeToBreak';
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

function insertModeratorInTheDatabase(){
	$bdd = dataBaseConnection();
	$pseudoUser=htmlspecialchars($_POST["pseudo1"]);
	$mailUser=htmlspecialchars($_POST["mail1"]);
	$passwordUser=htmlspecialchars($_POST["password1"]);
		
	$hashedPassword=$res=password_hash($passwordUser,PASSWORD_DEFAULT);
		
	$request = $bdd->prepare('INSERT INTO user (pseudoUser,mailUser,passwordUser,credentialUser) VALUES (:pseudoUser,:mailUser,:passwordUser,:credentialUser)');
	$request->execute(array(
		'pseudoUser'=>$pseudoUser,
		'mailUser' => $mailUser,
		'passwordUser' => $hashedPassword,
		'credentialUser' =>2,
	));
	return 1;
}

function isTheMailAlreadyUsed(){
	$mailUser=htmlspecialchars($_POST["mail1"]);
	$bdd=dataBaseConnection();
	$statement='SELECT * FROM user WHERE mailUser="'.$mailUser.'"';
	$counter=0;
	$request= $bdd->query($statement);
	while($donnee=$request->fetch()){
		$counter=$counter+1;
	}
	if($counter==1){
		return false;
	}
	return true;
}


function isThePseudoAlreadyUsed(){
	$pseudoUser=htmlspecialchars($_POST["pseudo1"]);
	$bdd=dataBaseConnection();
	$statement='SELECT * FROM user WHERE pseudoUser="'.$pseudoUser.'"';
	$counter=0;
	$request= $bdd->query($statement);
	while($donnee=$request->fetch()){
		$counter=$counter+1;
	}
	if($counter==1){
		return false;
	}
	return true;
}



function generateArrayForEmail(){
    $arrayForMailing[0]=htmlspecialchars($_POST["mail1"]);
    $arrayForMailing[1]=htmlspecialchars($_POST["pseudo1"]);
    return $arrayForMailing;
}


function affSalonsDeDiscussions() {
    $bdd = dataBaseConnection();

    $sqlSelectRooms = 'SELECT * FROM room';
    $queryRooms = $bdd->query($sqlSelectRooms);

    $queryUsersBelong = $bdd->prepare('SELECT * FROM belong WHERE idRoom = :idRoom');

    if ($queryRooms != false){
        foreach ($queryRooms as $row) {
            $queryUsersBelong->bindParam(':idRoom',$row["idRoom"], PDO::PARAM_INT );
            $queryUsersBelong->execute();
            $numberOfUsers = 0;
            if ($queryUsersBelong != false) {
                $numberOfUsers = $queryUsersBelong->rowCount();
            }
            echo("
           <div class='exempleSalon'>
               <a href='?action=chatRoom&idRoom=". $row["idRoom"] . "'><div class='nomSalon'>Salon " . $row["nameOfTheRoom"] . " >  </div></a>
                <div class='affMembreSalon'>Membre : " . $numberOfUsers . " </div>
            </div>
            ");
        }
    }
    $bdd = null;
}

function getRoomInfo() {
    $bdd = dataBaseConnection();
    $idRoom = htmlspecialchars($_GET['idRoom']);
    $sqlSelectRoom = 'SELECT * FROM room WHERE idRoom = "'.$idRoom.'"';
    $queryRoom = $bdd->query($sqlSelectRoom);

    if ($queryRoom != false) {
        $row = $queryRoom->fetch();
        $bdd = null;
        return $row["nameOfTheRoom"];
    }
    $bdd = null;
    return "NoNameFound";
}

function getMessages($idRoom) {
    $bdd = dataBaseConnection();
    $sqlSelectMessages = 'SELECT * FROM message WHERE idRoom = "'. $idRoom .'"';
    $queryMessage = $bdd->query($sqlSelectMessages);
    $queryUsersBelong = $bdd->prepare('SELECT * FROM user WHERE idUser = :idUser');
    if (isset($_SESSION['id'])) {
		$idActualUser = $_SESSION['id'];
    		if ($queryMessage != false) {
				foreach ($queryMessage as $row) {

				$queryUsersBelong->bindParam(':idUser', $row["idUser"], PDO::PARAM_INT);
				$queryUsersBelong->execute();
				$rowUser = $queryUsersBelong->fetch();
				if ($row["idUser"] == $idActualUser)
					$messageClass = 'myMessages';
				else
					$messageClass = 'othersMessages';

				echo("<div class='" . $messageClass . "'>
         	           <div class='content'>" . $row['contentOfTheMessage'] . "</div>
        	            <div class='peudo'>" . $rowUser['pseudoUser'] . $_SESSION['status'] ."</div>
        	            <div class='time'>" . $row['datetimeSendMessage'] .   "</div>");
				showDeleteButton($row['idMessage'], $idRoom);
				showBanButton($row["idUser"], $idRoom);
				echo "</div>";

		}
	}
    }
}

function sendMessage($content, $idRoom, $idUser) {
    $bdd = dataBaseConnection();
    $sqlInsertMessage = 'INSERT INTO message (idRoom, idUser, contentOfTheMessage) VALUES (?,?,?)';
    $queryInsertMessage = $bdd->prepare($sqlInsertMessage);
    $queryInsertMessage->execute( [$idRoom, $idUser, $content]);
	$bdd = null;
}

function showDeleteButton($idMessage,$idRoom) {
	if (isset($_SESSION['status']) and $_SESSION['status']>=2) {
		echo("<a class='deleteMessageButton' href='?action=deleteMessage&messageId=$idMessage&idRoom=$idRoom'>Delete</a>");
	}
}
function showBanButton($idUser,$idRoom) {
	if (isset($_SESSION['status']) and $_SESSION['status']>=2) {
		echo("<a class='deleteMessageButton' href='?action=banUserRoom&userId=$idUser&idRoom=$idRoom'>  Ban</a>");
	}
}

function deleteMessage($idMessage) {
	$bdd = dataBaseConnection();
	$queryDeleteMessage = $bdd->prepare("DELETE FROM message WHERE idMessage=:id");
	$queryDeleteMessage->bindParam(":id", $idMessage, PDO::PARAM_INT);
	$queryDeleteMessage->execute();
	$bdd = null;
}

function getAllGames() {
    $bdd = dbConnect();
    return $bdd->query('SELECT * FROM game');
}


