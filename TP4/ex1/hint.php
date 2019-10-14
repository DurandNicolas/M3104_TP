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

// On récupère le paramètre q à partir de l'URL
$q = filter_var ($_GET["q"], FILTER_SANITIZE_STRING);

// On recherche les suggestions possibles à partir de la base de données
try {
    $sql = "SELECT tp4_prenom FROM TP4_prenoms WHERE tp4_prenom LIKE :term ORDER BY tp4_prenom";
    $rs = $db->prepare ($sql);
    $rs->execute (array('term' => $q . '%'));
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

// On envoie la réponse sous la forme d'une chaîne de caractères (les suggestions sont séparées par ', ')
// Si rien n'est trouvé, on affiche "pas de suggestion"
http_response_code ($codeRetourHTTP);
echo $suggestions == "" ? "pas de suggestion" : implode (', ', $suggestions);