<?php
require ('Statistiques.class.php');
$stats = new Statistiques();
echo "Nombre d'acc&eacute;s &agrave; la page : <br />";
echo $stats->showPageAccess ();