<?php
	//--------------------------------------------------------------------
	//		listeMembre
	//	Page reservée à l'administrateur
	//	Permet la suppression de membres.
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
				$listeMembre = getMembre(connectionBDD());
				$membre=$listeMembre->fetch_assoc();
				$listeMembre = getMembre(connectionBDD());
				if(!empty($membre)){
					echo '<form method="post" action="../fonctions/supMembre.php">';
					while($membre=$listeMembre->fetch_assoc()){
						echo '<p>'.htmlentities($membre['prenomMembre']).' | '.htmlentities($membre['nomMembre']).' | '.htmlentities($membre['mailMembre']).
						'	|    <input type= "radio" name= "membreSelectionne" value="'.$membre['idMembre'].'"/> ';
					}
					echo '<p><input type="submit" value="Supprimer le Membre"/></p>';
				}
				else
				{
					echo'Aucun Membre d\'enregistré.';
				}
			}
			else
			{
				echo "Acces non autorisé";
			}
		}
		else
		{
			echo "Acces non autorisé";
		}
		?>
	</body>
</html>
