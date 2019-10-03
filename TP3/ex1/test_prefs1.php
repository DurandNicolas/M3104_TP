<?php
/* ***************************************************************
  Fichier    : test_prefs1.php
  Langage    : PHP 5+
  Auteur     : Vincent Barré
  Extensions : -
  Paramètres : Aucun
*************************************************************** */

require_once ("Preferences.class.php");

session_start ();

if (isset($_SESSION['Prefs'])) {
    $mesPrefs = $_SESSION['Prefs'];
} else {
    $mesPrefs = new Preferences();
    $_SESSION['Prefs'] = $mesPrefs;
}

$mesPrefs->setCoulFond ("CAFE99");
$mesPrefs->setLang ("fr_FR");

$coulFond = $mesPrefs->getCoulFond ();
if (! is_null($coulFond)) {
    echo "<html><body style=\"background-color:#$coulFond\">";
} else {
    echo "<html><body>";
}
echo $mesPrefs->affPrefs ();
echo "</body></html>";
