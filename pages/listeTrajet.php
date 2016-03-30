<?php
	//--------------------------------------------------------------------
	//		listeTrajet
	//	Affichage des trajets proposés, possibilité de rejoindre un trajet
	//	si utilisateur connecté
	//	Youri MAHUT ESIGELEC 4/11/2015
	//	
	//--------------------------------------------------------------------
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Trajets proposés</title>
    </head>
	<body>
		<?php include('entete.php'); 
		if(isset($_SESSION['pseudo'])){
			if($_SESSION['email']=="Admin"){
				$listeTrajet = getTrajet(connectionBDD());
				$trajet=$listeTrajet->fetch_assoc();
				$listeTrajet = getTrajet(connectionBDD());
				if(!empty($trajet)){
					echo '<form method="post" action="../fonctions/supTrajet.php">';
					while($trajet=$listeTrajet->fetch_assoc()){
						$nomMatch = getMatchById(connectionBDD(), $trajet['idMatch']);
						echo '<p>'.$nomMatch.' | '.htmlentities($trajet['dateDep']).' | '.htmlentities($trajet['heureDep']).' | '.htmlentities($trajet['villeDep']).'	|'.htmlentities($trajet['nbPlace']).
						'	|    <input type= "radio" name= "trajetSelectionne" value="'.$trajet['idTrajet'].'"/> ';
					}
					echo '<p><input type="submit" value="Supprimer le trajet"/></p>';
				}
				else
				{
					echo'Aucun trajet en cours.';
				}
			}
			else
			{
				$listeTrajet = getTrajet(connectionBDD());
				$trajet=$listeTrajet->fetch_assoc();
				$listeTrajet = getTrajet(connectionBDD());
				if(!empty($trajet)){
					echo '<form method="post" action="../fonctions/rejoindreTrajet.php">';
					while($trajet=$listeTrajet->fetch_assoc()){
						$nomMatch = getMatchById(connectionBDD(), $trajet['idMatch']);
						echo '<p>'.$nomMatch.' | '.htmlentities($trajet['dateDep']).' | '.htmlentities($trajet['heureDep']).' | '.htmlentities($trajet['villeDep']).'	|'.htmlentities($trajet['nbPlace']).
						'	|    <input type= "radio" name= "trajetSelectionne" value="'.$trajet['idTrajet'].'"/> ';
					}
					echo '<p><input type="submit" value="Rejoindre le trajets trajet"/></p>';
				}
				else
				{
					echo'Aucun trajet en cours.';
				}
			}
		}
		else
		{
			$listeTrajet = getTrajet(connectionBDD());
			if(!empty($trajet)){
				while($trajet=$listeTrajet->fetch_assoc()){
						$nomMatch = getMatchById(connectionBDD(), $trajet['idMatch']);
						echo '<p>'.$nomMatch.' | '.htmlentities($trajet['dateDep']).' | '.htmlentities($trajet['heureDep']).' | '.htmlentities($trajet['villeDep']);
				}
			}
			else
			{
				echo'Aucun trajet en cours.';
			}
		}
		?>
	</body>
</html>
