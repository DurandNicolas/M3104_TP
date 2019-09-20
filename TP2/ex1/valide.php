<?php

if (isset($_POST["login"]) && isset($_POST["password"])) {

    require_once ('params.inc.php');

    $db = new PDO(
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8",
        DB_USER,
        DB_PASS
    );

    $login = filter_var ($_POST["login"], FILTER_SANITIZE_STRING);
    $pass = filter_var ($_POST["password"], FILTER_SANITIZE_STRING);
    $sql = "SELECT * FROM Users WHERE login = :login AND pass = :pass";
    $stmt = $db->prepare ($sql);
    $stmt->bindValue ("login", $login);
    $stmt->bindValue ("pass", $pass);
    $stmt->execute ();

    if ($stmt->fetch ()) {
        echo "Bravo, vous êtes autorisé à entrer.";

        // Il ne reste plus qu'à mettre en place le mécanisme de session
        session_start ();

        $_SESSION['auth'] = 1;
        $_SESSION['login'] = $login;
    } else {
        echo "Login ou mot de passe incorrect :-(";
    }

}