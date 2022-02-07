<?php

if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}

include_once "getRacine.php";
include_once "$racine/modele/circuitDAO.php";
include_once "$racine/modele/pdo.php";
include_once "$racine/modele/photosDAO.php";
include_once "$racine/modele/activiteDAO.php";

$destination = 3;
$lesCircuits= circuitDAO::get_CircuitByDestination($destination);

$title = "TourismeIdéal : Cambodge";
$ladestination=" Liste des circuits au Cambodge : ";

include "$racine/vue/vueEntete.php";
include "$racine/vue/vueCambodge.php";
include "$racine/vue/vueListeCircuits.php";
include "$racine/vue/vueFooter.php";