<?php
    require_once("config/Joueur.php"); 
    require_once("config/Card.php");

    if(isset($_SESSION["player"])) {
        $player->re_login();

        //calcul_score_game 
        if(isset($_SESSION["win"])) {
            $player->calcul_score_game($_SESSION["even_number_game"]);
        }
    }
    
?>

<!DOCTYPE html>
<html lang="fr-FR">
<?php require_once("config/header.php"); ?>
    <div class="container">
        <main class="main">
            <section class="content flex-r">
                <?php if(isset($_SESSION["win"])) :?>
                    <h1>Vous avez gagné !</h1>
                    <div class="result-box">
                        <div><b>Joueur : </b><?= $player->get_login()?></div>
                        <div><b>Score : </b><?= $player->get_score()?></div>
                        <div><b>Classement : </b><?= $player->get_ranking()?></div>
                        <div><b>Meilleur score : </b><?= $player->get_best_score()?></div>
                        <div><b>Nombre de Click : </b><?= $player->get_number_of_click()?></div>
                        <div><b>Nombre de pair : </b><?= $_SESSION["even_number_game"]?></div>
                    </div>
                    <a href="config/quit_game.php"><button>nouvelle partie ?</button></a>
                <?php else :?>
                    <?php if(!isset($_SESSION["game_started"])) :?>
                        <form action="config/conf_game.php" method="post">
                            <input type="number" name="even_number_game" id="even_number_game" placeholder=" Nombre de pair" min='3' max='3' class="even_number_game" required>

                            <input type="submit" value="nouvelle partie ?">
                        </form>
                    <?php else :?>
                        <form action="config/quit_game.php" method="post">
                        <input type="submit" name="quit_game" value="Quitter la partie ?">
                    </form>
                        <?php 
                            Card::create_cards_game();
                            Card::draw_card();

                            if(Card::player_win()) {
                                $_SESSION["win"] = true;
                                header("Location: game_home.php");
                                exit();
                            }
                                                        
                            if(isset($_GET["id"])) {
                                //set_click
                                $player->set_click();
                                $id = $_GET["id"];
                                Card::get_card_clicked($id);
                            }
                        ?>
                    <?php endif?>
                <?php endif ;?>
            </section>
        </main>
    </div>
</body>
</html>