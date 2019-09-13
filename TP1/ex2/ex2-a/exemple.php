<?php
/* ***************************************************************
  Fichier    : exemple.php
  Langage    : PHP 5.0+
  Auteur     : Vincent Barré
  Extensions : Aucune
  Paramètres : Aucun
*************************************************************** */
  include_once ('Humain.class.php');

  $h = new Humain("Jean Dupont", 25, "52 rue des DRs calmette et guérin, 53000 LAVAL");
  echo $h->getNom();
