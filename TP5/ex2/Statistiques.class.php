<?php


class Statistiques
{
    private $page;
    private $db;

    public function __construct() {
        include ('params.inc.php');

        $this->page = $_SERVER['PHP_SELF'];

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

        $sql = "INSERT INTO TP5_Statistiques (uri) VALUES ('$this->page')";
        $this->db->exec($sql);
    }

    public function showPageAccess() {

        $sql = "SELECT COUNT(stamp) AS nb FROM TP5_Statistiques WHERE uri = '$this->page'";
        $st = $this->db->query ($sql);
        if ($ligne = $st->fetch ()) {
            echo $ligne['nb'];
        }
    }

    public function getStatsPNG() {

        $sql = "SELECT uri, COUNT(stamp) AS nb FROM TP5_Statistiques GROUP BY uri ORDER BY nb DESC";
        $data = $this->db->query($sql);

        $image = imagecreate(1000, 500);

        $blanc = imagecolorallocate($image, 255, 255, 255);
        $orange = imagecolorallocate($image, 255, 128, 0);
        $noir = imagecolorallocate($image, 0, 0, 0);

        $nombreAccesMax = 0;
        $y = 20;
        while ($ligne = $data->fetch()) {
            $page = $ligne['uri'];
            $nombreAcces = $ligne['nb'];
            if($nombreAcces > $nombreAccesMax)
                $nombreAccesMax = $nombreAcces;

            imagestring($image, 4, 20, $y, $page, $noir);
            imagefilledrectangle($image, 300, $y, 300 + 700 * ($nombreAcces / $nombreAccesMax), $y+20, $orange);
            $y+=25;
        }
        header("Content-type: image/png");
        imagepng($image);

    }

}