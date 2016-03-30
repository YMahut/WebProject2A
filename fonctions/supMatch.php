<?php
	//--------------------------------------------------------------------
	//		suppression de matchs
	//	
	//	
	//	Youri MAHUT ESIGELEC 4/11/2015
	//	
	//--------------------------------------------------------------------
	include('../pages/entete.php');
	if(isset($_POST['matchSelectionne'])){
		supprimerMatch(connectionBDD(),$_POST['matchSelectionne']);
		echo "Match : ".getMatchById(connectionBDD(), $_POST['matchSelectionne'])." supprimé";
	}
	else
	{
		echo "Veuillez selectionner un match à supprimer.";
	}	
?>