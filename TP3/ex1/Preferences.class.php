<?php
/* ***************************************************************
  Fichier    : Preferences.class.php
  Langage    : PHP 5+
  Auteur     : Vincent Barré
  Extensions : -
  Paramètres : Aucun
*************************************************************** */

class Preferences
{

    protected $coulFond = null;
    protected $lang = null;

    public function __construct()
    {
        // les préférences de l'utilisateur sont (peut-être) stockées dans un cookie
        if (isset($_COOKIE['coulFond'])) {
            $this->coulFond = $_COOKIE['coulFond'];
        }
        if (isset($_COOKIE['langue'])) {
            $this->lang = $_COOKIE['langue'];
        }
    }

    public function affPrefs()
    {
        // Affiche les préférences de l'utilisateur sous forme d'une table HTML
        return "<table>
				    <tr><td>Couleur de fond</td><td>:</td><td>" . $this->getCoulFond () . "</td></tr>
				    <tr><td>Langue</td><td>:</td><td>" . $this->getLang () . "</td></tr>
				</table>";
    }

    public function getCoulFond()
    {
        return $this->coulFond;
    }

    public function setCoulFond($coulFond)
    {
        $this->coulFond = $coulFond;
        setcookie ("coulFond", $this->coulFond);
    }

    public function getLang()
    {
        return $this->lang;
    }

    public function setLang($lang)
    {
        $this->lang = $lang;
        setcookie ("langue", $this->lang);
    }
}