<?php
	if(!isset($_SESSION)){
		session_start();
	}
	//Constante de l'index
	define("INDEX","index.php");
	//Constante pour les images
	define("IMAGE","./vue/images/");

?>