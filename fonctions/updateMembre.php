<?php
	//--------------------------------------------------------------------
	//		update membre
	//	Permet de mettre à jour un membre dans la base selon de nouvelles entrées
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
		
		updateMembre(connectionBDD() ,getIdMembreByMail(connectionBDD(), $_SESSION['email']) , $genre, $prenom, $nom, $email, $pass, $anniversaire, $telephone);
		$message = '<p>Profil membre mis à jour! Veuillez vous reconnecter.</p>
				<p>Cliquez <a href="../pages/index.php">ici</a> 
				pour revenir à la page d accueil</p>';  
		session_destroy();

	 }
	 else
	 {
	 	$message = '<p>une erreur s\'est produite pendant votre identification.
		Les mots de passe ne correspodnent pas.</p>
		<p>Cliquez <a href="../pages/updateMembre.php">ici</a> pour revenir</p>';  
	 }
	 echo $message.'</div></body></html>';
?>