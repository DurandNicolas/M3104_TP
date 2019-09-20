<?php

if (isset($_POST["login"]) && isset($_POST["password1"]) && isset($_POST["password2"]) && isset($_POST["mail"]) && isset($_POST["tel"])) {

    require_once ('params.inc.php');

    $db = new PDO(
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8",
        DB_USER,
        DB_PASS
    );

    $login = filter_var ($_POST["login"], FILTER_SANITIZE_STRING);
    $pass1 = filter_var ($_POST["password1"], FILTER_SANITIZE_STRING);
    $pass2 = filter_var ($_POST["password2"], FILTER_SANITIZE_STRING);
    $mail = filter_var ($_POST["mail"], FILTER_SANITIZE_STRING);
    $tel = filter_var ($_POST["tel"], FILTER_SANITIZE_STRING);

    // Vérification des 2 passwords
    if ($pass1 != $pass2) {
        die("Password mismatch !");
    }

    $sql = "INSERT INTO Users VALUES ('$login', '$pass1', '$mail', '$tel')";

    if ($db->exec ($sql)) {
        echo "Utilisateur ajouté";
    } else {
        echo "Ajout impossible";
    }

}