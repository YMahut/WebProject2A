<?php
//--------------------------------------------------------------------
//		interactionBdd 
//	Permet l'interaction avec la base de données
//	
//	Youri MAHUT ESIGELEC 4/11/2015
//	
//--------------------------------------------------------------------
	
	function connectionBDD(){
		$mysqli = new mysqli("localhost", "root", "", "crunchbdd");
		if ($mysqli->connect_errno) {
			echo "Echec lors de la connexion à MySQL : (" . $mysqli->connect_errno
			. ") " . $mysqli->connect_error;
		}
		return $mysqli;
	}
	//----------------------------------------------------------------------------------------
	//
	//	Méthodesstrajet
	//
	//-----------------------------------------------------------------------------------------
	function afficherTrajet($mysqli){
		$res=$mysqli->query("SELECT * FROM trajet");

		if(!$res){
			echo "<p>aucun resultat</p>";
		}else{
			while($tuple=$res->fetch_assoc()){
				echo '<p>'.htmlentities($tuple['idTrajet']).'</p>';
			}
		}
	}
	function ajouterTrajet($mysqli, $idTrajet, $villeDepart, $villeArrivee, $heureDepart, $heureArrivee, $nbPlace, $dateDepart, $idMatch, $idConducteur){
		$sql = 'INSERT INTO trajet VALUES ("'.$idTrajet.'","'.$villeDepart.'","'.$villeArrivee.'","'.$heureDepart.'","'.$heureArrivee.'","'.$nbPlace.'","'.$dateDepart.'","'.$idMatch.'","'.$idConducteur.'")';
		mysqli_query($mysqli, $sql);
	}
	function idMaxTrajet($mysqli){
		$res = mysqli_query($mysqli, "SELECT * FROM trajet ORDER BY idtrajet DESC LIMIT 1");
		$row = mysqli_fetch_array($res);
		$idMax=$row['idTrajet'];
		return $idMax +1;
	}
	function getTrajet($mysqli){
		$res=$mysqli->query("SELECT * FROM trajet");
		if(!$res){
			echo "<p>aucun resultat</p>";
		}else{
			return $res;
		}
	}
	function updateTrajet($mysqli, $idTrajet, $nbPlace){
		$sql = 'UPDATE trajet SET nbPlace ="'.$nbPlace.'" WHERE idTrajet ='.$idTrajet;

		mysqli_query($mysqli, $sql);
	}
	function getNbPlaceTrajet($mysqli, $idTrajet){
		$res=$mysqli->query("SELECT nbPlace FROM trajet where idTrajet=".$idTrajet);
		if(!$res){
			echo "<p>aucun resultat</p>";
		}else{
			while($tuple=$res->fetch_assoc()){
				return $tuple['nbPlace'];
			}
		}
	}
	function getTrajetMembre($mysqli, $idMembre){
		$res=$mysqli->query("SELECT * FROM trajet where idConducteur=".$idMembre);
		if(!$res){
			echo "<p>aucun resultat</p>";
		}else{
			return $res;
		}
	}

	function getTelConducteur($mysqli, $idTrajet){
		$res=$mysqli->query("SELECT idConducteur FROM trajet where idTrajet=".$idTrajet);
		if(!$res){
			echo "<p>aucun resultat</p>";
		}else{
			while($tuple=$res->fetch_assoc()){
				return getTelMembre(connectionBDD(), $tuple['idConducteur']);
			}
		}
	}

	function getNameConducteur($mysqli, $idTrajet){
		$res=$mysqli->query("SELECT idConducteur FROM trajet where idTrajet=".$idTrajet);
		if(!$res){
			echo "<p>aucun resultat</p>";
		}else{
			while($tuple=$res->fetch_assoc()){
				return getPrenomMembre(connectionBDD(), $tuple['idConducteur']);
			}
		}
	}
	function getTrajetReservationMembre($mysqli, $idMembre){
		$res=$mysqli->query("SELECT * FROM trajet WHERE idConducteur=".$idMembre);
		if(!$res){
			echo "<p>aucun resultat</p>";
		}else{
			return $res;
		}
	}

	function supprimerTrajet($mysqli, $idTrajet){
		$sql = 'DELETE FROM trajet WHERE idTrajet ='.$idTrajet;
		mysqli_query($mysqli, $sql);
	}
	//----------------------------------------------------------------------------------------
	//
	//	Méthodes Membre
	//
	//-----------------------------------------------------------------------------------------
	function afficherMembre($mysqli){
		$res=$mysqli->query("SELECT * FROM membre");
		if(!$res){
			echo "<p>aucun resultat</p>";
		}else{
			while($tuple=$res->fetch_assoc()){
				echo '<p>'.htmlentities($tuple['nomMembre']).'</p>';
			}
		}
	}

	function ajouterMembre($mysqli, $idMembre, $genreMembre, $prenomMembre, $nomMembre, $mailMembre, $mdpMembre, $dateNaissanceMembre, $telephoneMembre){
		$sql = 'INSERT INTO membre VALUES ("'.$idMembre.'","'.$genreMembre.'","'.$prenomMembre.'","'.$nomMembre.'","'.$mailMembre.'","'.$mdpMembre.'","'.$dateNaissanceMembre.'","'.$telephoneMembre.'")';
		mysqli_query($mysqli, $sql);
	}
	
	function checkMail($mysqli, $mail){
		$res=$mysqli->query("SELECT * FROM membre");
		if(!$res){
			echo "<p>aucun resultat</p>";
		}else{
			while($tuple=$res->fetch_assoc()){
				if($tuple['mailMembre'] == $mail)
					return 1;
			}
		}
	}
	function getMembreById($mysqli, $idMembre){
		$res=$mysqli->query("SELECT * FROM membre");
		if(!$res)
		{
			echo "<p>aucun resultat</p>";
		}
		else
		{
			while($tuple=$res->fetch_assoc()){
				if($tuple['idMembre'] == $idMembre);
					return $res;
			}
		}
	}

	function getIdMembreByMail($mysqli, $mail){
		$res=$mysqli->query("SELECT * FROM membre");
		if(!$res){
			echo "<p>aucun resultat</p>";
		}else
		{
			while($tuple=$res->fetch_assoc())
			{
				if($tuple['mailMembre'] == $mail)
					return $tuple['idMembre'];
			}
		}
	}
	function updateMembre($mysqli, $idMembre, $genreMembre, $prenomMembre, $nomMembre, $mailMembre, $mdpMembre, $dateNaissanceMembre, $telephoneMembre){
		$sql = 'UPDATE membre SET genreMembre ="'.$genreMembre.'",  prenomMembre="'.$prenomMembre.'", nomMembre="'.$nomMembre.'", mailMembre="'.$mailMembre.'", mdpMembre="'.$mdpMembre.'", dateNaissanceMembre="'.$dateNaissanceMembre.'", telephoneMembre="'.$telephoneMembre.'" WHERE idMembre ='.$idMembre;

		mysqli_query($mysqli, $sql);
	}
	function idMaxMembre($mysqli){
		$res = mysqli_query($mysqli, "SELECT * FROM membre ORDER BY idMembre DESC LIMIT 1");
		$row = mysqli_fetch_array($res);
		$idMax=$row['idMembre'];
		return $idMax +1;
	}
	function getTelMembre($mysqli, $id){
		$res=$mysqli->query("SELECT telephoneMembre FROM membre WHERE idMembre =".$id);
		if(!$res){
			echo "<p>aucun resultat</p>";
		}else{
			while($tuple=$res->fetch_assoc()){
			return $tuple['telephoneMembre'];
			}
		}
	}
	function getPrenomMembre($mysqli, $id){
		$res=$mysqli->query("SELECT prenomMembre FROM membre WHERE idMembre =".$id);
		if(!$res){
			echo "<p>aucun resultat</p>";
		}else{
			while($tuple=$res->fetch_assoc()){
				return $tuple['prenomMembre'];
			}
		}
	}
	function getMembre($mysqli){
		$res=$mysqli->query("SELECT * FROM membre");
		if(!$res){
			echo "<p>aucun resultat</p>";
		}else{
			return $res;
		}
	}
	function supprimerMembre($mysqli, $idMembre){
		$sql = 'DELETE FROM membre WHERE idMembre ='.$idMembre;
		mysqli_query($mysqli, $sql);
	}
	//----------------------------------------------------------------------------------------
	//
	//	Méthodes Reservation
	//
	//-----------------------------------------------------------------------------------------
	function afficherReservation($mysqli){
		$res=$mysqli->query("SELECT * FROM reservation");
		if(!$res){
			echo "<p>aucun resultat</p>";
		}else{
			while($tuple=$res->fetch_assoc()){
				echo '<p>'.htmlentities($tuple['idReservation']).'</p>';
			}
		}
	}
	function getReservation($mysqli){
		$res=$mysqli->query("SELECT * FROM reservation");
		if(!$res){
			echo "<p>aucun resultat</p>";
		}else{
			return $res;
		}
	}
	function ajouterReservation($mysqli, $idReservation, $idTrajet, $idMembre){
		$sql = 'INSERT INTO reservation VALUES ("'.$idReservation.'","'.$idTrajet.'","'.$idMembre.'")';
		mysqli_query($mysqli, $sql);
		updateTrajet(connectionBDD(), $idTrajet, getNbPlaceTrajet(connectionBDD(), $idTrajet)-1);
	}
	function supprimerReservation($mysqli, $idReservation){
		$sql = 'DELETE FROM reservation WHERE idReservation ='.$idReservation;
		mysqli_query($mysqli, $sql);
	}
	function idMaxReservation($mysqli){
		$res = mysqli_query($mysqli, "SELECT * FROM reservation ORDER BY idReservation DESC LIMIT 1");
		$row = mysqli_fetch_array($res);
		$idMax=$row['idReservation'];
		return $idMax +1;
	}
	//----------------------------------------------------------------------------------------
	//
	//	Méthodes match
	//
	//-----------------------------------------------------------------------------------------
	function afficherMatch($mysqli){
		$res=$mysqli->query("SELECT * FROM matchtab");
		if(!$res){
			echo "<p>aucun resultat</p>";
		}else{
			while($tuple=$res->fetch_assoc()){
				echo '<p>'.htmlentities($tuple['idMatch']).'</p>';
			}
		}
	}
	function ajouterMatch($mysqli, $idMatch, $lieuMatch, $heureMatch, $nomMatch, $dateMatch){

		$sql = 'INSERT INTO matchtab VALUES ("'.$idMatch.'","'.$lieuMatch.'","'.$heureMatch.'","'.$nomMatch.'","'.$dateMatch.'")';
		mysqli_query($mysqli, $sql);
	}
	
	function idMaxMatch($mysqli){
		$res = mysqli_query($mysqli, "SELECT * FROM matchtab ORDER BY idMatch DESC LIMIT 1");
		$row = mysqli_fetch_array($res);
		$idMax=$row['idMatch'];
		return $idMax +1;
	}
	function checkMatch($mysqli, $nomMatch){
		$res=$mysqli->query("SELECT * FROM matchTab");
		if(!$res){
			echo "<p>aucun resultat</p>";
		}else{
			while($tuple=$res->fetch_assoc()){
				if($tuple['nomMatch'] == $nomMatch)
					return 1;
			}
		}
	}
	function getMatch($mysqli){
		$res=$mysqli->query("SELECT * FROM matchtab");
		if(!$res){
			echo "<p>aucun resultat</p>";
		}else{
			return $res;
		}
	}
	function getMatchByName($mysqli, $matchRecherche){
		$res=$mysqli->query("SELECT * FROM matchtab");
		if(!$res){
			echo "<p>aucun resultat</p>";
		}else{
			while($tuple=$res->fetch_assoc()){
				if($tuple['nomMatch'] == $matchRecherche)
					return $tuple['idMatch'];
			}
		}
	}
	function getMatchById($mysqli, $idMatchRecherche){
		$res=$mysqli->query("SELECT * FROM matchtab");
		if(!$res){
			echo "<p>aucun resultat</p>";
		}else{
			while($tuple=$res->fetch_assoc()){
				if($tuple['idMatch'] == $idMatchRecherche)
					return $tuple['nomMatch'];
			}
		}
	}
	function supprimerMatch($mysqli, $idMatch){
		$sql = 'DELETE FROM matchTab WHERE idMatch ='.$idMatch;
		mysqli_query($mysqli, $sql);
	}
?>