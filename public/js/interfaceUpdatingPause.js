$(document).ready(function(){
	$("#enregistrement").click(function(){
	event.preventDefault();
		
	var dateOfTheBreak=$("#dateOfTheBreak").val();
	var beginOfTheBreak=$("#beginOfTheBreak").val();
	var endOfTheBreak=$("#endOfTheBreak").val();
	var nameOfTheBreak=$("#nameOfTheBreak").val();
		 
	var currentUrl = window.location.href;
	var url = new URL(currentUrl);
	var idBreak = url.searchParams.get("idBreak");
		 
	addressController="../controller/interfaceUpdatingPauseController.php?idBreak="+idBreak;
	$.post(addressController ,
	{
		dateOfTheBreak1:dateOfTheBreak,
		beginOfTheBreak1:beginOfTheBreak,
		endOfTheBreak1:endOfTheBreak,
		nameOfTheBreak1:nameOfTheBreak,
	},
	function( data ) {
		if(data==0){
		//The break haven't been updated
		alert("Oups une erreur est survenue!");

		}
		if(data==1){
			//The break have been updated
			alert("Modification prise en compte");
			$(location).attr('href',"interfaceListingPause.php");
		}
	});
	});
});