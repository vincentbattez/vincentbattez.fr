<?php
session_start();
include_ONCE('../includes/help_connexion.php');

if(!isset($_SESSION['id']) || !isset($_SESSION['user']) || $_SESSION['user'] != "frederic"){
	// On n'est pas connecté, il faut retourner à la pgae de login
	header("Location:http://ars-teatime.com/pages/musique.php?page=1");
}
$sql = 'SELECT * FROM player WHERE player.id=?';
$query = $bdd->prepare($sql);
$query->execute(array($_GET['idMusique']));
$data = $query->fetch();

if(isset($_GET['idMusique']) && preg_match('/^[0-9]*$/', $_GET['idMusique'])){
    //SUPPRIME LA LIGNE MESSAGE DANS BDD
    $sql = 'DELETE FROM player WHERE id=?';
    $query = $bdd->prepare($sql);
    $query->execute(array($_GET['idMusique']));

    //SUPPRIME LA musique dans le dossier
    unlink("http://ars-teatime.com/pages/musique/$data[src_mp3]");
    $_SESSION['success'] = "Votre musique à bien été supprimé.";
}else{
    $_SESSION['erreur'] = "Il y a eu un problème lors de la suppression.";
}
// A la fin on retourne d'où on vient
header("Location:".$_SERVER['HTTP_REFERER']);

?>
