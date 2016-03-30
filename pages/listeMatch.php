<?php
	//--------------------------------------------------------------------
	//		listeMatch 
	//	Affichage de la liste des matchs, possibilité d'afficher la liste
	//	des trajets qui correspondent au match selectionné, si utilisateur connecté
	//	Si l'utilisateur connecté est l'administrateur, il peut supprimer des matchs.
	//	Youri MAHUT ESIGELEC 4/11/2015
	//	
	//--------------------------------------------------------------------
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Liste des matchs</title>
	</head>
	<body>
		<?php include("entete.php"); 

		if(isset($_SESSION['pseudo'])){
			if($_SESSION['email'] =="Admin"){
				$listeMatch = getmatch(connectionBDD());
				$match=$listeMatch->fetch_assoc();
				$listeMatch = getmatch(connectionBDD());
				if(!empty($match)){
					echo '<form method="post" action="../fonctions/supMatch.php">';
					while($match=$listeMatch->fetch_assoc()){
						echo '<p>'.htmlentities($match['dateMatch']).' | '.htmlentities($match['heureMatch']).' | '.htmlentities($match['nomMatch']).
						'	|    <input type= "radio" name= "matchSelectionne" value="'.$match['idMatch'].'"/> ';
					}
					echo '<p><input type="submit" value="Supprimer le Match"/></p>';
				}
				else
				{
					echo'Aucun match en cours.';
				}
			
			}
			else
			{
				$listeMatch = getmatch(connectionBDD());
				$match=$listeMatch->fetch_assoc();
				$listeMatch = getmatch(connectionBDD());
				if(!empty($match)){
						echo '<form method="post" action="../fonctions/notImplemented.php">';
						while($match=$listeMatch->fetch_assoc()){
							echo '<p>'.htmlentities($match['dateMatch']).' | '.htmlentities($match['heureMatch']).' | '.htmlentities($match['nomMatch']).'	|	
							<input type= "radio" name= "matchSelectionne" value="'.$match['idMatch'].'"/> ';
						}
					echo '<p><input type="submit" value="Afficher les covoiturages pour ce match"/></p>';
				}
				else
				{
					echo'Aucun match en cours.';
				}
			}
			
		}
		else{
			$listeMatch = getmatch(connectionBDD());
			$match=$listeMatch->fetch_assoc();
			$listeMatch = getmatch(connectionBDD());
			if(!empty($match)){
				while($match=$listeMatch->fetch_assoc()){
					echo '<p>'.htmlentities($match['dateMatch']).' | '.htmlentities($match['heureMatch']).' | '.htmlentities($match['nomMatch']);
				}
			}
			else
			{
				echo'Aucun match en cours.';
			}
		}
		
		?>
	</body>
</html>

