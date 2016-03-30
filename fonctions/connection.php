<?php

	//--------------------------------------------------------------------
	//		Fonction de connexion
	//	
	//	
	//	Youri MAHUT ESIGELEC 4/11/2015
	//	
	//--------------------------------------------------------------------
	include('../pages/entete.php');
	$co=connectionBDD();

	$message='';
	if (empty($_POST['email']) || empty($_POST['password']) )
	{
	    $message = '<p>Veuillez remplir tous les champs!</p>
	<p>Cliquez <a href="../pages/inscription.php">ici</a> pour revenir</p>';
	}
	else
	{
		$email=$_POST['email'];
		$sql = ('SELECT * FROM membre WHERE mailMembre = "'.$email.'"' );
		$res = $co->query($sql);

		if(!$res)
		{
			echo "<p>aucun resultat</p>";
		}
		else
		{	
		    $data=$res->fetch_assoc();
			if ($data['mdpMembre'] == md5($_POST['password'])) // Acces OK !
			{
			    $_SESSION['pseudo'] = $data['prenomMembre'];
			    $_SESSION['email'] = $data['mailMembre'];
			    $_SESSION['id'] = $data['idMembre'];
			    
				header('Location: ../pages/index.php');

			}
			else // Acces pas OK !
			{
			    $message = '<p>Une erreur s\'est produite 
			    pendant votre identification.<br /> Le mail et le mot de passe ne correspondent pas.</p><p>Cliquez <a href="../pages/inscription.php">ici</a> 
			    pour revenir à la page précédente
			    <br /><br />Cliquez <a href="../pages/index.php">ici</a> 
			    pour revenir à la page d accueil</p>';
			}
		}
	}
	echo $message.'</div></body></html>';

?>