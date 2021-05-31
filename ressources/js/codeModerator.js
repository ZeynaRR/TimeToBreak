//------------AJAX------------
$(document).ready(function(){
	$("#inscription").click(function(){
		event.preventDefault();
			
		var codeModerator=$("#codeModerator").val();
		alert(codeModerator);
		/*
		$.post( "../controller/interfaceInscriptionModeratorController.php",
		{
			mail1:mail,
			pseudo1:pseudo,
			password1:password_1,
			password2:password_2,
			accept1:accept,
		},
		function( data ) {
			alert(data)
			if(data==0){
			 //The user haven't been inserted
			alert("Oups une erreur est survenue!");
			}
			else{
			 //The user have been inserted
			 alert("Un code vous a ete envoye a l adresse mail indique pour finaliser votre inscription");
			 //$(location).attr('href',"../public/index.php?action=codeModerator");

			}
		});
		*/
	});
});