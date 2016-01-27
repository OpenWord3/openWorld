<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/png" href="<?PHP echo IMAGE."logo.png"; ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Tableau de bord OPENWORLD">
    <meta name="author" content="Serge Louis Adolphe">

    <title>Résultat(s) de votre recherche <?php echo $res_rech;?></title>

    <link href="./bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="./bootstrap/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <link href="./bootstrap/css/timeline.css" rel="stylesheet">
    <link href="./bootstrap/css/sb-admin-3.css" rel="stylesheet">
    <link href="./bootstrap/morrisjs/morris.css" rel="stylesheet">
    <link href="./bootstrap/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script src="./bootstrap/jquery/dist/jquery.min.js"></script>
    <script src="./bootstrap/js/bootstrap.min.js"></script>
    <script src="./bootstrap/metisMenu/dist/metisMenu.min.js"></script>
    <script src="./bootstrap/raphael/raphael-min.js"></script>
    <script src="./bootstrap/morrisjs/morris.min.js"></script>
    <script src="./bootstrap/js/morris-data.js"></script>
    <script src="./bootstrap/dist/js/sb-admin-2.js"></script>
    <script src="./bootstrap/js/jquery.min.js"></script>
    <link rel="stylesheet" href="<?PHP echo BOOTSTRAP ?>" />
    <script src="<?PHP echo TWEENLITE ?>"></script>
    <script src="./bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="./jquery.autocomplete.min.js"></script>    
	<script>
		$(document).ready(function() {
			$('#langages').autocomplete({
				serviceUrl: './modele/recherche_user.php',

				dataType: 'json'
			});
		});
	</script>
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo INDEX ?>"><i><img src="./bootstrap/images/logo.png" height="40" width="50"></i>OPENWORLD</i></a>
            </div>

            <div class="navbar-collapse collapse" id="bs-navbar">

                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-cogs fa-fw"></i>  <i class="fa fa-caret-down"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li class="divider"></li>
                            <li><a href="<?php echo INDEX ?>"><i class="fa fa-sign-out fa-fw"></i> Se Deconnecter</a>
                            </li>
                        </ul>
                    </li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li class="sidebar-search">
                        <div class="input-group custom-search-form">
                        <form action="<?php echo INDEX ?>?index=recherche_user" method="post" >

	                            <i class="fa fa-search"> Recherche</i><input type="text" id="langages" name="res_rech" class="form-control" placeholder="">
	                        </form>
                        </div>
                    </li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="http://mail.openworld.itinet.fr" onclick="window.open(this.href); return false;"><i class="fa fa-comments-o fa-1x"> MAIL</i></a>
                    </li>
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="http://phpmyadmin.openworld.itinet.fr" onclick="window.open(this.href); return false;"><i class="fa fa-sitemap fa-1x"> PHPMYADMIN</i></a>
                    </li>
                </ul>

                <?php 

                ?>

                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle" href="#myModalArchive"  data-toggle="modal" data-target="#myModalArchive">
                            <i class="fa fa-archive"></i>
                        </a>
                    </li>
                </ul>


                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle" href="#myModalNotifications"  data-toggle="modal" data-target="#myModalNotifications">
                            <i class="fa fa-at"></i>  <i style="color: red;"><?php echo $nb_demande; ?></i>
                        </a>
                    </li>
                </ul>
                
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle" href="#myModalMail"  data-toggle="modal" data-target="#myModalMail">
                            <i class="fa fa-star-half-o"></i>  <i style="color: red;"><?php if($nb_demande_mail > 0) {echo "<span style='color:red;'>".$nb_demande_mail."</span>";}else{echo $nb_demande_mail;} ?></i>
                        </a>
                    </li>
                </ul>

            </div>
        </nav>
		</div>

        <div id="page-wrapper-admin">
            <div class="row">
                <center>
                <div class="col-lg-12">
                    <h1 class="page-header">Résultat(s) de votre recherche <?php echo "<B>",$res_rech,"</B>";?></h1>
                </div>
                </center>
            </div>
			
            <div class="row">              

                <table class="table table-striped table-hover">
                  <thead>
                      <tr>
                        
                        <th>PSEUDO</th>
                        <th>SERVICE MAIL</th>
                        <th>SERVICE BLOG</th>
                        <th>FERMER MAIL</th>
                        <th>FERMER BLOG</th>
                      </tr>
                  </thead>
                  <tbody>
                  <?php for($x=0; $x < count($pseudo ); $x++){ ?>
                  <tr>
                    
                    <td><?php echo $pseudo[$x]; ?></td>
                    <td>
                        <?php
                            $status_mail = status_mail($id[$x]);
                            $status_blog = status_blog($id[$x]);
                            //echo $status_mail;
                         ?>
                       <form action="<?php echo INDEX ?>?index=vue_admin" method="post">
                            <input class="form-control" id="name" type="hidden" name="pseudo" value="<?php echo $pseudo[$x]; ?>" required>
                            <input type="submit" value="<?php if($status_mail != '2'){echo 'Désactiver';}else{echo 'Activer';} ?>" class="<?php if($status_mail != '2'){echo 'btn btn-warning btn-xs';}else{echo 'btn btn-success btn-xs';} ?>" 
                            name="<?php if($status_mail != '2'){echo 'desactiver_mail';}else{echo 'activer_mail';} ?>" 
                            <?php 
                                $verif_mail = mail_open($id[$x]);
                                if($verif_mail == ""){
                                    echo "disabled='disabled'";
                                } ?>>
                        </form>  
                    </td>
                    <td>
                        <?php //echo $status_blog; ?>
                        <form action="<?php echo INDEX ?>?index=vue_admin" method="post">
                            <input class="form-control" id="name" type="hidden" name="pseudo" value="<?php echo $pseudo[$x]; ?>" required>
                            <input type="submit" value="<?php if($status_blog != '2'){echo 'Désactiver';}else{echo 'Activer';} ?>" class="<?php if($status_blog != '2'){echo 'btn btn-warning btn-xs';}else{echo 'btn btn-success btn-xs';} ?>" 
                                name="<?php if($status_blog != '2'){echo 'desactiver_blog';}else{echo 'activer_blog';} ?>" 
                                <?php 
                                    $verif_blog = blog($id[$x]);
                                    if($verif_blog == "supprimer"){
                                        echo "disabled='disabled'";
                                } ?>
                            >
                        </form> 
                    </td>
                    <td>
                    <?php //echo $status_mail; ?>
                        <form action="<?php echo INDEX ?>?index=vue_admin" method="post">
                            <input class="form-control" placeholder="Le nom du client" id="name" type="hidden" name="pseudo" value="<?php echo $pseudo[$x]; ?>" required>
                            <input type="submit" value="Supprimer" class="btn btn-raised btn-danger btn-xs" name="supprimer_mail"
                               <?php 
                                    $verif_mail = mail_open($id[$x]);
                                    if($verif_mail == ""){
                                        echo "disabled='disabled'";
                                    } 
                                ?> 
                            >
                        </form> 
                    </td>
                    <td>
                    <?php //echo $status_blog; ?>
                        <form action="<?php echo INDEX ?>?index=vue_admin" method="post">
                            <input class="form-control" placeholder="Le nom du client" id="name" type="hidden" name="pseudo" value="<?php echo $pseudo[$x]; ?>" required>
                            <input type="submit" value="Supprimer" class="btn btn-raised btn-danger btn-xs" name="supprimer_blog"
                                <?php 
                                    $verif_blog = blog($id[$x]);
                                    if($verif_blog == "supprimer"){
                                        echo "disabled='disabled'";
                                    } 
                                ?>
                            >
                        </form> 
                    </td>
                  </tr>
                  <?php } ?>
                  </tbody>
                </table>


                <!-- ================================================================================================================================================================ -->






                <!-- ================================================================================================================================================================ -->

                <div class="modal fade" id="myModalMail" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    				<div class="modal-dialog">
        				<div class="modal-content">
            				<div class="modal-header">
                				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                				<h4 class="modal-title" id="myModalLabel">Demande blog star</h4>
            				</div>
            				<div class="modal-body">
                                <table class="table table-striped table-hover">
                                  <thead>
                                      <tr>                                        
                                        <th>PSEUDO</th>
                                        <th>VALIDER</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                  <?php foreach ($liste_demande_star as $result1){ ?>
                                    <tr>
                                        <td><?php echo $result1['pseudo']; ?></td>
                                        <td>
                                            <div class="<?php if($nb_ancienne_star == 0){ echo 'disabled';}?>">
                                                <a href="#<?php echo $result1['pseudo']; ?>" class="echanger" data-toggle="modal" data-target="#<?php echo $result1['pseudo']; ?>">Valider</a>
                                            </div>
                                        </td>
                                    </tr>
                                    
                                    <?php } ?>
                                  </tbody>
                                </table>            					
            				</div>
        				</div><!-- /.modal-content -->
    				</div><!-- /.modal-dialog -->
				</div><!-- /.modal -->

                <?php foreach ($liste_demande_star as $result1){ ?>
                <div class="modal fade" id="<?php echo $result1['pseudo']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="myModalLabel">Modal test</h4>
                            </div>
                            <div class="modal-body">
                                <table class="table table-striped table-hover">
                                  <thead>
                                      <tr>                                        
                                        <th>PSEUDO</th>
                                        <th>REMPLACER</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    <?php foreach ($liste_ancienne_star as $result2){ ?>
                                    <tr>
                                        <td><?php echo $result2['pseudo']; ?></td>
                                        <td>
                                            <form action="<?php echo INDEX ?>?index=vue_admin" method="post">
                                                <input class="form-control" id="name" type="hidden" name="pseudonew" value="<?php echo $result1['pseudo']; ?>" required>
                                                <input class="form-control" id="name" type="hidden" name="pseudoold" value="<?php echo $result2['pseudo']; ?>" required>
                                                <input type="submit" value="Remplacer" class="panel panel-green" name="remplacer">
                                            </form>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                  </tbody>
                                </table>
                                
                            </div>
                
                        </div><!-- /.modal-content -->
                    </div>
                </div>
                <?php } ?>
				<div class="modal fade" id="myModalNotifications" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 
				<div class="modal-dialog">
				<div class="modal-content">
				<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Ajout de domaines</h4>
				</div>
				<div class="modal-body">
					<?php
					/*
foreach($affiche_relais_demande as $result){
	echo $result['nom_domain'];
	echo $result['ip'];
	echo $result['pseudo'],"<br>";
}*/

?>
<table class="table table-striped table-hover">
                  <thead>
                      <tr>
                        <th>Nom de domaine</th>
                        <th>IP</th>
                        <th>Pseudo</th>
                        <th>choix</th>
                      </tr>
                  </thead>
                  <tbody>
                  <?php
	                  foreach($affiche_relais_demande as $result){
                  ?>
                  <tr>
                    <td>
						<?php echo $result['nom_domain']; ?>

                    </td>
                    <td>
                        <?php //echo $status_blog; ?>
							<?php echo $result['ip']; ?>
                    </td>                    
					<td>
                        <?php //echo $status_blog; ?>
							<?php echo $result['pseudo']; ?>
                    </td>
                    <td>
                    <?php //echo $status_blog; ?>
                        <form action="<?php echo INDEX ?>?index=vue_admin" method="post">
                            <input class="form-control"  id="id_relais" type="hidden" name="id_relais" value="<?php echo $result['id_relais']; ?>" required>
                            <input type="submit" value="Valider" class="panel panel-green" name="valider_relais"
                                <?php 
                                    $verif_blog = blog($result['id_utilisateur']);
                                    if($verif_blog == "supprimer"){
                                        echo "disabled='disabled'";
                                    } 
                                ?>
                            >
                        </form> 
					</td>
					<td>
						<form action="<?php echo INDEX ?>?index=vue_admin" method="post">
                            <input class="form-control"  id="id_relais" type="hidden" name="id_relais" value="<?php echo $result['id_relais']; ?>" required>
                            <input type="submit" value="refuser" class="panel panel-red" name="refuser_relais"
                                <?php 
                                    $verif_blog = blog($result['id_utilisateur']);
                                    if($verif_blog == "supprimer"){
                                        echo "disabled='disabled'";
                                    } 
                                ?>
                            >
                        </form> 
                    </td>
                  </tr>
                  <?php } ?>
                  </tbody>
                </table>
				</div>
				</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
				</div><!-- /.modal -->
			<!-- /.modal -->
        </div>

		<!-- Modal -->
			<div class="modal fade" id="myModalArchive" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
			<div class="modal-content">
			<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			<h4 class="modal-title" id="myModalLabel">Archive des utilisateurs et Indésirables</h4>
			</div>
			<div class="modal-body">
			    <?php
				while($donnees = $archive->fetch()){
					echo "Pseudo : ",$donnees['pseudo'],"<br>";
				}
				?>
			</div>
			</div><!-- /.modal-content -->
			</div><!-- /.modal-dialog -->
			</div><!-- /.modal -->
    <!--==============================================================================================================================================  -->

        <script>
            $(document).ready(function(){
              $('.echanger').on('click', function(){ 
                   $('#myModalMail').modal('hide');
              });
            });
       </script> 

    <!-- ======================================================================================================================================== -->

    <!-- jQuery -->
    <script src="./bootstrap/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="./bootstrap/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="./bootstrap/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="./bootstrap/bower_components/raphael/raphael-min.js"></script>
    <script src="./bootstrap/bower_components/morrisjs/morris.min.js"></script>
    <script src="./bootstrap/js/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="./bootstrap/dist/js/sb-admin-2.js"></script>

                        <br><center><a href="<?php echo INDEX ?>?index=vue_admin"><input class="btn btn-success " type="cancel" id="cancel" value="« RETOUR"></a></center>



</body>

</html>