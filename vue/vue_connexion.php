<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>YO MON POTE</title>
    <meta name="description" content="Page de connexion" />
    <link rel="icon" type="image/png" href="<?PHP echo IMAGE."logo.png"; ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="generator" content="Codeply">
    <link rel="stylesheet" href="<?PHP echo CONNEXION ?>" />
    <script src="<?PHP echo TWEELINE ?>"></script>
    <script src="<?PHP echo CONNECTION ?>"></script>
  </head>
  <body>
            <div class="container">
                <div class="row vertical-offset-100">
                    <div class="col-md-4 col-md-offset-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">                                
                                <div class="row-fluid user-row">
                                    <img src="./bootstrap/images/profile.png" class="img-responsive" alt="Conxole Admin"/>
                                </div>
                            </div>
                            <div class="panel-body">
                                <form accept-charset="UTF-8" role="form" class="form-signin">
                                    <fieldset>
                                        <label class="panel-login">
                                            <div class="login_result"></div>
                                        </label>
                                        <input class="form-control" placeholder="Username" id="username" type="text">
                                        <input class="form-control" placeholder="Password" id="password" type="password">
                                        <br></br>
                                        <input class="btn btn-lg btn-success btn-block" type="submit" id="login" value="Login »">
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
  </body>
</html>