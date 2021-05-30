<?php
	$var=isDataCorrectForInscription();
	if($var==true){
		insertUserInTheDatabase();
		echo 1;//The user have been inserted: we return 1
	}
	else{
		echo 0;//The user haven't been inserted: we return 0
	}
?>

<?php	
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
	
	function dataBaseConnection(){
		$bdd = new PDO('mysql:host=localhost;dbname=timetobreak;charset=utf8', 'root', 'Tinpl127.0.0.1');
		return $bdd;
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
?>