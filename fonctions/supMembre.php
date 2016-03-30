<?php
	//--------------------------------------------------------------------
	//		suppression de membre 
	//	
	//	
	//	Youri MAHUT ESIGELEC 4/11/2015
	//	
	//--------------------------------------------------------------------
	include('../pages/entete.php');
	if(isset($_POST['membreSelectionne'])){
		supprimerMembre(connectionBDD(),$_POST['membreSelectionne']);
		echo "Membre supprimé";
	}
	else
	{
		echo "Veuillez selectionner un trajet à supprimer.";
	}	
?>