<?php
    session_start();
	include_ONCE('../includes/help_connexion.php');
// j'ai cliquer sur modifier
     if(isset($_POST['btnModifier'])){

         //AUTEUR
         if(isset($_POST['modifi_auteur']) && !empty($_POST['modifi_auteur']))
            $auteur = htmlspecialchars($_POST['modifi_auteur']);
         else
            $errer = 'Vous devez écrire un auteur';

         //TITRE
         if(isset($_POST['modifi_titre']) && !empty($_POST['modifi_titre']))
            $titre = htmlspecialchars($_POST['modifi_titre']);
         else
            $errer = 'Vous devez écrire un titre';

         //ID DE LA MUSIQUE
         if(isset($_POST['idMusique']) && !empty($_POST['idMusique']))
            $idMusique = htmlspecialchars($_POST['idMusique']);
         else
            $errer = 'Il y a eu un problème avec la modification';

    }else
        $errer = 'Il y a eu un problème avec la modification';
// UPDATE
if (isset($auteur) && isset($titre) && isset($idMusique)) {
    $sql = "UPDATE player SET auteur = ?, titre = ? WHERE id=?";
    $query = $bdd->prepare($sql);
    $query->execute(array($auteur, $titre, $idMusique));
    $_SESSION['success'] = "Modification effectué";
}else
    $_SESSION['erreur'] = $errer;

header("Location: ../../pages/musique.php?id=1");
?>
