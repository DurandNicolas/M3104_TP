<?php
/* ***************************************************************
  Fichier    : Femme.class.php (classe dérivée de Humain.class.php)
  Langage    : PHP 5.0+
  Auteur     : Vincent Barré
  Extensions : Aucune
  Paramètres : Aucun
*************************************************************** */
include_once ('Humain.class.php');

class Femme extends Humain {
	
	public function __construct($nom, $age, $adresse) {
		
		parent::__construct($nom, $age, $adresse);
		echo "et c'est une femme<br />";
		
	}

	public function __destruct() {
	
		echo "et maintenant, elle repose en paix<br />";
				
	}
	
	public function getNom() {
		
		return "Madame ".$this->nom."<br />";
		
	}
	
}

?>