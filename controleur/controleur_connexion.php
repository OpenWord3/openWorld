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
	}else if(isset($_POST["envoyer"])){
		$code = $_POST["code"];
		$email = $_POST["mail"];
		$nombre = $_POST["nombre"];
		
		$nomimages[0]="Xinjecte";
		$nomimages[1]="bastoni";
		$nomimages[2]="ceNewn";
		$nomimages[3]="ftyrign";
		$nomimages[4]="Germito";
		$nomimages[5]="invesu";
		$nomimages[6]="toflo";
		$nomimages[7]="vol";
		$nomimages[8]="w68HP";
		if ($code === $nomimages[$nombre]) {
			$check_mail = check_mail($email);
			
			if($check_mail != 0){
				//Message de remercieemnt
				echo "<script>alert(\"Votre mot de passe a été renvoyé à votre adresse. Merci de vérifier\")</script>";
				$nombre=rand(0, 8);
				$nomimages[0]="Xinjecte";
				$nomimages[1]="bastoni";
				$nomimages[2]="ceNewn";
				$nomimages[3]="ftyrign";
				$nomimages[4]="Germito";
				$nomimages[5]="invesu";
				$nomimages[6]="toflo";
				$nomimages[7]="vol";
				$nomimages[8]="w68HP";
				$alerte = "";
				include("./vue/vue_connexion.php");
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
				$alerte = "Vous n'êtes pas inscrit ! Veuillez vous inscrire";
				$nombre=rand(0, 8);
				$nomimages[0]="Xinjecte";
				$nomimages[1]="bastoni";
				$nomimages[2]="ceNewn";
				$nomimages[3]="ftyrign";
				$nomimages[4]="Germito";
				$nomimages[5]="invesu";
				$nomimages[6]="toflo";
				$nomimages[7]="vol";
				$nomimages[8]="w68HP";
				include("./vue/vue_connexion.php");
			} 
		} else {
			$alerte = "Code incorrect, veuillez reprendre";
			$nombre=rand(0, 8);
			$nomimages[0]="Xinjecte";
			$nomimages[1]="bastoni";
			$nomimages[2]="ceNewn";
			$nomimages[3]="ftyrign";
			$nomimages[4]="Germito";
			$nomimages[5]="invesu";
			$nomimages[6]="toflo";
			$nomimages[7]="vol";
			$nomimages[8]="w68HP";
			include("./vue/vue_connexion.php");
		}
	} else {
		$nombre=rand(0, 8);
		$nomimages[0]="Xinjecte";
		$nomimages[1]="bastoni";
		$nomimages[2]="ceNewn";
		$nomimages[3]="ftyrign";
		$nomimages[4]="Germito";
		$nomimages[5]="invesu";
		$nomimages[6]="toflo";
		$nomimages[7]="vol";
		$nomimages[8]="w68HP";
		include("./vue/vue_connexion.php");
	}
?>