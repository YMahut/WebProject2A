<?php
	//--------------------------------------------------------------------
	//		fonction d'ajout d'un trajet
	//	Parcours des post du formulaire d'ajout trajet
	//	si les champs ne sont pas vides, on ajoute le trajet en base
	//
	//	Youri MAHUT ESIGELEC 4/11/2015
	//	
	//--------------------------------------------------------------------
		
	$villeDep=$_POST['lieuDep'];
	$villeArr=$_POST['lieuArr'];
	$heureDep=$_POST['heureDep'].":".$_POST['minDep'];
	$heureArr=$_POST['heureArr'].":".$_POST['minArr'];
	$nbPlace=$_POST['nbPlace'];
	$dateDep=$_POST['dateTrajet'];
	$match=$_POST['match'];
	
	include('../pages/entete.php'); 
	

	if (empty($_POST['lieuDep']) || empty($_POST['lieuArr']) || empty($_POST['nbPlace']) ||empty($_POST['dateTrajet']))
	{
		$message = '<p>une erreur s\'est produite lors de votre ajojut de trajet.
		Vous devez remplir tous les champs</p>
		<p>Cliquez <a href="../pages/ajoutTrajet.php">ici</a> pour revenir</p>';
	}
	else
	{
		$idMatch= getMatchByName(connectionBDD(), $match);
		ajouterTrajet(connectionBDD(), idMaxTrajet(connectionBDD()), $villeDep, $villeArr, $heureDep, $heureArr, $nbPlace, $dateDep, $idMatch, getIdMembreByMail(connectionBDD(),$_SESSION['email']));
		$message = '<p>Trajet enregistré!</p>
		<p>Cliquez <a href="../pages/index.php">ici</a> 
		pour revenir à la page d accueil</p>';  
	}echo $message.'</div></body></html>';

?>