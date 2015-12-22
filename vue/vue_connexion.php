<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>CONNEXION</title>
    <meta name="description" content="Page de connexion" />
    <link rel="icon" type="image/png" href="<?PHP echo IMAGE."logo.png"; ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="generator" content="Codeply">
    <link rel="stylesheet" href="<?PHP echo CONNEXION ?>" />
    <link rel="stylesheet" href="<?PHP echo BOOTSTRAP ?>" />
    <script src="<?PHP echo TWEENLITE ?>"></script>
    <script src="<?PHP echo CONNECTION ?>"></script>
    <!-- jQuery -->
    <script src="./bootstrap/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="./bootstrap/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

  </head>
  <body>
            <div class="container">
                <div class="row vertical-offset-100">
                    <div class="col-md-4 col-md-offset-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">                                
                                <div class="row-fluid user-row">
                                    <img src="./bootstrap/images/Connexion.gif" width="200" height="200" class="img-responsive" alt="Conxole Admin"/>
                                </div>
                            </div>
                            <div class="panel-body">
                                <?php if(isset($_POST["valider"])){echo $alerte;} ?>
                                <form accept-charset="UTF-8" action="<?php echo INDEX ?>?index=vue_connexion" role="form" class="form-signin" method="POST">
                                    <fieldset>
                                        <label class="panel-login">
                                            <div class="login_result"></div>
                                        </label>
                                        <input class="form-control" placeholder="Votre pseudo" id="username" type="text" name="pseudo">
                                        <input class="form-control" placeholder="Votre Mot de passe" id="password" type="password" name="mdp">
                                        <br></br>
                                        <a href="#myModalMDP" data-toggle="modal" data-target="#myModalMDP"> >> mot de passe oublié ?</a>
                                        <br>
                                        <input class="btn btn-lg btn-success btn-block" type="submit" id="login" value="SE CONNECTER »" name="valider">
                                        <br>
                                        <a href="<?PHP echo INDEX ?>"><input class="btn btn-lg btn-success btn-block" type="cancel" id="cancel" value="« ANNULER"></a>
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
  </body>

  <!-- Modal -->
    <div class="modal fade" id="myModalMDP" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title" id="myModalLabel">Mot de passe oublié</h4>
    </div>
    <div class="modal-body">
        
        <form action="<?php echo INDEX ?>?index=vue_connexion" method="post">
            <center><h3>CAPTCHA</h3><br>
            <img src="./bootstrap/images/captcha.jpg"></center>
            <input class="form-control" placeholder="CODE CAPTCHA" id="code" type="text" name="code" required><BR>
            <input class="form-control" placeholder="Adresse mail de secours" id="email" type="email" name="email" required><BR>
            <input type="checkbox" required> Je ne suis pas un ordinateur
            <center><input type="submit" value="Envoyer" class="panel panel-green" name="envoyer"></center>
        </form>
    </div>
    </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
<!-- /.modal -->
</html>