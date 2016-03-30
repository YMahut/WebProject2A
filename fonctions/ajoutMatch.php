<?php
	//--------------------------------------------------------------------
	//		ajout de match 
	//	vérification de la completion des champs et de la non existence du match en base
	//	
	//	Youri MAHUT ESIGELEC 4/11/2015
	//	
	//--------------------------------------------------------------------
	$dateMatch=$_POST['dateMatch'];
	$lieuMatch=$_POST['lieuMatch'];
	$nomMatch=$_POST['nomMatch'];
	$heureMatch=$_POST['heureMatch'];
	
	if (empty($_POST['dateMatch']) || empty($_POST['lieuMatch']) || empty($_POST['nomMatch']) ||empty($_POST['heureMatch']))
	{
		$message = '<p>une erreur s\'est produite pendant votre identification.
		Vous devez remplir tous les champs</p>
		<p>Cliquez <a href="../pages/inscription.php">ici</a> pour revenir</p>';
	}
	else
	{
		include('interactionBdd.php'); 
		if (checkMatch(ConnectionBDD(), $nomMatch) == 1){
			$message = 'Match déjà enregistré.'; 
		}
		else 
		{
			echo idMaxMatch(connectionBDD());
			ajouterMatch(connectionBDD(), idMaxMatch(connectionBDD()), $lieuMatch, $heureMatch, $nomMatch, $dateMatch);
			$message = '<p>Match enregistré!</p>
			<p>Cliquez <a href="../pages/index.php">ici</a> 
			pour revenir à la page d accueil</p>';  
		}
	}echo $message.'</div></body></html>';
?>