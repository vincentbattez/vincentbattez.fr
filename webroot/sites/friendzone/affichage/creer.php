<?php
// La page du formulaire de création d'un compte.
// Le formulaire sera envoyé vers ../traitement/creercompte.php
session_start();
    if(isset($_SESSION['id']))
	   header("Location:mur.php?id=$_SESSION[id]");
include("../divers/connexion.php");
include("../divers/balises.php");
include("entete.php");


// Il faut faire des requêtes pour afficher ses amis, les attentes, les gens qu'on a invités qui ont pas répondu etc..
// Elles sont listées ci-dessous
// Connaitre ses amis : 
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta name="description" content="FriendZone - S'inscrire" />
    <title>FriendZone - S'inscrire</title>
    <?php include_ONCE '../divers/head.php'; ?> <!--HEAD META....-->
</head>
<body id="bodyIMG">
<div class="container flex-center">
    <div class="row w60">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <!--Card-->
            <div class="card hoverable">
                <div class="modal-header bg-primary">
                    <div class="text-xs-center">
                        <h3><i class="fa fa-lock"></i> S'inscrire</h3>
                    </div>
                </div>
                <div class="card-block">
                    <!--Header-->
                    <form class="form" action="../traitement/creercompte.php" method="POST" enctype="multipart/form-data" role="form">
                    <!--PRENOM-->
                        <div class="md-form">
                            <input type="text" id="prenom" class="form-control" name="prenom">
                            <label for="prenom">Prénom*</label>
                        </div>
                    <!--NOM-->
                        <div class="md-form">
                            <input type="text" id="nom" class="form-control" name="nom">
                            <label for="nom">Nom*</label>
                        </div>
                    <!--LOGIN-->
                        <div class="md-form">
                            <i class="fa fa-user prefix"></i>
                            <input type="text" id="login" class="form-control" name="login">
                            <label for="login">Login*</label>
                        </div>
                        <!--PASSWORD-->
                        <div class="md-form">
                            <i class="fa fa-lock prefix"></i>
                            <input type="password" id="pwd" class="form-control" name="pwd">
                            <label for="pwd">Password*</label>
                        </div>
                        <!--PASSWORD CONFIRM-->
                        <div class="md-form">
                            <i class="fa fa-lock prefix"></i>
                            <input type="password" id="pwdconfirm" class="form-control" name="pwdconfirm">
                            <label for="pwdconfirm">Confirmer votre mot de passe*</label>
                        </div>
                        <!--SUBMIT-->
                        <div class="text-xs-center">
                            <button class="btn btn-primary" type="submit" id="inscription">S'inscrire</button>
                        </div>
                    </form>
                </div>
                <?php
                if(!isset($_SESSION['id']))
                echo
                    '
                    <div class="modal-footer">
                        <div class="options">
                            <p><a href="login.php">Se connecter</a></p>
                        </div>
                    </div>
                    ';
                ?>
                <!--Footer-->
            </div>    
            <!--/Card-->
        </div>
    </div>
</div>



<?php
//$texte = 'toto ';
//htmlentities(nice_whitespaces($texte));
//echo $texte;

include("pied.php");
?>

<!--<script>-->

<!--//----------------------------------------------------------SECURISATION FORMULAIRE-->
<!--    var vert = "rgb(89, 179, 144)";-->
<!--    var rouge = "rgb(227, 45, 64)";-->
<!--    var black = "#373a3c";-->
<!--    var grey = "#ccc";-->
    
    <!--//________________Verification-->
<!--    var login, pwd = 0;-->
<!--    var valid = document.getElementById("inscription");-->
<!--    var loginChamps = document.getElementById("login");-->
<!--    var pwdChamps = document.getElementById("pwd");-->
<!--    var pwdconfirmChamps = document.getElementById("pwdconfirm");-->

    <!--//COLOR DU LOGIN-->
