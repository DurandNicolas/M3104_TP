<?php
/* ***************************************************************
  Fichier    : Homme.class.php (classe dérivée de Humain.class.php)
  Langage    : PHP 5.0+
  Auteur     : Vincent Barré
  Extensions : Aucune
  Paramètres : Aucun
*************************************************************** */
include_once ('Humain.class.php');

class Homme extends Humain {
	
	public function __construct($nom, $age, $adresse) {
		
		parent::__construct($nom, $age, $adresse);
		echo htmlentities("et c'est un homme")."<br />";

	}

	public function __destruct() {
	
		echo "et maintenant, il repose en paix<br />";
				
	}

	public function getNom() {
		
		return "Monsieur ".$this->nom."<br />";
		
	}
	
}

?>
