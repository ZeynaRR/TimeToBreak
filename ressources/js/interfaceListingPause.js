function deleteByIdBreak(value){
	event.preventDefault();
	var pauseToDelete=confirm('Attention! Voulez-vous vraiment supprimer cette pause');
	if(pauseToDelete){
		var addressToDelete="../controller/interfaceDeletingPauseController.php?idBreak="+value;
		$(location).attr('href',addressToDelete);
	}
}