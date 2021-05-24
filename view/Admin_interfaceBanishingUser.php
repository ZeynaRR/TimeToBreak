<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Titre de la page</title>
  <link rel="stylesheet" href="../ressources/css/Admin_interfaceListingUser.css">
</head>
<body>
	<!--include a menue-->
	<!--include a header-->
	<h1>Bannir Utilisateur</h1>
	
	<section>
	<table>
		<?php
			selectSpecificUserFromDataBaseAndDisplayIt();
		?>
	</table>
	<br>
	<button>Bannir A VOIR</button>
	</section>
</body>
</html>

<?php
	function dataBaseConnection(){
		$bdd = new PDO('mysql:host=localhost;dbname=timetobreak;charset=utf8', 'root', '');
		return $bdd;
	}
	
	function selectSpecificUserFromDataBaseAndDisplayIt(){
		$bdd = dataBaseConnection();
		$request = $bdd->prepare('SELECT * FROM user');
		$request->execute(array());
		$data=$request->fetch();
		?>
			<tr>
				<td>
					Id user
				</td>
				<td>
					<?php
						echo $data["idUser"];
					?>
				</td>
			</tr>
			<tr>
				<td>
					Pseudo
				</td>
				<td>
					<?php
						echo $data["pseudoUser"];
					?>
				</td>
			</tr>
			<tr>
				<td>
					Mail
				</td>
				<td>
					<?php
						echo $data["mailUser"];
					?>
				</td>
			</tr>
			<tr>
				<td>
					Credential user
				</td>
				<td>
					<?php
						echo displayCredential($data["credentialUser"]);
					?>
				</td>
		<?php
	}
	
	function displayCredential($value){
		if($value==1){
			return "Utilisateur";
		}
		if($value==2){
			return "Moderateur";
		}
		if($value==3){
			return "Administrateur";
		}
	}
?>