<?php
include('includes/help_connexion.php');
include('includes/help_verif.php');
session_save_path('sessions');
ini_set('session.gc_probability', 1);
session_start();
//prepare
$valide = "true";
$idActicleCurrent= (int) $_POST['IdArticle'];
//echo 'Current Article : '.$_SESSION['idutilisateurs'].'<br/>';
//echo '<strong>MON user: '.$idActicleCurrent.'<br/><br/><br/></strong>';
$query_add = $bdd->prepare('INSERT INTO articles_aime(idarticle, idutilisateurs) VALUES(:idarticle, :idutilisateurs)');

    $query_idutilisateurs = $bdd->query('SELECT idutilisateurs, idarticle FROM articles_aime;');

   while ($data_idutilisateurs = $query_idutilisateurs->fetch()){ // regarde dans le BDD si j'ai déjà liké
        $bddIDarticle = (int) $data_idutilisateurs['idarticle'];

       if($bddIDarticle == $idActicleCurrent){
        $bddIDuser = (int) $data_idutilisateurs['idutilisateurs'];
       }


        if ($_SESSION['idutilisateurs'] != $bddIDuser){
            $valide = "true";
        }else{
            $valide = "false";
            break;
        }
   }
    if ($valide == "true"){ // Si j'ai pas déjà liké je like, sinon je like pas
        //ADD LIKE
        $query_nbAime = $bdd->query('SELECT aime AS nbAime FROM articles WHERE id='.$idActicleCurrent.';');
        $donnees_nbAime = $query_nbAime->fetch();
        $query_nbAime->closeCursor();

        $addAime = (int) $donnees_nbAime['nbAime'];
        $addAime += (int) 1;

        $bdd->exec("UPDATE articles SET aime='$addAime' WHERE id='$idActicleCurrent'");

        //ADD DONNÉES SUR articles_like
        $query_add->execute(array(
            'idarticle' => $idActicleCurrent,
            'idutilisateurs' => $_SESSION['idutilisateurs']
        ));
    }
    $query_idutilisateurs->closeCursor(); // Termine le traitement de la requête

header('Location:../index.php')
?>