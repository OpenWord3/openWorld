<?php
	require_once'configuration.php';

	if(!isset($_GET["index"])){
		include('./vue/vue_accueil.php');
	} else {
		include("./vue/vue_test.php");

	}
?>
