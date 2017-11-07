<?
// Rien à faire, on est redigé vers ami.php…
if(isset($_SESSION['id']))
    header("Location:affichage/ami.php");
else
    header("Location:affichage/login.php");
    
?>