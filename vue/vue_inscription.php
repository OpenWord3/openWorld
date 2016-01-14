<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>INSCRIPTION</title>
    <meta name="description" content="Page de connexion" />
    <link rel="icon" type="image/png" href="<?PHP echo IMAGE."logo.png"; ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="generator" content="Codeply">
    <link rel="stylesheet" href="<?PHP echo CONNEXION ?>" />
    <link rel="stylesheet" href="<?PHP echo BOOTSTRAP ?>" />
    <script src="<?PHP echo TWEENLITE ?>"></script>
    <script src="<?PHP echo CONNECTION ?>"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  </head>
  <body>
        <div class="container">
            <div class="row vertical-offset-100">
                <div class="col-md-4 col-md-offset-4">
                    <div class="panel panel-default">
                        <div class="panel-heading">                                
                            <div class="row-fluid user-row">
                                <img src="./bootstrap/images/Inscription.gif" width="200" height="200" class="img-responsive" alt="Conxole Admin"/>
                            </div>
                        </div>
                        <div class="panel-body">
                            <?php if(isset($_POST["valider"])){echo $alerte;} ?>
                            <form accept-charset="UTF-8" action="<?php echo INDEX ?>?index=vue_inscription" role="form" class="form-signin" method="POST">
                                <fieldset>
                                    <label class="panel-login">
                                        <div class="login_result"></div>
                                    </label>
                                    <input class="form-control" placeholder="Votre E-Mail" id="mail" type="mail" name="mail" required>
                                    <input class="form-control" placeholder="Votre pseudo" id="username" type="text" name="pseudo" required>
                                    <input class="form-control" placeholder="Votre Mot de passe" id="password" type="password" name="mdp" required>
                                    <input class="form-control" placeholder="Confirmez le mot de passe" id="passworda" type="password" name="mdp2" required>
                                    <span id="mdp" style="display:none; color:red;">Les mots de passe ne concordent pas !</span>
                                    <br>
                                    <input type="checkbox" name="verif" value="verif" required> Accepter les <a href="<?php echo INDEX ?>?index=vue_conditions">conditions</a> de OpenWorld
                                    <br></br>
                                    <input class="btn btn-lg btn-success btn-block" type="submit" id="register" value="S'INSCRIRE »" name="valider">
                                    <br>
                                     <a href="<?PHP echo INDEX ?>"><input class="btn btn-lg btn-success btn-block" type="cancel" id="cancel" value="« ANNULER"></a>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script>
        $(document).ready(function(){

            //code pour verifier le nouveau mot de passe et la verification du nouveau mot de passe
            var newMdp;
            var newMdp1;
            
            $("#password").blur(function(){
                
                $("#mdp").fadeOut();
                newMdp = $("#password").val();
                console.log("MDP "+newMdp);

                $("#passworda").blur(function(){

                    newMdp1 = $(this).val();
                    console.log("MDP2 "+newMdp1);

                    if(newMdp !== newMdp1){
                        
                        console.log(newMdp);
                        console.log(newMdp1);
                        $("#mdp").fadeIn();
                        $("#password").val("");
                        $("#passworda").val("");
                        $("#password").focus();
                    
                    } 

                });
             });   
        });
        </script>
  </body>
</html>