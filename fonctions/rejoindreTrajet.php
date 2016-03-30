<?php
	//--------------------------------------------------------------------
	//		fonction rejoindre un trajet
	//	
	//	
	//
	//	Youri MAHUT ESIGELEC 4/11/2015
	//	
	//--------------------------------------------------------------------
	include('../pages/entete.php');


	if(isset($_POST['trajetSelectionne'])){
		$nouvNbPlace = getNbPlaceTrajet(connectionBDD(), $_POST['trajetSelectionne']);
		if($nouvNbPlace >= 0){
			$nouvNbPlace = $nouvNbPlace -1;
			ajouterReservation(connectionBDD(), idMaxReservation(connectionBDD()), $_POST['trajetSelectionne'], getIdMembreByMail(connectionBDD(), $_SESSION['email']));
			echo "Trajet bien enregistré, veuillez contacter ".getNameConducteur(connectionBDD(), $_POST['trajetSelectionne'])." au : 0".getTelConducteur(connectionBDD(), $_POST['trajetSelectionne']);
		}
		else
		{
			echo "Plus de place disponible pour ce trajet!";
		}
	}
	else
	{
		echo "Veuillez selectionner un trajet.";
	}	

?>