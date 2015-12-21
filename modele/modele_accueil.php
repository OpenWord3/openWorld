<?php

	if (isset($_POST['valider'])) {

		echo "string";
		//Telephone
		$telephone = $_POST['telephone'];
	
		// To
		$to = "mougnin@intechinfo.fr, sangare@intechinfo.fr, ilangovane@intechinfo.fr";

		//Name
		$name = $_POST['nom'];

		//From
		$from = "From: ".$name." <".$_POST['email'].">";
		 
		//Subject
		$subject = "Feedback OPENWORLD";
		 
		// Message 
		$message = $_POST['message']."
		Mon telephone est le ".$telephone;
		 
		// Affichage des parametres entrés
		//var_dump($_POST);
		echo "<script>alert(\"Nous vous remerions de votre intérêt ! Nous repondrons à votre mail dans de brefs delais\")</script>";

        $headers = $from . "\r\n" .
        'Reply-To: '.$from. "\r\n" .
        'X-Mailer: PHP/' . phpversion();

		//Envoie des parametres entrés
		mail($to, $subject, $message, $from, $headers);

	}

?>