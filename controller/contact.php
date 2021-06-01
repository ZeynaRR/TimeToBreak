<?php
	
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require 'src/Exception.php';
	require 'src/PHPMailer.php';
	require 'src/SMTP.php';

	require("../model/model.php");

	if(isDataValidForSendingEmailToTimeToBreak()){
		$mail=htmlspecialchars($_POST["mailUtilisateur"]);
		$pseudo=htmlspecialchars($_POST["identifiant"]);
		generateEmailToTimeToBreak();
	}
	else{
	}

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
	
	function generateEmailToTimeToBreak(){
		
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
?>