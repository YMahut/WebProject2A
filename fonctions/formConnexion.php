<?php
	//--------------------------------------------------------------------
	//		formulaire de connexion 
	//	
	//	
	//	Youri MAHUT ESIGELEC 4/11/2015
	//	
	//--------------------------------------------------------------------
	echo '<form method="post" action="../fonctions/connection.php">
	<fieldset>
		<legend>Connexion</legend>
		<p>
			<label for="pseudo">Email :</label><input name="email" type="text" id="email" /><br />
			<label for="password">Mot de Passe :</label><input type="password" name="password" id="password" />
			<p><input type="submit" value="Connexion" /></p></form>
		</p>
	</fieldset>
	</form>';
?>