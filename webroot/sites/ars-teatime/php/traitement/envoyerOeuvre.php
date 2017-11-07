<?php
session_start();
include("../includes/help_connexion.php");
include("../divers/balises.php");
include("../divers/Upload.php");


//SI je suis pas connecté
    if(!isset($_SESSION['id']) || !isset($_SESSION['user']) || $_SESSION['user'] != "frederic"){
            header("Location:http://ars-teatime.com/pages/peinture.php?page=1");
        }
$errer="";

// Si on a écrit dans le formulaire mot de passe et et mot de passe = mot de passe confirmation créer la variable $pwd
if(isset($_POST['auteur']) && !empty($_POST['auteur']) &&
   isset($_POST['titre']) && !empty($_POST['titre']) &&
   isset($_POST['propos']) && !empty($_POST['propos']) &&
   isset($_POST['type']) && !empty($_POST['type']) &&
   isset($_POST['hauteur']) && !empty($_POST['hauteur']) && preg_match('/^[0-9]*$/', $_POST['hauteur']) &&
   isset($_POST['largeur']) && !empty($_POST['largeur']) && preg_match('/^[0-9]*$/', $_POST['largeur']) &&
   isset($_POST['epaisseur']) && !empty($_POST['epaisseur']) && preg_match('/^[0-9]*$/', $_POST['epaisseur']) &&
   isset($_POST['prix']) && !empty($_POST['prix']) && preg_match('/^[0-9]*$/', $_POST['prix']) &&
   isset($_POST['orientation'])
  ){
    $auteur = (string) htmlentities($_POST['auteur'],ENT_QUOTES,'UTF-8');
    $titre = (string) htmlentities($_POST['titre'],ENT_QUOTES,'UTF-8');
    $propos = (string) htmlentities($_POST['propos'],ENT_QUOTES,'UTF-8');

    $type = (string) htmlentities($_POST['type'],ENT_QUOTES,'UTF-8');
    $orientation = (string) htmlentities($_POST['orientation'],ENT_QUOTES,'UTF-8');
    $hauteur = (int) htmlentities($_POST['hauteur'],ENT_QUOTES,'UTF-8');
    $largeur = (int) htmlentities($_POST['largeur'],ENT_QUOTES,'UTF-8');
    $epaisseur = (int) htmlentities($_POST['epaisseur'],ENT_QUOTES,'UTF-8');
    $prix = (int) htmlentities($_POST['prix'],ENT_QUOTES,'UTF-8');
    if ($hauteur < 50 || $largeur < 50)
        $format = "petit";
    elseif($hauteur > 100 || $largeur > 100)
        $format = "grand";
    else
        $format = "moyen";

    // UPLOAD UNE IMAGE SUR UN MUR
    $config['upload_path'] = '../../img/peinture/frederic_lejeune';
    $config['allowed_types'] = 'png|jpg|gif';
    $upload = new Upload($config);

    if ($upload->do_upload('img')) {
        $img=$upload->file_name;
        $checkIMG = true;
    } else {
        $checkIMG = $upload->error_msg;
    }
    switch ($checkIMG[0]) {
        case 'upload_invalid_filetype': $errer='Image invalide'; break;
        case 'upload_file_exceeds_limit': $errer='Image trop lourd <a href="http://optimizilla.com/fr/">compresser votre image</a>'; break;
    }
    if($img === null){
        $_SESSION["erreur"] = "Vous devez mettre une image";
        header("Location:/pages/peinture.php?page=1");
    }

    //Si les variables existes envoie les données dans la BDD :
    if($checkIMG[0]!='upload_invalid_filetype' && $checkIMG[0]!='upload_file_exceeds_limit'){
        $sql = 'INSERT INTO peinture VALUES(NULL,?,?,?,?,?,?,?,?,?,?,?)';
        $query = $bdd->prepare($sql);
        $query->execute(array(
            $auteur,
            $titre,
            $largeur,
            $hauteur,
            $epaisseur,
            $type,
            $prix,
            $orientation,
            $format,
            $img,
            $propos
        ));
        $_SESSION["success"] = 'Vous avez bien ajouté une oeuvre';
    }else{
        $_SESSION["erreur"] = $errer;
    }
}else
    $_SESSION["erreur"] = "Vous devez remplir tous les champs";
header("Location:/pages/peinture.php?page=1");
?>
