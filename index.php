<?php
    require_once("config/Joueur.php"); 

    if(isset($_SESSION["player"])) {
        $player->re_login();
    }
?>

<!DOCTYPE html>
<html lang="fr-FR">
<?php require_once("config/header.php"); ?>
    <div class="container">
        <main class="main">
            <section class="content">
                <h1 class="title">Bienvenue sur le Mémory</h1>
            </section>
        </main>
    </div>
</body>
</html>