<?php

if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}

include "getRacine.php";
include "$racine/modele/reservationDAO.php";
include_once "$racine/modele/connexionDAO.php";
include_once "$racine/modele/pdo.php";

$reservation = false;
$verification=false;
$msg="";

if (connexionDAO::isLoggedOn() == true){

    $MailClient=$_SESSION["MailClient"]; 
    $MdpClient=$_SESSION["MdpClient"];
    $InfosPersonne = personneDAO::get_InfoPersonneByMail($MailClient);

    $IdClient= $InfosPersonne["IdClient"];

    if(isset($_POST["CodeCircuit"]) && isset($_POST["MoyenPaiementRes"])){
        if ($_POST["CodeCircuit"] !="" && $_POST["MoyenPaiementRes"] !=""){
            $CodeCircuit=$_POST["CodeCircuit"];
            $MoyenPaiement=$_POST["MoyenPaiementRes"];

            $req= reservationDAO::add_reservationByCodeCircuit($MoyenPaiement,$IdClient,$CodeCircuit);
            $verification=true;
            
            if ($verification == true){
                $reservation=true;
            }
            else{
                $msg ="La réservation n'a pas pu être finalisée.";
            }
        }
    }else{
        $msg="Veuillez renseigner tout les champs. ";
    }
    if ($reservation== true) {
        // appel du script de vue qui permet de gerer l'affichage des donnees
        $title = "Réservation confirmée";
        include "$racine/vue/vueEntete.php";
        include "$racine/vue/vueConfirmationReservation.php";
    } else {
        // appel du script de vue qui permet de gerer l'affichage des donnees
        $title = " TourismeIdéal : Réservation  ";
        include "$racine/vue/vueEntete.php";
        include "$racine/vue/vueReservation.php";
    }
}else{
    $title="TourismeIdéal : Connexion";
    include "$racine/vue/vueEntete.php";
    include "$racine/vue/vueConnexion.php";
}

