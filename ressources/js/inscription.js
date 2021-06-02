function motDePasseConforme(formulaire) {


	var text = "";

	const valeurMDP = formulaire.motdepasse.value;

	if (valeurMDP.length < 8) {
		text += "Le mot de passe est trop court." + "<br>" + "Il doit contenir au moins 8 caractères avec une majuscule, un chiffre et un caractère spécial." + "<br>";
	}

	else if (valeurMDP.search("[A-Z]") == -1) {
		text += " Il manque une majuscule." + "<br>";
	}
	else if (valeurMDP.search("[a-z]") == -1) {
		text += " Il manque une minuscule." + "<br>";
	}
	else if (valeurMDP.search("[0-9]") == -1) {
		text += " Il manque un chiffre." + "<br>";

	}
	else if (valeurMDP.search("[?+.*&!,$/:^]") == -1) {
		text += " Il manque un caractère spécial." + "<br>";
	}
	else if (valeurMDP.search("[ ]") != -1) {
		text += " Votre mot de passe ne doit pas contenir d'espace." + "<br>";
	}


	document.getElementById('erreurs').innerHTML = text;

	return (text.length == 0) ? true : false;

}

function show() {
	var mdp = document.getElementById('motdepasse');
	mdp.setAttribute('type', 'text');
	var mdp2 = document.getElementById('motdepasse2');
	mdp2.setAttribute('type', 'text');
}

function hide() {
	var mdp = document.getElementById('motdepasse');
	mdp.setAttribute('type', 'password');
	var mdp2 = document.getElementById('motdepasse2');
	mdp2.setAttribute('type', 'password');
}

var affichageMDP = 0;
function affichageMotDePasse() {
	if (affichageMDP == 0) {
		affichageMDP = 1;
		show();
	} else {
		affichageMDP = 0;
		hide();
	}

}


function motDePasseCorrespondant(formulaire) {

	var isvalide = false;
	if (motDePasseConforme(formulaire)) {
		isvalide = true;

		if (formulaire.motdepasse.value != formulaire.motdepasse2.value) {

			text = 'Les mots de passe ne correspondent pas.';
			isvalide = false;
		}
		else{
			text = "";
		}
	}
	document.getElementById('warning').innerHTML = text;
	return isvalide;
}

function valideFormulaire(formulaire) {
	return (motDePasseCorrespondant(formulaire));
}


//------------AJAX------------
$(document).ready(function(){
	$("#inscription").click(function(){
		event.preventDefault();
			
		var mail=$("#mail").val();
		var pseudo=$("#pseudo").val();
		var password_1=$("#motdepasse").val();
		var password_2=$("#motdepasse2").val();
		var accept=$("#accept").val();
		$.post( "../controller/interfaceInscriptionController.php",
		{
			mail1:mail,
			pseudo1:pseudo,
			password1:password_1,
			password2:password_2,
			accept1:accept,
		},
		function( data ) {
			if(data==0){
			 //The user haven't been inserted
			alert("Oups une erreur est survenue!");
			}
			if(data==1){
			 //The user have been inserted
			 alert("Felicitation !!! Vous avez bien ete inscrit");
			 $(location).attr('href',"../public/index.php?action=connection");

			}
		});
	});
});