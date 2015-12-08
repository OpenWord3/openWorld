<?php
	if(!isset($_SESSION)){
		session_start();
	}
	//Constante de l'index
	define("INDEX","index.php");
	//Constante pour les images
	define("IMAGE","bootstrap/images/");
	//Constantes pour bootstrap
	define("BOOTSTRAP","./bootstrap/css/bootstrap.min.css");
	define("ANIMATE","./bootstrap/css/animate.min.css");
	define("STYLES","./bootstrap/css/styles.css");
	define("IONICONS","./bootstrap/css/ionicons.min.css");
	define("SCRIPTS","./bootstrap/js/scripts.js");
	define("WOW","./bootstrap/js/wow.js");
	define("BOOTSTRAPJS","./bootstrap/js/bootstrap.min.js");
	define("JQUERYEASING","./bootstrap/js/jquery.easing.min.js");
	define("JQUERY","./bootstrap/js/jquery.min.js");

?>