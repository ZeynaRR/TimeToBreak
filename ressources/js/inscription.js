function motDePasseConforme(formulaire){
	
	
	var text  = "";
		
			if (formulaire.motdepasse.value.length < 8){
			text += "Le mot de passe est trop court.";
			}
		

		if (formulaire.motdepasse.value.search("[A-Z]") == -1) {
			text += " Il manque une majuscule.";
		}
		if (formulaire.motdepasse.value.search("[a-z]") == -1) {
			text += " Il manque une minuscule.";
		}
		if (formulaire.motdepasse.value.search("[0-9]") == -1) {
			text += " Il manque un chiffre.";
		
		}
		

document.getElementById('erreurs').innerHTML = text;

return (text.length == 0)? true:false;

}


function motDePasseCorrespondant(formulaire){
      
      var isvalide = false;     
        if(motDePasseConforme(formulaire)) {
        	isvalide = true;
            
            if (formulaire.motdepasse.value != formulaire.motdepasse2.value) {
            	
            	 document.getElementById('accept').innerHTML = 'Les mots de passe ne correspondent pas.';
            	 isvalide = false;
            }
		}
	return isvalide;
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

function affichageMotDePasse(){
    if (affichageMDP == 0) {
        affichageMDP = 1;
        show();
    } else {
        affichageMDP = 0;
        hide();
    }

}

function valideFormulaire(formulaire){
	return (motDePasseCorrespondant(formulaire));
}