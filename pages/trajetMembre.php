<?php
	//--------------------------------------------------------------------
	//		trajets d'un membre
	//	affiche la liste des trajets effectués par le membre connecté
	//	
	//	Youri MAHUT ESIGELEC 4/11/2015
	//	
	//--------------------------------------------------------------------
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Historique des trajets</title>
    </head>
	<body>
		<?php include('entete.php'); 
			$conducteur = getTrajetMembre(connectionBDD(), getIdMembreByMail(connectionBDD(), $_SESSION['email']));
			$passager = getTrajetReservationMembre(connectionBDD(), getIdMembreByMail(connectionBDD(), $_SESSION['email']));

			echo '<h2>Conducteur</h2>';
			if(isset($passager)){
				echo 'Vous n\'avez pris personne dans votre voiture.';
			}else{
				while($tuple=$conducteur->fetch_assoc()){
					echo $tuple['villeDep']. '	|	'.$tuple['dateDep'].'<br/>';
				}
			}

			echo '<h2>Passager</h2>';
			if(isset($passager)){
				echo 'Vous n\'avez voyagé avec personne.';
			}
			else
			{
				while($tuple=$passager->fetch_assoc()){
					echo $tuple['villeDep']. '	|	'.$tuple['dateDep'].'<br/>';
				}
			}
			

			

		?>
	</body>
</html>
