<?php
//--------------------------------------------------------------------
//		ajoutTrajet.php
//	page d'ajout de trajet, gestion du formulaire et renvoie des données non vérifiées
//	à la page ajoutTrajet du dossier "fonctions". Necessite d'être inscrit et connecté
//	pour accéder au formulaire. Dans le cas contraire, chargement du formulaire "inscrition"
//	à la place du formulaire ajoutTrajet.
//	Youri MAHUT ESIGELEC 4/11/2015
//	
//--------------------------------------------------------------------
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Ajouter un trajet</title>
	</head>
	<body>
		
		<?php 
		include("entete.php");
			if(isset($_SESSION['pseudo'])){
				echo '<form method="post" action="../fonctions/ajoutTrajet.php">
				<fieldset>
					<legend>Ajouter un nouveau trajet</legend>
					<p>
						<label>Date du trajet: <input type="date" name="dateTrajet"></label><br/>
						<label>Heure de départ: <select name="heureDep">';
							for ($i="0"; $i < "24"; $i++){
								echo'<option value='.$i.'>'.$i.'</option>';
		
							}
							echo' : </select></td>
							<select name="minDep">';
							for ($i="0"; $i < "60"; $i++){
								echo' <option value='.$i.'>'.$i.'</option>';
		
							}
							echo'</select></td> <br/>
						<label>Lieu de départ: <input type="text" name="lieuDep"/></label><br/>
						<label>Heure d\'arrivée: <select name="heureArr">';
							for ($i="0"; $i < "24"; $i++){
								echo'<option value='.$i.'>'.$i.'</option>';
		
							}
							echo' : </select></td>
							<select name="minArr">';
							for ($i="0"; $i < "60"; $i++){
								echo' <option value='.$i.'>'.$i.'</option>';
		
							}
							echo'</select></td> <br/>
						<label>Lieu d\'arrivée: <input type="text" name="lieuArr"/></label><br/>
						<label>Nombre de places: <select name="nbPlace">';
							for ($i="0"; $i < "5"; $i++){
								echo'<option value='.$i.'>'.$i.'</option>';
		
							}
							echo' : </select></td><br/>
						<label>Match: <select name="match">';
							$listeMatch = getmatch(connectionBDD());
							while($match=$listeMatch->fetch_assoc()){
									echo'<option value='.htmlentities($match['nomMatch']).'>'.htmlentities($match['nomMatch']).'</option>';
								}
							echo' : </select></td><br/>					
						<input type="submit" value="Poster le trajet"/>
					</p>
				</fieldset>';
			}
			else{
				echo "<script>alert(\"Vous devez être inscrit et connecté pour atteindre cette page.\")</script>";
				include("../fonctions/formConnexion.php");
				include("../fonctions/formInscription.php");
			}
		?>

	</body>
</html>