<?php
	//--------------------------------------------------------------------
	//		Page de constantes
	//	
	//	Youri MAHUT ESIGELEC 4/11/2015
	//	
	//--------------------------------------------------------------------
	define('ERR_IS_CO','Vous ne pouvez pas accéder à cette page si vous n\'êtes pas connecté');

	exit('<div id="error"><p>'.$mess.'</p>
	   <p>Cliquez <a href="../pages/index.php">ici</a> pour revenir à la page d\'accueil</p></div></div></body></html>');
?>