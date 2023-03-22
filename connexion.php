<?php
    require_once("config/Joueur.php"); 

    if(isset($_SESSION["player"])) {
        $player->re_login();
    }
    
    //redirection
    $player->redirect_if_is_connected();
?>

<!DOCTYPE html>
<html lang="fr-FR">
<?php require_once("config/head.php"); ?>
    <div class="container">
        <main class="main">
            <a class="left-lien custom-btn" href="index.php">Accueil</a>
            <section class="content flex-r">
                <form action="config/conf_connexion.php" method="post" class="form">
                    <?php echo Model::print_err("identifierErr"); ?>

                    <input type="text" name="login" id="login" class="inp" placeholder="Login" minlength="3" required>
                    <?php echo Model::print_err("loginErr"); ?>
                    
                    <input type="password" name="password" id="password" class="inp" placeholder="Password" minlength="8" required>
                    <?php echo Model::print_err("passwordErr"); ?>

                    <input type="submit" value="connexion" class='inp'>
                    <p>Vous souhaitez-vous inscrire ? <a href="inscription.php"><button>c'est Ici !</button></a> </p>                
                </form>
            </section>
        </main>
    </div>
</body>
</html>

<?php
    Model::delete_err_session();