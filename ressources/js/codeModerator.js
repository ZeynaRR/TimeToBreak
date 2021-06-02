//------------AJAX------------
$(document).ready(function(){
	$("#inscription").click(function(){
		event.preventDefault();
			
		var codeModerator=$("#codeModerator").val();
		if(codeModerator==5194815){
			var str = window.location.href;
			var url = new URL(str);
			var pseudo = url.searchParams.get("pseudo");
			var mail = url.searchParams.get("mail");
			var password = url.searchParams.get("password");

			$.post( "../controller/interfaceCodeModeratorController.php",
			{
				mail1:mail,
				pseudo1:pseudo,
				password1:password,

			},
			function( data ) {
				if(data==0){
				 //The user haven't been inserted
				alert("Echec");
				}
				else{
				 //The user have been inserted
				 alert("Felicititation. Vous etes inscrit en tant que moderateur");
				 //$(location).attr('href',"../public/index.php?action=codeModerator");

				}
			});
		}
		else{
			alert("Echec");
		}
	});
});