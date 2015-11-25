<?php
	
	require_once'./configuration.php';
	require_once'./modele/connection_bbd.php';

	if(!isset($_GET['index'])){
		include("./vue/page_accueil.php");
	} else {
		include'./vue/page_test.php';
	}
?>