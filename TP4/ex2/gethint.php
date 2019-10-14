<?php
include ('params.inc.php');
$codeRetourHTTP = 500; // Erreur interne du serveur par défaut

header ("Access-Control-Allow-Origin: *");

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

// le plugin autocomplete de jQuery UI passe le paramètre 'term' en GET
$term = filter_var ($_GET["term"], FILTER_SANITIZE_STRING);

// On recherche les suggestions possibles à partir de la base de données
try {
    $sql = "SELECT tp4_prenom FROM TP4_prenoms WHERE tp4_prenom LIKE :term ORDER BY tp4_prenom";
    $rs = $db->prepare ($sql);
    $rs->execute (array('term' => $term . '%'));
    $codeRetourHTTP = 200; // Code requête Ok (même si retour vide)
} catch (PDOException $e) {
    die("Probleme avec la requete : $sql");
}

// La liste des suggestions est construite dans un tableau PHP
$suggestions = array();

// On ajoute les suggestions retournées par la requête SQL dans le tableau $suggestions
while ($suggestionBD = $rs->fetch ()) {
    array_push ($suggestions, $suggestionBD[0]);
}

// On génère la réponse en JSON à partir du tableau PHP
http_response_code ($codeRetourHTTP);
header ('Content-Type: application/json');
echo json_encode ($suggestions);