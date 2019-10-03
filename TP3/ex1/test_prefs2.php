<?php
/* ***************************************************************
  Fichier    : test_prefs1.php
  Langage    : PHP 5+
  Auteur     : Vincent Barré
  Extensions : -
  Paramètres : Aucun
*************************************************************** */

// Attention : l'inclusion de la définition de la classe Preference doit être faite *avant* le session_start()
require_once ("Preferences.class.php");

session_start ();

if (isset($_SESSION['Prefs'])) {
    $mesPrefs = $_SESSION['Prefs'];
} else {
    $mesPrefs = new Preferences();
    $_SESSION['Prefs'] = $mesPrefs;
}

$coulFond = $mesPrefs->getCoulFond ();
// Attention : la méthode setCoulFond déposant un cookie, elle doit être appelée avant tout envoi de HTML vers le client
$mesPrefs->setCoulFond ("CAFE00");

if (! is_null($coulFond)) {
    echo "<html><body style=\"background-color:#$coulFond\">";
} else {
    echo "<html><body>";
}
echo $mesPrefs->affPrefs ();
echo "</body></html>";
