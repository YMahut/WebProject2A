<?php
	//--------------------------------------------------------------------
	//		inscription.php 
	//	gestion des fonctions d'inscription et de connexion
	//	permet la suppression de match/membre/trajet et l'ajout de match.
	//	gestion de la vérification de mot de passe, de la completion totale des champs
	//	
	//	Youri MAHUT ESIGELEC 4/11/2015
	//	
	//--------------------------------------------------------------------


	include('../pages/entete.php');
	$genre=$_POST['genre'];
	$nom=$_POST['nom'];
	$prenom=$_POST['prenom'];
	$anniversaire=$_POST['anniversaire'];
	$pass=md5($_POST['pass']);
	$email=$_POST['email'];
	$telephone=$_POST['telephone'];
	
	if (empty($_POST['genre']) || empty($_POST['nom']) || empty($_POST['prenom']) ||empty($_POST['anniversaire']) || empty($_POST['pass']) || empty($_POST['email']) || empty($_POST['telephone']))
	{
	    $message = '<p>une erreur s\'est produite pendant votre identification.
	Vous devez remplir tous les champs</p>
	<p>Cliquez <a href="../pages/inscription.php">ici</a> pour revenir</p>';
	}
	else if($_POST['pass'] == $_POST['pass2'])
	{
		if (checkMail(ConnectionBDD(), $email) == 1){
			$message = 'Email déjà utilisé, merci d\'en utiliser un autre.'; 
		}
		else 
		{
		
		ajouterMembre(connectionBDD(), idMaxMembre(connectionBDD()), $genre, $prenom, $nom, $email, $pass, $anniversaire, $telephone);
		 $message = '<p>Bienvenue, vous êtes maintenant inscrit sur le site!</p>
				<p>Cliquez <a href="../pages/index.php">ici</a> 
				pour revenir à la page d accueil</p>';  
		}
	 }
	 else
	 {
	 	$message = '<p>une erreur s\'est produite pendant votre identification.
		Les mots de passe ne correspodnent pas.</p>
		<p>Cliquez <a href="../pages/inscription.php">ici</a> pour revenir</p>';  
	 }
	 echo $message.'</div></body></html>';
?>