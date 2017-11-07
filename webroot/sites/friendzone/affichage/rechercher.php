<?php
session_start();
include("../divers/connexion.php");
include("../divers/balises.php");
if(!isset($_SESSION['id'])) {
	header("Location:login.php");
}
if(!isset($_GET['recherche'])) {
	header("Location:mur.php?id=$_SESSION[id]");
}
?>

    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta name="description" content="FriendZone - Recherche" />
        <title>FriendZone - Recherche</title>
        <?php include_ONCE '../divers/head.php'; ?>
            <!--HEAD META....-->
    </head>

    <body>
        <?php
include("entete.php");
// On n'est pas connecté, il faut retourner à la pgae de login
?>

    <div class="container white divRecherche">
<?php    
    $recherche = $_GET['recherche'];
    $sql = "SELECT * FROM utilisateur WHERE prenom LIKE '%$recherche%' OR nom LIKE '%$recherche%'";
    $query = $pdo->prepare($sql);
    $query->execute();
    if($_GET['recherche']!='')      
        echo'<h1 class="text-center">Résultat pour "'.$recherche.'" : <a href="?recherche="><small>Tout le monde</small></a></h1>';
    else
        echo'';

$y = 1;
$Debut = true;
	while($data = $query->fetch()) {
        
        if ($Debut == true){
            echo '<div class="row">';
            $Debut=false;
        }
echo
'           
            <!--Card-->
            <div class="col-md-4">
                <div class="card card-cascade hoverable">
                    <!--Card image-->
                    <div class="view overlay hm-white-slight viewRecherche">
';//DEBUT IF IMG
                    if($data['photo'] == 'default.svg')
                        echo '<img src="../img/mur/profil/default.svg" class="img-fluid imgProfil" alt="photo de profil"/>';
                    else
                        echo '<img src="../img/'.$data['login'].'/profil/'.$data['photo'].'" class="img-fluid imgProfil" alt="Photo de profil"/>';
//FIN IF IMG
                    echo'

                        <a href="mur.php?id='.$data['id'].'">
                            <div class="mask full"></div>
                        </a>
                    </div>
                    <!--/.Card image-->
                    <!--Card content-->
                    <div class="card-block text-xs-center">
                        <!--Title-->
                        <h4 class="card-title"><strong><a href="mur.php?id='.$data['id'].'">'.$data['prenom'].' '.$data['nom'].'</a></strong></h4>
                    </div>
                    <!--/.Card content-->
                </div>
            </div>
            <!--/.Card-->
';
        if ($y==3){
            echo '</div>';
            $y=1;
            $Debut = true;
        }else
            $y++;
    }
    if($data==false && $y != 1)
        echo '</div>';
echo
'
    </div>
';
?>
<?php
// On termine par le pied de page
include("pied.php");
?>