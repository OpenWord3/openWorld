<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Résultat(s) de votre recherche pour <?php echo $res_rech; ?></title>
    <meta name="description" content="Page de connexion" />
    <link rel="icon" type="image/png" href="<?PHP echo IMAGE."logo.png"; ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="generator" content="Codeply">
    <link rel="stylesheet" href="<?PHP echo CONNEXION ?>" />
    <link rel="stylesheet" href="<?PHP echo BOOTSTRAP ?>" />
    <link href="./bootstrap/css/autocomplete.css" rel="stylesheet">
	<link href="./bootstrap/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script src="<?PHP echo TWEENLITE ?>"></script>
    <script src="<?PHP echo CONNECTION ?>"></script>
    <!-- jQuery -->

    <script src="./bootstrap/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="./bootstrap/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

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
							if($rech_compteur == 0){
								echo "<H2>Aucun résultat pour <B>$res_rech</B></H2>";
							}
							else {
							?>
                        <h3>Résultat(s) de votre recherche pour <?php echo "<B>",$res_rech,"</B>"; ?></h3>
                        </center>
						  <?php 
								foreach($rech as $res){
									echo $res,"<br>";
								}
							}
						  ?> 
                        </div>
                        </FONT>
 
                        <br><center><a href="<?php echo INDEX ?>?index=vue_accueil"><input class="btn btn-success " type="cancel" id="cancel" value="« RETOUR"></a></center>

                    </div>
                </div>
            </div>

	</body>
	
</html>