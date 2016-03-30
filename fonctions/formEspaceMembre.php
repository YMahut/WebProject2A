<?php
	//--------------------------------------------------------------------
	//		formulaire d'espace membre
	//	Attention à la réplique d'information de membre
	//	
	//	Youri MAHUT ESIGELEC 4/11/2015
	//	
	//--------------------------------------------------------------------
	unset($res);
	unset($row);
	$res =  getMembreById(connectionBDD(), getIdMembreByMail(connectionBDD(), $_SESSION['email']));
	while ($row = $res->fetch_assoc()) {
		echo 'Prenom : '.$row['prenomMembre']. '<br/>
		Nom : '. $row['nomMembre']. '<br/>
		Mail : '. $row['mailMembre']. '<br/>
		Date de naissance : '.$row['dateNaissanceMembre']. '<br/>
		Téléphone : '.$row['telephoneMembre'];
    }

?>