<?php

if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}

$title = "GSB Visites : Accueil";

include_once "getRacine.php";
include_once "$racine/modele/connexionDAO.php"; 
include_once "$racine/modele/visiteurDAO.php";
include_once "$racine/modele/rapportDAO.php";
include_once "$racine/modele/offrirDAO.php";

if (connexionDAO::isLoggedOn()){

    $Visiteur= VisiteurDAO::get_visiteurByLogin($_SESSION['login']);
    $idVisiteur = $Visiteur[0]->get_IdVisiteur(); // récupération de l'ID du visiteur 
    $nomVisiteur = $Visiteur[0]->get_NomVisiteur(); // récupération du nom du visiteur 
    $prenomVisiteur = $Visiteur[0]->get_PrenomVisiteur(); // récupération du prénom du visiteur 

    $lesRapportVisiteur = RapportDAO::get_rapportByIdVisiteur($idVisiteur); // récupération de tout les rapports du visiteur

    // Vérification si le visiteur a des rapports 
    if ($lesRapportVisiteur == null){
        $message  = "Vous n'avez aucun rapport.";
    }

    require "$racine/vue/vueEntete.php";
    require "$racine/vue/vueNavbar.php";
    require "$racine/vue/vueAccueil.php";
    require "$racine/vue/vueFooter.php";
}else{
    $title = "GSB Visites : Connexion";
    $erreur = null;
    include "$racine/vue/vueEntete.php";
    include "$racine/vue/vueConnexion.php";
}

?>