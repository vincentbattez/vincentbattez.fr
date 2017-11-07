<?php
    session_start();
    include("../divers/connexion.php");
    include("../divers/balises.php");

    if(isset($_SESSION['id']))
	   header("Location:mur.php?id=$_SESSION[id]");
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta name="description" content="FriendZone - Connexion"/>
    <title>FriendZone - Connexion</title>
    <?php include_ONCE '../divers/head.php'; ?> <!--HEAD META....-->
</head>
<body id="bodyIMG">

<?php
include("entete.php");
if(isset($_SESSION['id']) && isset($_SESSION['login'])) // AFFICHE DECO QUANC CO
    header("Location:../affichage/mur.php?id=$_SESSION[id]");
else
    echo 
        '
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
                            <!--LOGIN-->
                            <form class="form" action="../traitement/connexion.php" method="POST" enctype="multipart/form-data" role="form">
                                <div class="md-form">
                                    <i class="fa fa-user prefix"></i>
                                    <input type="text" id="login" class="form-control" name="login">
                                    <label for="login">Login</label>
                                </div>
                                <!--PASSWORD-->
                                <div class="md-form">
                                    <i class="fa fa-lock prefix"></i>
                                    <input type="password" id="pwd" class="form-control" name="pwd">
                                    <label for="password">Password</label>
                                </div>
                                <!--REMEMBER-->
                                <fieldset class="form-group">
                                    <input type="checkbox" class="filled-in" id="remember" name="remember">
                                    <label for="remember">Remember me</label>
                                </fieldset>
                                
                                <!--SUBMIT-->
                                <div class="text-xs-center">
                                    <button class="btn btn-primary" id="connexion" type="submit" onclick="securisationConnexion()">Se connecter</button>
                                </div>
                            </form>
                        </div>
                        <!--Footer-->
                        <div class="modal-footer">
                            <div class="options">
                                <p>Pas de compte? <a href="creer.php">S\'inscrire</a></p>
                            </div>
                        </div>
                    </div>    
                    <!--/Card-->
                </div>
            </div>
        </div>
        ';



// Il faut faire des requêtes pour afficher ses amis, les attentes, les gens qu'on a invités qui ont pas répondu etc..
// Elles sont listées ci-dessous
// Connaitre ses amis : 
include("pied.php");
?>

// <script>

// //----------------------------------------------------------SECURISATION FORMULAIRE
//     var vert = "rgb(89, 179, 144)";
//     var rouge = "rgb(227, 45, 64)";
//     var black = "#373a3c";
//     var grey = "#ccc";

//     //________________Verification
//     var login, pwd = 0;
//     var valid = document.getElementById("connexion");
//     var loginChamps = document.getElementById("login");
//     var pwdChamps = document.getElementById("pwd");

//     //COLOR DU LOGIN
//     function controleLogin() {
//         if ((loginChamps.value.length <= 2)) {
//             $("#login").css("border-bottom", rouge + " solid 1px");
//             $("#login").css("box-shadow", "0 1px 0 0 " + rouge);
//             $("i.fa.fa-user.prefix.active").css("color", "" + rouge);
//             login = 1;
//         } else {
//             $("#login").css("border-bottom", vert + " solid 1px");
//             $("#login").css("box-shadow", "0 1px 0 0 " + vert);
//             $("i.fa.fa-user.prefix.active").css("color", "" + vert);
//             login = 0;
//         }
//         if (loginChamps.value == "") {
//             $("#login").css("border-bottom", grey + " solid 1px");
//             $("#login").css("box-shadow", "transparent 0 0 0 0");
//             $("i.fa.fa-user.prefix.active").css("color", "" + black);
//         }
//     }
//     //COLOR DU PWD
//     function controlePwd() {
//         if ((pwdChamps.value.length <= 2)) {
//             $("#pwd").css("border-bottom", rouge + " solid 1px");
//             $("#pwd").css("box-shadow", "0 1px 0 0 " + rouge);
//             $("i.fa.fa-lock.prefix.active").css("color", "" + rouge);
//             pwd = 1;
//         } else {
//             $("#pwd").css("border-bottom", vert + " solid 1px");
//             $("#pwd").css("box-shadow", "0 1px 0 0 " + vert);
//             $("i.fa.fa-lock.prefix.active").css("color", "" + vert);
//             pwd = 0;
//         }
//         if (pwdChamps.value == "") {
//             $("#pwd").css("border-bottom", grey + " solid 1px");
//             $("#pwd").css("box-shadow", "transparent 0 0 0 0");
//             $("i.fa.fa-lock.prefix.active").css("color", "" + black);
//         }
//     }
//     loginChamps.onkeyup = function (){
//         controleLogin();
//     }
//     pwdChamps.onkeyup = function (){
//         controlePwd();
//     }
//     function controle() {
//         //--------------------------------CHAMPS LOGIN
//         if ((loginChamps.value.length <= 2) || (!loginChamps.value.match(/^[a-z. ]+$/i)))
//             login = 1;
//         else login = 0;
//         //--------------------------------CHAMPS PWD
//         if ((pwdChamps.value.length <= 2) || (!pwdChamps.value.match(/^[a-z. ]+$/i)))
//             pwd = 1;
//         else pwd = 0;
//         //--------------------------------CHAMPS VERIFICATION
//         if (login == 1)
//             loginChamps.focus();
//         if (pwd == 1)
//             pwdChamps.focus();

//         if ((login == 1) || (pwd == 1))
//             return false;
//     }
//     //LANCER LA VERIFICATION
//     valid.onclick = controle;   
    
// </script>