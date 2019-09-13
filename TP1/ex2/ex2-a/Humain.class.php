<?php
/* ***************************************************************
  Fichier    : Humain.class.php (classe)
  Langage    : PHP 5.0+
  Auteur     : Vincent Barré
  Extensions : Aucune
  Paramètres : Aucun
*************************************************************** */

class Humain {
	
	protected $nom;
	protected $age;
	protected $adresse;
	
	public function __construct($nom, $age, $adresse) {
		
		$this->nom = $nom;
		$this->age = $age;
		$this->adresse = $adresse;
		echo "Un &ecirc;tre humain est n&eacute;<br>";
		
	}
	
	public function getAge() {
		
		return $this->age;
		
	}

	public function anniversaire() {
		
		$this->age++;
		
	}
	
	public function getNom() {
		
		return $this->nom;
		
	}
	
	public function getAdresse() {
		
		return $this->adresse;
		
	}
	
}
