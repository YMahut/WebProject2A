<?php
	//--------------------------------------------------------------------
	//		Formulaire d'update de membre
	//	formulaire inscription avec redirection vers traitement d'update
	//	
	//	Youri MAHUT ESIGELEC 4/11/2015
	//	
	//--------------------------------------------------------------------
		if (!isset($_SESSION['pseudo'])) {
			include('../fonctions/formConnexion.php');	
			include('../fonctions/formInscription.php');	
		}
		else
		{
			
			echo '<form method="post" action="../fonctions/updateMembre.php">
				<fieldset>
					<legend>Mettre à jour le profil</legend>
					<p>
						<input type= "radio" name="genre" value="Homme"> Homme
						<input type= "radio" name="genre" value="Femme"> Femme<br/>
						<label>Nom <input type="text" name="nom"/></label><br/>
						<label>Prénom <input type="text" name="prenom"/></label><br/>
						<label>Date de naissance: <input type="date" name="anniversaire"></label><br/>
						<label>Mot de passe: <input type="password" name="pass"/></label><br/>
						<label>Confirmation du mot de passe: <input type="password" name="pass2"/></label><br/>
						<label>Adresse e-mail: <input type="text" name="email"/></label><br/>
						<label>Téléphone: <input type="telephone" name="telephone" pattern="^((\+\d{1,3}(-| )?\(?\d\)?(-| )?\d{1,5})|(\(?\d{2,6}\)?))(-| )?(\d{3,4})(-| )?(\d{4})(( x| ext)\d{1,5}){0,1}$"></label><br/>
						<input type="submit" value="Mettre à jour"/>
					</p>
				</fieldset></form>';
		}
?>