<?php
// Script connexion.php utilisé pour la connexion à la BD


$host='vincentbattez.fr.mysql'; // le chemin vers le serveur (localhost dans 99% des cas)

$db='vincentbattez_fr'; // le nom de votre base de données.
            // A l'IUT, 3 possibilité prenom_nom prenom_nom1 et prenom_nom2 

$user='vincentbattez_fr'; // nom d'utilisateur pour se connecter
              // A l'iut prenom.nom	

$passwd='rhg87YS9'; // mot de passe de l'utilisateur pour se connecter
            // A l'ut, généré automatiquement

try {
	// On essaie de créer une instance de PDO.
	$bdd = new PDO("mysql:host=$host;dbname=$db", $user, $passwd,array(
           PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
           
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}  
catch(Exception $e) {
	echo 'Erreur : '.$e->getMessage().'<br />';
}
?>