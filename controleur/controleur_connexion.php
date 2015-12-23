<?php
	include("./modele/modele_connexion_bdd.php");
	include("./modele/modele_fonction.php");

	if(isset($_POST["valider"])){
		$pseudo = $_POST["pseudo"];
		$mdp = $_POST["mdp"];

		$existe = compte($pseudo);
		if($existe != 0){
			$check_mdp = mdp($pseudo);
			if($check_mdp == $mdp){
				$status = status_user($pseudo);
				if($status == "0"){
					$_SESSION["pseudo"] = $pseudo;
					$id = id($pseudo);
					$_SESSION["id"] = $id;
					$_SESSION["mdp"] = $mdp;

					$results = liste_relais($id);

					foreach($results as $cle => $result){
						$results[$cle]["nom_domain"] = nl2br(htmlspecialchars($result["nom_domain"]));
						$results[$cle]["ip"] = nl2br(htmlspecialchars($result["ip"]));
					}

					include("./vue/vue_gestion_blog.php");
				} else {
					$_SESSION["pseudo"] = $pseudo;
					$results = liste_utilisateur();

					foreach($results as $cle => $result){
						$results[$cle]["id_utilisateur"] = nl2br(htmlspecialchars($result["id_utilisateur"]));
						$results[$cle]["pseudo"] = nl2br(htmlspecialchars($result["pseudo"]));
					}					
					include("./vue/vue_admin.php");
				}
			} else {
				$alerte = "Vérifiez que vous avez entré le bon pseudo ou mot de passe.";
				include("./vue/vue_connexion.php");
			}
		} else {
			$alerte = "Vérifiez que vous avez entré le bon pseudo ou mot de passe.";
			include("./vue/vue_connexion.php");
		}
	}else{		
		include("./vue/vue_connexion.php");
		/*if(isset($_POST["envoyer"])){
			$code = $_POST["code"];
			$email = $_POST["mail"];

			if ($code === $nomimages[$nombre]) {

				$check_mail = check_mail($email);
				
				if($check_mail != 0){
					//Message de remercieemnt
					echo "<script>alert(\"Votre mot de passe a été renvoyé à votre adresse. Merci de vérifier\")</script>";

					$motdepasse = motdepasse($email);

					//Name
					$name = "OPENWORLD";

					// To
					$to = $email;

					//From
					$from = "OPENWORLD <noreply@openworld.fr>";
					 
					//Subject
					$subject = "Votre Mot de passe";
					 
					// Message 
					$message = "Suite à votre demande d'aide à la connexion sur le site OPENWORLD, nous vous informaons que votre mot de passe est : ". $motdepasse;

			        $headers = $from . "\r\n" .
			        'Reply-To: '.$from. "\r\n" .
			        'X-Mailer: PHP/' . phpversion();

					//Envoie des parametres entrés
					mail($to, $subject, $message, $from, $headers);

				} else {
					echo "<script>alert(\"Vous n'êtes pas inscrit ! Veuillez vous inscrire\")</script>";
				} 
			} else {
				echo "<script>alert(\"Code incorrect, veuillez reprendre\")</script>";
			}*/
		}
	}

?>