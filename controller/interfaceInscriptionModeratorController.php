<?php
	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;

	require 'src/Exception.php';
	require 'src/PHPMailer.php';
	require 'src/SMTP.php';

	require("../model/model.php");
	
	$var=isDataCorrectForInscription();
	if($var==true){
		$arrayForMailing=generateArrayForEmail();
		echo $arrayForMailing[0];
		echo $arrayForMailing[1];
		generateEmail($arrayForMailing);
		echo 1;//The user have been inserted: we return 1
	}
	else{
		echo 0;//The user haven't been inserted: we return 0
	}
	
	function generateEmail($arrayForMailing){	
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
	$mail->addAddress($arrayForMailing[0], $arrayForMailing[1]);
	$mail->Subject = 'Inscription Moderateur';
	$mail->msgHTML("Bonjour. Veuillez recopier le code suivant<br>
					5194815
					<br>sur le lien suivant<br>
					<a href='http://127.0.0.1/gitTimeToBreak/TimeToBreak/public/index.php?action=codeModerator'>lien</a>
					<br> Ou si le lien ne s ouvre pas :http://127.0.0.1/gitTimeToBreak/TimeToBreak/public/index.php?action=codeModerator
					<br>L equipe TimeToBreak"); // remove if you do not want to send HTML email
	$mail->AltBody = 'HTML not supported';

	$mail->send();
}
?>