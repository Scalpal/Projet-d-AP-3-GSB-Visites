<?php

if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}

include_once "$racine/modele/circuitDAO.php";
include_once "$racine/modele/pdo.php";
include_once "$racine/modele/photosDAO.php";
include_once "$racine/modele/activiteDAO.php";

$destination = 2;
$lesCircuits= circuitDAO::get_CircuitByDestination($destination);

$title = "TourismeIdéal : Thaïlande";
$ladestination=" Liste des circuits en Thaïlande :";

include "$racine/vue/vueEntete.php";
include "$racine/vue/vueThailande.php";
include "$racine/vue/vueListeCircuits.php";
include "$racine/vue/vueFooter.php";