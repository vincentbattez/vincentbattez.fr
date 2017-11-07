<?php
ob_start;
if(isset($_GET['action']) && $_GET['action']=="deconnexion") { 
    session_start();
    session_destroy();
    header('Location:../affichage/login.php');
}
ob_end_flush;
?>