<?php
session_start();
include("../includes/help_connexion.php");
include("../divers/balises.php");
include("../divers/Upload.php");


//SI je suis pas connecté
    if(!isset($_SESSION['id']) || !isset($_SESSION['user']) || $_SESSION['user'] != "frederic"){
            header("Location:/index.php");
        }


$errer="";
if(isset($_POST['date']) && !empty($_POST['date']) &&
   isset($_POST['titre']) && !empty($_POST['titre']) &&
   isset($_POST['texte']) && !empty($_POST['texte'])
  ){
    $date =  (string) htmlentities($_POST['date']);
    $titre = (string) htmlentities($_POST['titre']);
    $texte =  (string) htmlentities($_POST['texte']);
        $sql = 'INSERT INTO evenement VALUES(NULL,?,?,?)';
        $query = $bdd->prepare($sql);
        $query->execute(array(
            $titre,
            $date,
            $texte
        ));
        $_SESSION["success"] = 'Vous avez bien ajouté un évenement';
    }else
        $_SESSION["erreur"] = "Vous devez remplir tous les champs";

header("Location:/index.php");
?>
