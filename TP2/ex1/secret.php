<?php
// Fichier dans la zone privée : on vérifie l'authentification via la session
session_start ();

if (isset($_SESSION['auth']) && $_SESSION['auth'] == 1) {
    echo "C'est ok, vous êtes bien authentifié pour cette page";
} else {
    echo "Accès anonyme interdit !";
}