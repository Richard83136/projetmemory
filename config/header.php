<?php
    require_once("config/Joueur.php"); 
    if(isset($_SESSION["player"])) {
        $player->update_local_data($_SESSION["player"]);
    }
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/mQuiry.css">
</head>
<body>
    <header>
        <?php if($player->is_connected()): ?>
            <ul class="menu flex-r">
                <li><a href="index.php"><?php echo "Nom du Joueur : " .$player->get_login()?></a></li>
                <li><a href="index.php">accueil</a></li>
                <li><a href="game_home.php">Jouer</a></li>
                <li><a href="classement.php">classement</a></li>
                <li><a href="config/logout.php">déconnexion</a></li>
            </ul>
        <?php else :?>
            <ul class="menu flex-r">
                <li><a href="index.php">accueil</a></li>
                <li><a href="connexion.php">connexion</a></li>
                <li><a href="inscription.php">inscription</a></li>
                <li><a href="classement.php">classement</a></li>
            </ul>
        <?php endif ?>
    </header>