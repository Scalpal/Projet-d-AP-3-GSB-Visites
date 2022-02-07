<?php

ini_set('display_errors', 'on');

date_default_timezone_set("Europe/Paris");

include "getRacine.php";
include "$racine/controleur/controleurPrincipal.php";
include_once "$racine/modele/connexionDAO.php"; // pour pouvoir utiliser isLoggedOn() 

if (isset($_GET["action"])) {
    $action = $_GET["action"];
} 
else {
    $action = "defaut";
} 

$fichier = controleurPrincipal($action);
include_once "$racine/controleur/$fichier";  

