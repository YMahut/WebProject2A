<?php
	//--------------------------------------------------------------------
	//		ajoutMatch.php 
	//	page d'ajout de match, inclusion de l'entête et suivant l'état de connexion 
	//	soit le formulaire d'ajout de match, soit le formulaire d'inscription / connexion
	//	Youri MAHUT ESIGELEC 4/11/2015
	//	
	//--------------------------------------------------------------------
?>	
<!DOCTYPE html>
<html>
	<head>
		<title>Ajouter un match</title>
	</head>
	<body>
		<?php include("entete.php"); 

		if(isset($_SESSION['pseudo'])){
			include('../fonctions/formAjoutMatch.php');
		}
		else
		{
			include("../fonctions/formInscription.php");
		}
		?>
	</body>
</html>

