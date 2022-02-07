<?php

if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}

include "getRacine.php";
include_once "$racine/modele/connexionDAO.php";

connexionDAO::logout();

$title =" GSB Visites : Connexion ";
$erreur = null; // Initialisation de la variable $erreur a null car elle ne doit pas être affichée par défaut

include_once "$racine/vue/vueEntete.php"; 
include_once "$racine/vue/vueConnexion.php";
require "$racine/vue/vueFooter.php";





