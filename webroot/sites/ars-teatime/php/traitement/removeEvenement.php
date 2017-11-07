<?php
session_start();
include_ONCE('../includes/help_connexion.php');

if(!isset($_SESSION['id']) || !isset($_SESSION['user']) || $_SESSION['user'] != "frederic"){
	// On n'est pas connecté, il faut retourner à la pgae de login
	header("Location:/fredericLejeune/index.php");
}
if(isset($_GET['idEvenement']) && preg_match('/^[0-9]*$/', $_GET['idEvenement'])){
    //SUPPRIME LA LIGNE MESSAGE DANS BDD
    $sql = 'DELETE FROM evenement WHERE id=?';
    $query = $bdd->prepare($sql);
    $query->execute(array($_GET['idEvenement']));
    $_SESSION['success'] = "Votre évenement à bien été supprimé.";
}else{
    $_SESSION['erreur'] = "Il y a eu un problème lors de la suppression.";
}
// A la fin on retourne d'où on vient
header("Location:".$_SERVER['HTTP_REFERER']);

?>
