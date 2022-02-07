<?php

if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}

include_once "$racine/modele/circuitDAO.php";
include_once "$racine/modele/pdo.php";
include_once "$racine/modele/photosDAO.php";
include_once "$racine/modele/activiteDAO.php";

$destination = 1;
$lesCircuits= circuitDAO::get_CircuitByDestination($destination);


$title="TourismeIdéal : Dubaï";
$ladestination=" Liste des circuits à Dubaï : ";

include "$racine/vue/vueEntete.php";
include "$racine/vue/vueDubai.php";
include "$racine/vue/vueListeCircuits.php";
include "$racine/vue/vueFooter.php";