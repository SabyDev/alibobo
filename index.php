
<?php
// pour definir le reseau horaire
date_default_timezone_set('Europe/Paris');

// pour savoir dans quel fuseau horaire dans lequel se trouve le server
$script_tz = date_default_timezone_get();

// première methode avec include les erreurs peuvent passer
// include './includes/header.php';
// include './includes/main.php';
// include './includes/footer.php';

// deuxième methode require est plus strict ne laisse passer aucune erreur fait tout planter
require_once './includes/header.php';
require_once './includes/main.php';
require_once './includes/footer.php';



?>