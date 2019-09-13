<?php
// Définition des utilisateurs
$config_user = "admin";
$config_pass = "totoro";

if (isset($_POST["login"]) && isset($_POST["password"])) {
    if ($_POST["login"] == $config_user && $_POST["password"] == $config_pass) {
        echo "Bravo, vous êtes autorisé à entrer.";
    } else {
        echo "Login ou mot de passe incorrect :-(";
    }
}