<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/png" href="<?PHP echo IMAGE."logo.png"; ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Tableau de bord OPENWORLD">
    <meta name="author" content="Serge Louis Adolphe">

    <title>Tableau de bord OPENWORLD</title>

    <link href="./bootstrap/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="./bootstrap/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
    <link href="./bootstrap/dist/css/timeline.css" rel="stylesheet">
    <link href="./bootstrap/dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="./bootstrap/bower_components/morrisjs/morris.css" rel="stylesheet">
    <link href="./bootstrap/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

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
                <a class="navbar-brand" href="<?php echo INDEX ?>">OPENWORLD</a>
            </div>

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="<?php echo INDEX ?>?index=vue_gestion_profil"><i class="fa fa-user fa-fw"></i> Gérer son profil</a>
                        </li>
                        <li><a href="<?php echo INDEX ?>?index=vue_parametres"><i class="fa fa-gear fa-fw"></i> Paramètres</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?php echo INDEX ?>"><i class="fa fa-sign-out fa-fw"></i> Se Deconnecter</a>
                        </li>
                    </ul>
                </li>
            </ul>

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Recherche...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                        </li>

                        <li>
                            <a href="<?php echo INDEX ?>?index=vue_gestion_blog"><i class="fa fa-youtube-play fa-fw"></i> Gérer son blog</a>
                        </li>
                        
                        <li>
                            <a href="#"><i class="fa fa-comments fa-fw"></i> Gérer son service mail<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="<?php echo INDEX ?>?index=vue_gestion_relais">Gérer les relais</a>
                                </li>

                                <li>
                                    <a href="<?php echo INDEX ?>?index=vue_gestion_mail">Gérer son compte mail</a>
                                </li>
                            </ul>
                        </li>
                        
                        <li>
                            <a href="<?php echo INDEX ?>?index=vue_gestion_timeline"><i class="fa fa-table fa-fw"></i> Gérer sa timeline</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Bienvenue <?php echo $_SESSION["pseudo"];?></h1>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-plus fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                </div>
                            </div>
                        </div>
                        <a href="#myModalAjout" data-toggle="modal" data-target="#myModalAjout">
                            <?php if(isset($_POST["ajouter"])){echo $alerte;} ?>
                            <div class="panel-footer">
                                <span class="pull-left">Ajouter un domaine</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-trash fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                </div>
                            </div>
                        </div>
                        <a href="#myModalSuppr" data-toggle="modal" data-target="#myModalSuppr">
                            <?php if(isset($_POST["supprimer"])){echo $alerte;} ?>
                            <div class="panel-footer">
                                <span class="pull-left">Supprimer un domaine</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

            <ol>
                Pour ajouter un domaine, entrez l'adresse IP.
            </ol>
            <ol>
                La suppression du domaine est définitive. Vous devez entrer une adresse IP.
            </ol>

            <!-- Modal -->
				<div class="modal fade" id="myModalAjout" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
				<div class="modal-content">
				<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Ajout de domaine</h4>
				</div>
				<div class="modal-body">
					<form action="<?php echo INDEX ?>?index=vue_gestion_relais" method="post">
                        <input type="textbox" placeholder="Entrer le nom de domaine" class="form-control" name="domain" required>
						<input type="textbox" placeholder="Entrer l'adresse IP" class="form-control" name="ip" required>
						<center><input type="submit" value="Ajouter" class="panel panel-green" name="ajouter"><input type="button" value="Annuler" class="panel panel-red" class="close" data-dismiss="modal" aria-hidden="true"></center>
					</form>
				</div>
				</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
				</div><!-- /.modal -->

				<div class="modal fade" id="myModalSuppr" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
				<div class="modal-content">
				<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Suppression de domaine</h4>
				</div>
				<div class="modal-body">
					<form action="<?php echo INDEX ?>?index=vue_gestion_relais" method="post">
						<input type="textbox" placeholder="Entrer le nom de domaine" class="form-control" name="domain" required>
						<center><input type="submit" value="Supprimer" class="panel panel-green" name="supprimer"><input type="button" value="Annuler" class="panel panel-red" class="close" data-dismiss="modal" aria-hidden="true"></center>
					</form>
				</div>
				</div><!-- /.modal-content -->
				</div><!-- /.modal-dialog -->
				</div>

                <!-- ======================================================================================================================================================================= -->

                <table class="table table-striped table-hover ">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>NOM DE DOMAINE</th>
                    <th>ADRESSE IP</th>
                    <th>DECISION</th>
                    <th class="danger">FERMER</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php foreach($results as $result){ ?>
                  <tr>
                    <td>1</td>
                    <td><?php echo $result['nom_domain']; ?></td>
                    <td><?php echo $result['ip']; ?></td>
                    <td>
                        <?php
                            $status_relais = status_relais($result['nom_domain']);
                            echo $status_relais;
                         ?>
                         <form action="<?php echo INDEX ?>?index=vue_gestion_relais" method="post">
                            <input class="form-control" id="name" type="hidden" name="domain" value="<?php echo $result['nom_domain']; ?>" required>
                            <input type="submit" value="<?php if($status_relais != '0'){echo 'Désactiver';}else{echo 'Activer';} ?>" class="panel panel-green" 
                            name="<?php if($status_relais != '0'){echo 'desactiver_relais';}else{echo 'activer_relais';} ?>">
                        </form>
                    </td>
                    <td>
                       <form action="<?php echo INDEX ?>?index=vue_admin" method="post">
                            <input class="form-control" placeholder="Le nom du client" id="name" type="hidden" name="domain" value="<?php echo $result['nom_domain']; ?>" required>
                            <input type="submit" value="Supprimer" class="panel panel-green" name="supprimer">
                        </form> 
                    </td>
                  </tr>
                  <?php } ?>                  
                  </tbody>
                </table>

                <!-- ======================================================================================================================================================================= -->



			<!-- /.modal -->

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

</body>

</html>
