function confirmation(link)
{
	var x = confirm("Attention cette action est définitive, êtes-vous sûr·e de vouloir continuer ?");
	if(x)
		window.location.href = link;
}