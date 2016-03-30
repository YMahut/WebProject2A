<?php
	//--------------------------------------------------------------------
	//		formulaire ajout de match 
	//	
	//	
	//	Youri MAHUT ESIGELEC 4/11/2015
	//	
	//--------------------------------------------------------------------
		echo '<form method="post" action="../fonctions/ajoutMatch.php">
				<fieldset>
					<legend>Nouveau match</legend>
					<p>
						<label>Date du match: <input type="date" name="dateMatch"></label><br/>
						<label>Lieu de la rencontre <input type="text" name="lieuMatch"/></label><br/>
						<label>Equipes en jeu <input type="text" name="nomMatch"/></label><br/>
						<label>Heure du match <input type="text" name="heureMatch"/></label><br/>
						<input type="submit" value="Enregistrer"/>
					</p>
				</fieldset>
			</form>';
?>