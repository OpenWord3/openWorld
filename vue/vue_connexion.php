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
    <script src="<?PHP echo JQUERYSCRIPT ?>"></script>
    <script src="<?PHP echo CONNECTION ?>"></script>
  </head>
  <body>
            <div class="container">
                <div class="row vertical-offset-100">
                    <div class="col-md-4 col-md-offset-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">                                
                                <div class="row-fluid user-row">
                                    <img src="./bootstrap/images/ronds.gif" width="150" height="150" class="img-responsive" alt="Conxole Admin"/>
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
</html>