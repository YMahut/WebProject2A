<?php
	//--------------------------------------------------------------------
	//		adminBackdoor.php 
	//	page réservée à l'utilisateur connecté en mode administrateur
	//	permet la suppression de match/membre/trajet et l'ajout de match.
	//	Youri MAHUT ESIGELEC 4/11/2015
	//	
	//--------------------------------------------------------------------
?>	
<!DOCTYPE html>
<html>
	<head>
		<title>Page d'administration</title>
    </head>
	<body>
		<?php include("entete.php"); 
		echo '	<a href="../pages/listeMatch.php"><input type="button" name="Accueil" value="Supprimer Match"></a>
				<a href="../pages/listeMembre.php"><input type="button" name="Deconnexion" value="Supprimer membre"></a>
				<a href="../pages/listeTrajet.php"><input type="button" name="ajoutTrajet" value="Supprimer Trajet"></a> 
				<a href="../pages/ajoutMatch.php"><input type="button" name="listeTrajet" value="Ajouter Match"></a>'
		?>
		<footer>
			<?php include("footer.php"); ?>
		</footer>
	</body>
</html>
