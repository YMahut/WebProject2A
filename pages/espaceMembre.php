<?php
	//--------------------------------------------------------------------
	//		Espace membre
	//	Permet la gestion de son profil
	//	
	//
	//	Youri MAHUT ESIGELEC 4/11/2015
	//	
	//--------------------------------------------------------------------
?>


<!DOCTYPE html>
<html>
	<head>
		<title>Espace Membre</title>
	</head>
	<body>
		<?php include("entete.php"); 
		if(isset($_SESSION['email'])){
			include('../fonctions/formEspaceMembre.php');	
			include('../fonctions/formUpdateMembre.php');
		}
		else{
			include('../fonctions/formInscription.php');	
		}
		
		?>
	</body>
</html>

