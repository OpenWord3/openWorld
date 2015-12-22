<!doctype html public "-//W3C//DTD HTML4.0 //EN">
<html>
<head>
		<title>page_inscription.html</title>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
		<script type="text/javascript" src="./jquery.autocomplete.min.js"></script>
</head>
<body>
<script>
    $(function() {
      $('input[id$=btnSubmit]').click(function(e) {
        var checked = $(':checkbox:checked').length;
        if (checked == 0) {
          alert('Au moins une case à cocher dois être sélectionné!');
          e.preventDefault();
        }
      });
    });
</script>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "openworld";
$test = $_POST['test'];
$hello = explode(" ", $test);
echo $hello[0];
//echo $hello[1];
/*if (!isset($hello[1])){
	$hello[1] = " ";
}
echo $hello[1];*/
	$bdd = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
	$reponse = $bdd->prepare('SELECT count(id_utilisateur) AS nbre_occurences FROM utilisateur WHERE nom like ? or prenom like ?');
	$reponse->execute(array($hello[0]."%",$hello[0]."%"));
		 
	$donnees = $reponse->fetch();
	$nbre_occurences = $donnees['nbre_occurences'];
	
	if($nbre_occurences == 0) {
		echo "Desole le membre que vous avez demande n'existe pas";
	?>
	<form action="desinscrire.php" method="post">
	<p><input type="submit" value="Retour" name="retour"></p>
	</form>
	<?php
		
	}
	
	else {
	if (isset ($hello[1])){
		echo "hello = $hello[1]";
	$reponse = $bdd->query("SELECT nom,prenom,fqdn,pseudo FROM utilisateur WHERE nom like '$hello[0]%' or prenom like '$hello[1]%'");
	echo "if";
}	
else {
	//echo "hello = $hello[1]";

	echo "else";
	$reponse = $bdd->query("SELECT nom,prenom,fqdn,pseudo FROM utilisateur WHERE nom like '$hello[0]%' or prenom like '$hello[0]%'");
	//header("Location: http://$test");
//exit;
}
	while ($donnees = $reponse->fetch()) {?>
		<form action="delete.php" method = "post" id="desinscrire">
		<input type="checkbox" id="checkbox" value="<?php echo $donnees['nom']; ?>" name = "nom[]"><?php echo "Nom : ",$donnees['nom']," / "," Prenom : ",$donnees['prenom']," / ","fqdn : ",$donnees['fqdn']," / "," Pseudo : ",$donnees['pseudo']; ?><br>
	<?php
	}
	?>
	<p><input type="submit" id="btnSubmit" value="desinscrire"></p>
	</form>
	<form action="desinscrire.php" method="post">
	<p><input type="submit" value="Retour" name="retour"></p>
	</form>
	<?php
	}
	?>

	<?php
$reponse->closeCursor();


?>
</body>
</html>