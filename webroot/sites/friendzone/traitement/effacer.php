<?php
session_start();
include("../divers/connexion.php");
include("../divers/balises.php");
if(!isset($_SESSION['id'])) {
	// On n'est pas connecté, il faut retourner à la pgae de login
	header("Location:login.php");
}
$sql = 'SELECT idAuteur,image,login FROM utilisateur JOIN ecrit ON utilisateur.id = idAuteur WHERE ecrit.id=?';
$query = $pdo->prepare($sql);
$query->execute(array($_GET['idMessage']));
$data = $query->fetch();

$sql = 'SELECT login as loginCible
        FROM utilisateur 
        JOIN ecrit ON utilisateur.id = idAmi 
        WHERE idAmi=?
        AND ecrit.id=?';
$query = $pdo->prepare($sql);
$query->execute(array($_GET['idAmi'],$_GET['idMessage']));
$dataCible = $query->fetch();

if(isset($_GET['idMessage']) && $data['idAuteur'] == $_SESSION['id'] && preg_match('/^[0-9]*$/', $_GET['idMessage'])){
    //SUPPRIME LA LIGNE MESSAGE DANS BDD
    $sql = 'DELETE FROM ecrit where id=?';
    $query = $pdo->prepare($sql);
    $query->execute(array($_GET['idMessage']));
    
    //SUPPRIME une éventuelle image 
    if ($data['image'] != NULL)
        unlink('../img/'.$dataCible['loginCible'].'/mur/'.$data['image'].'');
    
    //SUPPRIME les likes
    $sql = 'DELETE FROM ecrit_like where idEcrit=?';
    $query = $pdo->prepare($sql);
    $query->execute(array($_GET['idMessage']));
    
    
    $_SESSION['success'] = "Votre message à bien été supprimé.";
}else{
    $_SESSION['erreur'] = "Il y a eu un problème lors de la suppression.";
}
// A la fin on retourne d'où on vient
header("Location:".$_SERVER['HTTP_REFERER']);

?>