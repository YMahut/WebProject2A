<?php
//--------------------------------------------------------------------
//		page de deconnexion.php 
//	
//	Youri MAHUT ESIGELEC 4/11/2015
//	
//--------------------------------------------------------------------
	include('../pages/entete.php');
	session_destroy();


	echo '<p>Vous êtes à présent déconnecté <br />
	Cliquez <a href="../pages/index.php">ici</a> pour revenir à la page principale</p>';
	echo '</div></body></html>';
?>