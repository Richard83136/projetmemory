<?php
    require_once("Joueur.php");

    $login = $password = "";
    $loginErr = $passwordErr = "";
    $identifierErr = "Vos informations ne sont pas valides";

    //Login validation
    if(isset($_POST["login"]) && !empty($_POST["login"])) {
        $login = Model::process_input($_POST["login"]);
        if(strlen($_POST["login"]) < 3) {
            $loginErr = "3 caractère au min !";
        } 
    } else {
        $loginErr = "login requis !";
    }

    //Password validation
    if(isset($_POST["password"]) && !empty($_POST["password"])) {
        $password = Model::process_input($_POST["password"]);
        if(!Model::is_valid($password)) {
            $passwordErr = "Confirmer que le mot de passe contient :<br> au moins 1 
                caractère en majuscule, en minuscule, un muméro, caractère 
                spéciaux, 8 caractères au min, 255 ou max !";
        }
    } else {
        $passwordErr = "mot de passe requis !";
    }


    if(empty($loginErr) && empty($passwordErr)) {
        if($player->connect($login, $password)) {

            $_SESSION["score"] = 0;
            $_SESSION["click"] = 0;
            header("location: ../index.php");
            exit();
        } else {
            $_SESSION["identifierErr"] = $identifierErr;
            header("location: ../connexion.php");
            exit();
        }

    } else {
        !empty($loginErr) ? $_SESSION["loginErr"] = $loginErr : '';
        !empty($passwordErr) ? $_SESSION["passwordErr"] = $passwordErr  : '';

        header("location: ../connexion.php");
        exit();
    }