<?php
    session_start();
	include_ONCE('../includes/help_connexion.php');
// j'ai cliquer sur modifier
     if(isset($_POST['btnModifier'])){

         //date
         if(isset($_POST['modifi_date']) && !empty($_POST['modifi_date']))
            $date = htmlspecialchars($_POST['modifi_date']);
         else
            $errer = 'Vous devez écrire un date';

         //TITRE
         if(isset($_POST['modifi_titre']) && !empty($_POST['modifi_titre']))
            $titre = htmlspecialchars($_POST['modifi_titre']);
         else
            $errer = 'Vous devez écrire un titre';

         //texte
         if(isset($_POST['modifi_texte']) && !empty($_POST['modifi_texte']))
            $texte = htmlspecialchars($_POST['modifi_texte']);
         else
            $errer = 'Vous devez écrire un texte';

         //ID DE LA MUSIQUE
         if(isset($_POST['idEvenement']) && !empty($_POST['idEvenement']))
            $idEvenement = htmlspecialchars($_POST['idEvenement']);
         else
            $errer = 'Il y a eu un problème avec la modification';

    }else
        $errer = 'Il y a eu un problème avec la modification';
// UPDATE
if (isset($date) && isset($titre) && isset($texte) && isset($idEvenement)) {
    $sql = "UPDATE evenement SET titre = ?, date = ?, texte = ? WHERE id=?";
    $query = $bdd->prepare($sql);
    $query->execute(array($titre, $date, $texte, $idEvenement));
    $_SESSION['success'] = "Modification effectué";
}else
    $_SESSION['erreur'] = $errer;

header("Location: ../../index.php");
?>