<!--    function controleLogin() {-->
<!--        if ((loginChamps.value.length <= 2) || (!loginChamps.value.match(/^[a-z. ]+$/i))) {-->
<!--            $("#login").css("border-bottom", rouge + " solid 1px");-->
<!--            $("#login").css("box-shadow", "0 1px 0 0 " + rouge);-->
<!--            $("i.fa.fa-user.prefix.active").css("color", "" + rouge);-->
<!--            login = 1;-->
<!--        } else {-->
<!--            $("#login").css("border-bottom", vert + " solid 1px");-->
<!--            $("#login").css("box-shadow", "0 1px 0 0 " + vert);-->
<!--            $("i.fa.fa-user.prefix.active").css("color", "" + vert);-->
<!--            login = 0;-->
<!--        }-->
<!--        if (loginChamps.value == "") {-->
<!--            $("#login").css("border-bottom", grey + " solid 1px");-->
<!--            $("#login").css("box-shadow", "transparent 0 0 0 0");-->
<!--            $("i.fa.fa-user.prefix.active").css("color", "" + black);-->
<!--        }-->
<!--    }-->
    <!--//COLOR DU PWD-->
<!--    function controlePwdConfirm() {-->
<!--        if ((pwdconfirmChamps.value.length <= 2) || (pwdChamps.value.length <= 2) || (pwdChamps.value != pwdconfirmChamps.value)){-->
<!--            $("#pwdconfirm, #pwd").css("border-bottom", rouge + " solid 1px");-->
<!--            $("#pwdconfirm, #pwd").css("box-shadow", "0 1px 0 0 " + rouge);-->
<!--            $("i.fa.fa-lock.prefix.active").css("color", "" + rouge);-->
<!--            pwdconfirm = 1;-->
<!--        } else {-->
<!--            $("#pwdconfirm, #pwd").css("border-bottom", vert + " solid 1px");-->
<!--            $("#pwdconfirm, #pwd").css("box-shadow", "0 1px 0 0 " + vert);-->
<!--            $("i.fa.fa-lock.prefix.active").css("color", "" + vert);-->
<!--            pwdconfirm = 0;-->
<!--        }-->
<!--        if ((pwdconfirmChamps.value == "")) {-->
<!--            $("#pwdconfirm, #pwd").css("border-bottom", grey + " solid 1px");-->
<!--            $("#pwdconfirm, #pwd").css("box-shadow", "transparent 0 0 0 0");-->
<!--            $("i.fa.fa-lock.prefix").css("color", "" + black);-->
<!--        }-->
<!--    }-->
<!--    loginChamps.onkeyup = function (){-->
<!--        controleLogin();-->
<!--    }-->
<!--    pwdconfirmChamps.onkeyup = function (){-->
<!--        controlePwdConfirm();-->
<!--    }-->
<!--    function controle() {-->
        <!--//--------------------------------CHAMPS PWD-->
<!--        if ((pwdChamps.value.length <= 2) || (!pwdChamps.value.match(/^[a-z. ]+$/i)))-->
<!--            pwd = 1;-->
<!--        else pwd = 0;-->
        <!--//--------------------------------CHAMPS pwdconfirm-->
<!--        if ((pwdconfirmChamps.value.length <= 2) || (!pwdconfirmChamps.value.match(/^[a-z. ]+$/i)))-->
<!--            pwdconfirm = 1;-->
<!--        else pwdconfirm = 0;-->
        <!--//--------------------------------CHAMPS VERIFICATION-->
<!--        if (pwd == 1)-->
<!--            pwdChamps.focus();-->
<!--        if (pwdconfirm == 1)-->
<!--            pwdconfirmChamps.focus();-->

<!--        if ((pwd == 1) || (pwdconfirm == 1))-->
<!--            return false;-->
<!--    }-->
    <!--//LANCER LA VERIFICATION-->
<!--    valid.onclick = controle;   -->

<!--</script>-->