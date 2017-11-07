<!--Navbar-->
<?php
if(isset($_SESSION['login']) && !empty($_SESSION['login'])){
    echo'
    <form action="php/traitement_deconnexion.php" id="form_deconnexion" method="POST">
        <nav class="navbar navbar-dark bg-primary">
            <div class="container">
                <div class="row">
                    <div class="col-xs-10 col-sm-6 col-md-6 col-lg-6 m-t-1">
                        <div class="md-form">
                            <h2 class="h2-responsive">Bonjour '.($_SESSION['login']).'.</h2>
                        </div>
                    </div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 col-xs-offset-4 col-sm-offset-4 col-md-offset-4 col-lg-offset-4 hidden-xs">
                        <button type="submit" class="btn btn-lg red pull-right" name="submit_deconnect">Déconnexion</button>
                    </div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 visible-xs">
                        <button type="submit" class="btn btnSmall" name="submit_deconnect"><i class="fa fa-sign-out" aria-hidden="true"></i></button>
                    </div>
                </div>
            </div>
        </nav>
    </form>
    ';    
}else{
    echo'
    <form action="php/traitement_connexion.php" id="form_login" method="POST">
        <nav class="navbar navbar-dark bg-primary">
            <div class="container">
                <div class="row">
                    <div class="col-xs-5 col-sm-3 col-md-3 col-lg-3 m-t-1">
                        <!--Login validation-->
                        <div class="md-form">
                            <i class="fa fa-user prefix"></i>
                            <label for="login">Login</label>
                            <input type="text" id="login" name="login">
                        </div>
                    </div>
                    <div class="col-xs-5 col-sm-3 col-md-3 col-lg-3 m-t-1">
                        <!--Password validation-->
                        <div class="md-form">
                            <i class="fa fa-lock prefix"></i>
                            <label for="pwd">Mot de passe</label>
                            <input type="password" id="pwd" name="pwd">
                        </div>
                    </div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 col-xs-offset-4 col-sm-offset-4 col-md-offset-4 col-lg-offset-4 hidden-xs">
                        <button type="submit" class="btn btn-lg red pull-right" name="submit_connect">Connexion</button>
                    </div>
                    <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1 visible-xs">
                        <button type="submit" class="btn btnSmall" name="submit_deconnect"><i class="fa fa-sign-in" aria-hidden="true"></i></button>
                    </div>
                </div>
            </div>
        </nav>
    </form>
    '; 
}
?>
<!--/.Navbar-->