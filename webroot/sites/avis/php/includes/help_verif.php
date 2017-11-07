<?php
	include('help_connexion.php');
	$connect = false;
	//Vérifie et ajoute le sid dans la bdd si il existe et est non vide.
	if(isset($_SESSION['login'])&&!empty($_SESSION['login'])){
		$session_login = htmlentities($_SESSION['login']);
		$check = $bdd->query("SELECT sid FROM utilisateurs WHERE sid ='$session_login';");
		$test = $check->fetch();
		
		if($test){
			$connect = true;
			$getSid = $bdd->query("SELECT login FROM utilisateurs WHERE sid = '$session_login';");
			while ($checkUser = $getSid->fetch()){
				echo '<div class="alert alert-success">
						<strong>'.utf8_encode("Vous êtes connecté sur le compte de ").$checkUser["login"].'</strong> 
					</div>';
			}
		}else{
			$connect = false;
//			echo "Erreur: Une erreur s'est produite avec la base de données.";
		}
		$check->closeCursor();
	}
?>