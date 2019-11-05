<?php
include ('params.inc.php');

session_start ();

try {
    $db = new PDO(
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8",
        DB_USER,
        DB_PASS
    );
} catch (PDOException $e) {
    // Connexion impossible... impossible donc d'aller plus loin !
    die("Impossible de se connecter a la source de donnees...");
}

// On récupère le paramètre id à partir de l'URL et lang dans la session
$id = filter_var ($_GET["id"], FILTER_SANITIZE_NUMBER_INT);
if (isset($_SESSION['lang'])) {
    $lang = filter_var ($_SESSION['lang'], FILTER_SANITIZE_STRING);
} else {
    $lang = "fr"; // La langue par défaut est le français
}

try {
    $sql = "SELECT * FROM TP5_Textes WHERE id=:id AND lang=:lang";
    $rs = $db->prepare ($sql);
    $rs->execute (array('id' => $id, 'lang' => $lang));
} catch (PDOException $e) {
    die("Probleme avec la requete : $sql");
}

$infos = $rs->fetch ();

header ("Content-type: image/png");
$im = ImageCreateFromPNG ($infos["url_image"]);
$noir = ImageColorAllocate ($im, 0, 0, 0);
ImageString ($im, 3, 25, 20, $infos["texte"], $noir);
ImagePng ($im);
ImageDestroy ($im);