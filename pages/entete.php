
<?php
//--------------------------------------------------------------------
//		entente.php 
//	page incluse dans chaque autre page du site, gestion du bandeau supérieur
//	et de la session utilisateur
//	Youri MAHUT ESIGELEC 4/11/2015
//	
//--------------------------------------------------------------------
?>	
	<h1>Crunch Covoit'2015</h1>
	<div class="cr" ><img src="../img/logo.jpg" alt="logo">
	<meta charset="utf-8" />
	<link rel="stylesheet" href="../css/site.css">
	<p>
		<?php 
			session_start();
			if(isset($_SESSION['pseudo'])){
				if($_SESSION['email'] == "Admin"){
						echo "Bienvenue ".$_SESSION['pseudo'].'<p><a href="/web/pages/index.php"><input type="button" name="Accueil" value="Accueil"></a>
						<a href="/web/fonctions/deconnection.php"><input type="button" name="Deconnexion" value="Deconnexion"></a>
						<a href="/web/pages/ajoutTrajet.php"><input type="button" name="ajoutTrajet" value="Ajouter un trajet"></a> 
						<a href="/web/pages/listeTrajet.php"><input type="button" name="listeTrajet" value="Rechercher un trajet"></a>
						<a href="/web/pages/listeMatch.php"><input type="button" name="listeMatch" value="Liste des matchs"></a>
						<a href="/web/pages/ajoutMatch.php"><input type="button" name="listeMatch" value="Ajouter un match"></a>
						<a href="/web/pages/espaceMembre.php"><input type="button" name="espaceMembre" value="Mon espace"></a>
						<a href="/web/pages/trajetMembre.php"><input type="button" name="trajetMembre" value="Mes trajets"></a>
						<a href="/web/pages/adminBackdoor.php"><input type="button" name="admin" value="Backdoor"></a></p>';
				}
				else
				{
					echo  "Bienvenue ".$_SESSION['pseudo'].'
					<p><a href="/web/pages/index.php"><input type="button" name="Accueil" value="Accueil"></a>
					<a href="/web/fonctions/deconnection.php"><input type="button" name="Deconnexion" value="Deconnexion"></a>
					<a href="/web/pages/ajoutTrajet.php"><input type="button" name="ajoutTrajet" value="Ajouter un trajet"></a> 
					<a href="/web/pages/listeTrajet.php"><input type="button" name="listeTrajet" value="Rechercher un trajet"></a>
					<a href="/web/pages/listeMatch.php"><input type="button" name="listeMatch" value="Liste des matchs"></a>
					<a href="/web/pages/espaceMembre.php"><input type="button" name="espaceMembre" value="Mon espace"></a>
					<a href="/web/pages/trajetMembre.php"><input type="button" name="trajetMembre" value="Mes trajets"></a></p>';
				}
			}
			else
			{		include('../fonctions/formConnexion.php');
					echo 'Bienvenue visiteur  <a href="/web/pages/index.php"><input type="button" name="Accueil" value="Accueil"></a>
					<a href="/web/pages/inscription.php"><input type="button" name="Inscription/Connexion" value="Inscription/Connexion"></a>
					<a href="/web/pages/ajoutTrajet.php"><input type="button" name="ajoutTrajet" value="Ajouter un trajet"></a> 
					<a href="/web/pages/listeTrajet.php"><input type="button" name="listeTrajet" value="Rechercher un trajet"></a>
					<a href="/web/pages/listeMatch.php"><input type="button" name="listeMatch" value="Liste des matchs"></a>';
					
			}
			
			include("../fonctions/interactionBdd.php");
			
		?>
	</p>
	</div>