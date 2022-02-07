<?php

if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}

include_once "getRacine.php";
include_once "$racine/modele/pdo.php";
include_once "$racine/modele/circuitDAO.php";
include_once "$racine/modele/photosDAO.php";
include_once "$racine/modele/activiteDAO.php";


$destination=null;
if (isset($_POST["destinations"])){
    $destination = $_POST["destinations"];
}

$villeDepart=null;
if (isset($_POST["VilleDepart"])){
    $villeDepart = $_POST["VilleDepart"];
}

$dateDepart=null;
if (isset($_POST["DateDepart"])){
    $dateDepart = $_POST["DateDepart"];
}

$duree=null;
if (isset($_POST["Duree"])){
    $duree = $_POST["Duree"];
}

$prix =null;
if(isset($_POST["PrixCircuit"])){
    $prix = $_POST["PrixCircuit"];
}

if($destination == null && $villeDepart == null && $dateDepart == null && $duree == null && $prix == null){
    $lesCircuits=circuitDAO::get_Circuit();
}

$lesCircuits=circuitDAO::get_CircuitBySelect($destination,$villeDepart,$dateDepart,$duree,$prix);

$ladestination="Liste des circuits :";

$title="TourismeIdéal : Les circuits ";
include_once "$racine/vue/vueEntete.php";
require "$racine/vue/vueNavbarDestination.php"; 
include_once "$racine/vue/vueListeCircuits.php";
include_once "$racine/vue/vueFooter.php";


