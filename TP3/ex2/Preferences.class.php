<?php
/* ***************************************************************
  Fichier    : Preferences.class.php
  Langage    : PHP 7.0+
  Auteur     : Vincent Barré
  Extensions : PDO (MySQL)
  Paramètres : Aucun
*************************************************************** */

class Preferences
{

    protected $utilisateur;
    protected $coulFond = null;
    protected $lang = null;
    protected $db;

    public function __construct($utilisateur = null)
    {

        if (is_null ($utilisateur)) {
            // Si l'utilisateur n'est pas spécifié en paramètre, on commence par vérifier dans session / cookie
            if (isset($_SESSION['login']) || isset($_COOKIE['login'])) {
                $this->utilisateur = (isset($_SESSION['login'])) ? $_SESSION['login'] : $_COOKIE['login'] ;
            } else {
                // On génère un nom aléatoire
                $this->utilisateur = $this->newUser (15);
            }
        } else {
            $this->utilisateur = $utilisateur;
        }

        $this->connectDB (); // initialisation de la connection à la base de données

        // On commence par tester si l'utilisateur est connu dans la base de données
        $sql = "SELECT * FROM Preferences WHERE login = :id";
        $st = $this->db->prepare ($sql);
        $ok = $st->bindValue ('id', filter_var ($this->utilisateur, FILTER_SANITIZE_STRING), PDO::PARAM_STR);
        if ($ok) {
            $st->execute ();
            if ($prefs = $st->fetch ()) {
                $user_exists = true;
            } else {
                $user_exists = false;
            }
        }

        if ($user_exists) {
            // L'utilisateur existe dans la BD et $prefs contient ses préférences
            // MAJ de la date de dernière connexion
            $sql = "UPDATE Preferences SET lastLog = CURRENT_TIMESTAMP WHERE login = :id"; // mise à jour du TimeStamp sur Update
            $st = $this->db->prepare ($sql);
            if (is_object ($st)) {
                $ok = $st->bindValue ('id', filter_var ($this->utilisateur, FILTER_SANITIZE_STRING), PDO::PARAM_STR);
                if ($ok) $st->execute ();
            }
            // On récupère ensuite les préférences de l'utilisateur
            // On écrase les cookies s'il y en avait (la BD contient la version la plus "à jour")
            $this->coulFond = $prefs["coulFond"];
            setcookie ("coulFond", $this->coulFond);
            $this->lang = $prefs["langue"];
            setcookie ("langue", $this->lang);
        } else {
            // Création des préférences pour ce nouvel utilisateur
            $sql = "INSERT INTO Preferences(login, coulFond, langue) VALUES (:id, :coulFond, :lang)";
            $st = $this->db->prepare ($sql);
            if (is_object ($st)) {
                $ok = $st->bindValue ('id', filter_var ($this->utilisateur, FILTER_SANITIZE_STRING), PDO::PARAM_STR);
                $ok = $ok && $st->bindValue ('coulFond', filter_var ($this->coulFond, FILTER_SANITIZE_STRING), PDO::PARAM_STR);
                $ok = $ok && $st->bindValue ('lang', filter_var ($this->lang, FILTER_SANITIZE_STRING), PDO::PARAM_STR);
                if ($ok) $ajout_ok = $st->execute ();
            }
            if (!$ajout_ok) {
                die("Probleme d'ajout d'un nouvel utilisateur lors de l'initialisation de l'objet...");
            } else {
                setcookie ("login", $this->utilisateur, time () + 31536000); // cookie d'une durée de vie de 1 an (365 * 24 * 3600 secondes)
            }
        }
    }

    public function newUser($longueur, $listeCar = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ')
    {
        $chaine = '';
        $max = mb_strlen ($listeCar, '8bit') - 1;
        for ($i = 0; $i < $longueur; ++$i) {
            $chaine .= $listeCar[random_int (0, $max)];
        }
        return $chaine;
    }

    protected function connectDB()
    {
        include ('params.inc.php');

        try {
            $this->db = new PDO(
                "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8",
                DB_USER,
                DB_PASS
            );
        } catch (PDOException $e) {
            // Connexion impossible... impossible donc d'aller plus loin !
            die("Impossible de se connecter a la source de donnees...");
        }
    }

    public function __sleep()
    {
        $this->db = null;
        return array('utilisateur', 'coulFond', 'lang');
    }

    public function __wakeup()
    {
        $this->connectDB ();
    }

    public function affPrefs()
    {
        // Affiche les préférences de l'utilisateur sous forme d'une table HTML

        return "<table><tr><td>Utilisateur</td><td>:</td><td>$this->utilisateur</td></tr>
				<tr><td>Couleur de fond</td><td>:</td><td>" . $this->getCoulFond () . "</td></tr>
				<tr><td>Langue</td><td>:</td><td>" . $this->getLang () . "</td></tr></table>";
    }

    public function getCoulFond()
    {
        return $this->coulFond;
    }

    public function setCoulFond($coulFond)
    {
        $this->coulFond = $coulFond;
        setcookie ("coulFond", $this->coulFond);
        $this->majPrefs ();
    }

    public function getLang()
    {
        return $this->lang;
    }

    public function majPrefs()
    {
        // Sauvegarde des préférences dans la base de données (l'utilisateur existe dans la base depuis l'initialisation de l'objet)

        if (!is_null ($this->utilisateur)) {
            $sql = "UPDATE Preferences SET coulFond = :coulFond, langue = :lang WHERE login = :id";
            $st = $this->db->prepare ($sql);
            if (is_object ($st)) {
                $ok = $st->bindValue ('coulFond', filter_var ($this->coulFond, FILTER_SANITIZE_STRING), PDO::PARAM_STR);
                $ok = $ok && $st->bindValue ('lang', filter_var ($this->lang, FILTER_SANITIZE_STRING), PDO::PARAM_STR);
                $ok = $ok && $st->bindValue ('id', filter_var ($this->utilisateur, FILTER_SANITIZE_STRING), PDO::PARAM_STR);
                if ($ok) $st->execute (); // Attention : la requête retourne 'faux' (et c'est normal) s'il n'y a pas de préférences à mettre à jour...
            }
        }
    }

    public function setLang($lang)
    {
        $this->lang = $lang;
        setcookie ("langue", $this->lang);
        $this->majPrefs ();
    }

}