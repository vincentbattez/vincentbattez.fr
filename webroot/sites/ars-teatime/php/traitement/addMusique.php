<?php
session_start();
include("../includes/help_connexion.php");
include("../divers/balises.php");
include("../divers/Upload.php");


//SI je suis pas connecté
    if(!isset($_SESSION['id']) || !isset($_SESSION['user']) || $_SESSION['user'] != "frederic"){
            header("Location:http://ars-teatime.com/pages/musique.php?page=1");
        }
$errer="";
if(isset($_POST['auteur']) && !empty($_POST['auteur']) &&
   isset($_POST['titre']) && !empty($_POST['titre'])
  ){
    $auteur =  (string) htmlentities($_POST['auteur']);
    $titre = (string) htmlentities($_POST['titre']);

    // UPLOAD UNE musique SUR UN MUR
    $config['upload_path'] = '../../pages/musique';
    $config['allowed_types'] = 'mp3';
    $upload = new Upload($config);

    if ($upload->do_upload('song_mp3')) {
        $song_mp3=$upload->file_name;
        $checkSong_mp3 = true;
    } else {
        $checkSong_mp3 = $upload->error_msg;
    }
    switch ($checkSong_mp3[0]) {
        case 'upload_invalid_filetype': $errer='musique invalide -  <strong><a class="alertSite" href="http://online-audio-converter.com/fr/" target="_blank">modifier l\'extension de votre fichier</a></strong>'; break;
        case 'upload_file_exceeds_limit': $errer='musique trop lourd, vous devez  <strong><a class="alertSite" href="http://online-audio-converter.com/fr/" target="_blank">compresser votre musique</a></strong>'; break;
        //upload_max_filesize
        //post_max_size
    }
    if($song_mp3 === null){
        $_SESSION["erreur"] = "Vous devez mettre une musique";
    header("Location:http://ars-teatime.com//pages/musique.php?page=1");
    }
    //Si les variables existes envoie les données dans la BDD :
    if($checkSong_mp3[0]!='upload_invalid_filetype' && $checkSong_mp3[0]!='upload_file_exceeds_limit'){
        $sql = 'INSERT INTO player VALUES(NULL,?,?,?)';
        $query = $bdd->prepare($sql);
        $query->execute(array(
            $auteur,
            $titre,
            $song_mp3
        ));
        $_SESSION["success"] = 'Vous avez bien ajouté une musique';
    }else
        $_SESSION["erreur"] = $errer;
}else
    $_SESSION["erreur"] = "Vous devez remplir tous les champs";


header("Location:http://ars-teatime.com//pages/musique.php?page=1");
?>
