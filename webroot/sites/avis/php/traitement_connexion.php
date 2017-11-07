<?php
    session_save_path('sessions');
    ini_set('session.gc_probability', 1);
    session_start();
    
	include('includes/help_connexion.php');
	include('includes/help_verif.php');
	
	//--Si la vérification du cookie est vérifié, on redirige pour éviter de pouvoir se connecter plusieurs fois.--//
	//--Sinon, on passe au début du traitement.--//
	if($connect == true){
		header('Location:index.php');
	}else{
		if(isset($_POST['login'])){
			
			$loginPost = htmlspecialchars($_POST['login']);
			$pwdPost = htmlspecialchars(md5($_POST['pwd']));
			
			$firstCheck = $bdd->query("SELECT login FROM utilisateurs WHERE login='$loginPost';");
			//--Si il y n'a aucune ligne de retourné ou plus d'une, c'est qu'il y a une erreur.--//
			//--Sinon on passe à la suite du traitement.--//
			if($firstCheck->rowCount() == 0 || $firstCheck->rowCount() > 1){
                header("Location:../index.php");
			}else{
				$query=$bdd->query("SELECT id, login, pwd FROM utilisateurs WHERE login='$loginPost';");
				while($data = $query->fetch()){
					//--On revérifie le login et le mot de passe. Si la vérification est valide, on fini le traitement.--//
					//--Sinon on retourne un message d'erreur.--//
					if($data['login'] == $loginPost && $data['pwd'] == $pwdPost){
						$sid = md5($data['login'].time());
						$updateSid = $bdd->exec("UPDATE utilisateurs SET sid='$sid' WHERE login='$loginPost';");
                        $_SESSION['login'] = $_POST['login'];
                        $_SESSION['sid'] = $sid;
                        $_SESSION['pwd'] = md5($_POST['pwd']);
                        $_SESSION['idutilisateurs'] = (int) $data['id'];
                        
						header("Location:../index.php");
					}else{
                        header("Location:../index.php");
					}
				}
				$query->closeCursor();
			}
		}
	}
?>

