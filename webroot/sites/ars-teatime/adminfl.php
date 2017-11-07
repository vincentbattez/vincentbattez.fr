<?php
    session_start();
    include("php/includes/help_connexion.php");

    if(isset($_SESSION['id']))
        echo
            '
                <div class="alert alert-info alert-dismissible fade in text-center" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span> </button>
                    <strong>Vous êtes déjà connecté</strong>
                </div>
            ';
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <?php
        include_ONCE 'php/includes/head.php';
    ?>
    <meta name="description" content="Frédéric LEJEUNE - BLABLAL" />
    <title>Frédéric LEJEUNE</title>
</head>
<body id="bodyIMG">
<?php
//////////NAV
        include_ONCE 'php/includes/nav.php';
?>
        <div class="container flex-center">
            <div class="row w60">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <!--Card-->
                    <div class="card hoverable">
                    <!--Header-->
                    <div class="modal-header bg-primary">
                        <div class="text-xs-center">
                            <h3><i class="fa fa-lock"></i> Connexion</h3>
                        </div>
                    </div>
                        <div class="card-block">
                            <!--user-->
                            <form class="form" action="php/traitement/connexion.php" method="POST" enctype="multipart/form-data" role="form">
                                <div class="md-form">
                                    <i class="fa fa-user prefix"></i>
                                    <input type="text" id="user" class="form-control" name="user">
                                    <label for="user">Identifiant</label>
                                </div>
                                <!--PASSWORD-->
                                <div class="md-form">
                                    <i class="fa fa-lock prefix"></i>
                                    <input type="password" id="pwd" class="form-control" name="pwd">
                                    <label for="password">Password</label>
                                </div>

                                <!--SUBMIT-->
                                <div class="text-xs-center">
                                    <button class="btn btn-primary" id="connexion" type="submit" onclick="securisationConnexion()">Se connecter</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!--/Card-->
                </div>
            </div>
        </div>
        <?php
//////////Footer
        include_ONCE 'php/includes/footer.php';
//////////Script
        include_ONCE 'php/includes/script.php';
?>
    </body>
