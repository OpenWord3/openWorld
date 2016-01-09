<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>RESULTATS</title>
    <meta name="description" content="Page de connexion" />
    <link rel="icon" type="image/png" href="<?PHP echo IMAGE."logo.png"; ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="generator" content="Codeply">
    <link rel="stylesheet" href="<?PHP echo CONNEXION ?>" />
    <link rel="stylesheet" href="<?PHP echo BOOTSTRAP ?>" />
    <script src="<?PHP echo TWEENLITE ?>"></script>
    <script src="<?PHP echo CONNECTION ?>"></script>
    <!-- jQuery -->
    <script src="./bootstrap/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="./bootstrap/js/bootstrap.min.js"></script>

  </head>
	<body>

            <div class="container">
                <div class="row vertical-offset-100">
                    <div>
                        <div class="panel panel-default">
                        <center>
                        <font face="times new roman">
							<?php 

								if(isset($alert)){
									echo "<H2>$alert $res_rech</H2>";
								}
								else {
							?>
                        <H2>Suggestions pour : <?php echo $res_rech; ?> </H2>
                        </center>
                      <?php if(isset($recherche)){while ($donnees = $recherche->fetch()) {
	echo "Nom : ",$donnees['nom']," / "," Prenom : ",$donnees['prenom']," / "," Pseudo : ",$donnees['pseudo']," / ";echo '   <a href="http://' . $donnees['fqdn_blog'] . '">' . $donnees['fqdn_blog'] . '</a>',"<br>";	
								}}}
	?> 
                        </div>
                        </FONT>
                        <br><center><a href="<?php echo INDEX ?>?index=vue_accueil"><input class="btn btn-success " type="cancel" id="cancel" value="« RETOUR"></a></center>
                    </div>
                </div>
            </div>
	</body>
	
</html>