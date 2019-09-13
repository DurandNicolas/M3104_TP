<?php
/* ***************************************************************
  Fichier    : exemple.php
  Langage    : PHP 5.0+
  Auteur     : Vincent Barré
  Extensions : Aucune
  Paramètres : Aucun
*************************************************************** */
include_once ('Homme.class.php');
include_once ('Femme.class.php');

  $unHomme = new Homme("Jean Dupont", 25, "52 rue des DRs calmette et guérin, 53000 LAVAL");
  echo $unHomme->getNom();
  unset($unHomme);
  echo "<br />";
  $uneFemme = new Femme("Julie Durand", 23, "52 rue des DRs calmette et guérin, 53000 LAVAL");
  echo $uneFemme->getNom();
  // pas de unset($uneFemme); qu'observez vous alors ?
?>
