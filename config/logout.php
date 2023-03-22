<?php
    require_once("Joueur.php"); 
    

    if(isset($_SESSION["player"])) {
        $player->re_login();
        //déconnexion
        $player->disconnect();
    }
?>
