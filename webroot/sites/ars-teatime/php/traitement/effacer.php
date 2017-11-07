<?php
session_start();
include_ONCE('../includes/help_connexion.php');
if(!isset($_SESSION['id']) || !isset($_SESSION['user']) || $_SESSION['user'] != "frederic"){
	// On n'est pas connecté, il faut retourner à la pgae de login
	header("Location:/fredericLejeune/pages/peinture.php?page=1");
}
$sql = 'SELECT * FROM peinture WHERE peinture.id=?';
$query = $bdd->prepare($sql);
$query->execute(array($_GET['idOeuvre']));
$data = $query->fetch();

if(isset($_GET['idOeuvre']) && preg_match('/^[0-9]*$/', $_GET['idOeuvre'])){
    //SUPPRIME LA LIGNE MESSAGE DANS BDD
    $sql = 'DELETE FROM peinture WHERE id=?';
    $query = $bdd->prepare($sql);
    $query->execute(array($_GET['idOeuvre']));
    
    //SUPPRIME image dans le dossier
    if ($data['img'] != NULL)
        unlink("../../img/peinture/frederic_lejeune/$data[img]");
    
    
    $_SESSION['success'] = "Votre oeuvre à bien été supprimé.";
}else{
    $_SESSION['erreur'] = "Il y a eu un problème lors de la suppression.";
}
// A la fin on retourne d'où on vient
$referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php';
header('Location: ' . $referer);

?>