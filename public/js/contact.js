//------------AJAX------------
$(document).ready(function(){
	$("#boutonEnvoi").click(function(){
		event.preventDefault();
			
		var identifiant=$("#identifiant").val();
		var mailUtilisateur=$("#mailUtilisateur").val();
		var objet=$("#objet").val();
		var demande=$("#Demande").val();
		

		$.post( "../controller/contact.php",
		{
			mailUtilisateur:mailUtilisateur,
			identifiant:identifiant,
			objet:objet,
			Demande:demande,
		},
		function( data ) {
			if(data==0){
			 //The user haven't been inserted
			alert("Oups une erreur est survenue! Veuillez recommencer.");
			}
			else{
			 //The user have been inserted
			 alert("Votre demande a bien ete transmise a l equipe TimeToBreak. Vous allez etre redirige vers la page de connexion");
			 $(location).attr('href',"../public/index.php?action=connection");
			}
		});
	});
});