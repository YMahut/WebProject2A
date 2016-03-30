<?php
	//--------------------------------------------------------------------
	//		suppression de trajet 
	//	
	//	
	//	Youri MAHUT ESIGELEC 4/11/2015
	//	
	//--------------------------------------------------------------------
	if(isset($_POST['trajetSelectionne'])){
		supprimerTrajet(connectionBDD(), $_POST['trajetSelectionne']);;
		echo "Trajet supprimé";
	else
	{
		echo "Veuillez selectionner un trajet.";
	}	
?>