<?php
session_start();

include("../divers/connexion.php");
include("../divers/balises.php");

if(!isset($_SESSION['id']))
	header("Location:login.php");

//SI etat existe ET etat = soit "ami" ou "banni" et que l'id soit un chiffre alors on UPDATE
if(isset($_GET['etat']) && isset($_GET['id']) && preg_match('/^[0-9]*$/', $_GET['id']) && $_GET['etat']=='ami' || $_GET['etat'] == 'banni' && $_SESSION['id']!=$_GET['id']){
    $sql = 'UPDATE lien SET etat=? WHERE idUtilisateur1=? AND idUtilisateur2=?';
    $query = $pdo->prepare($sql);
    $query->execute(array($_GET['etat'],
                          $_GET['id'],
                          $_SESSION['id']));
    header('Location:../affichage/ami.php');   
}else{
    $errer="Méchant garçon !";
    $_SESSION["erreur"] = $errer;
    header('Location:../affichage/ami.php');
}

?>