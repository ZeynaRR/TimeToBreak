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
	<h1>Liste des utilisateurs</h1>
	
	<section>
	<table>
		<tr>
			<td>
				Id user
			</td>
			<td>
				Pseudo
			</td>
			<td>
				Mail
			</td>
			<td>
				Credential user
			</td>
			<td>
				Bannir cet utilisateur
			</td>
		</tr>
		<?php
			selectMyUserFromDataBaseAndDisplayIt();
		?>
	</table>
	</section>
</body>
</html>

<?php
	function dataBaseConnection(){
		$bdd = new PDO('mysql:host=localhost;dbname=timetobreak;charset=utf8', 'root', '');
		return $bdd;
	}
	
	function selectMyUserFromDataBaseAndDisplayIt(){
		$bdd = dataBaseConnection();
		$request = $bdd->prepare('SELECT * FROM user');
		$request->execute(array());
		while($data=$request->fetch()){
			?>
			<tr>
				<td>
				<?php
					echo $data["idUser"];
				?>
				</td>
				<td>
				<?php
					echo $data["pseudoUser"];
				?>
				</td>
				<td>
				<?php
					echo $data["mailUser"];
				?>
				</td>
				<td>
				<?php
					echo displayCredential($data["credentialUser"]);
				?>
				</td>
				<td>
					<a href="Admin_interfaceBanishingUser.php?idUser=<?php echo $data["idUser"];?>">Bannir cet utilisateur</a>
				</td>
			</tr>
			<?php
		}
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