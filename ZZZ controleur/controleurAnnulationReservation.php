<?php

if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}

include_once "$racine/modele/reservationDAO.php";
include_once "$racine/modele/personneDAO.php";
include_once "$racine/modele/circuitDAO.php";

if (connexionDAO::isLoggedOn()){
    $MailClient=$_SESSION["MailClient"]; 
    $MdpClient=$_SESSION["MdpClient"];
    $InfosPersonne = personneDAO::get_InfoPersonneByMail($MailClient);

    $IdClient= $InfosPersonne["IdClient"];
    $lesCircuits = circuitDAO::get_CircuitByReservation($IdClient);

    $IdReservation=reservationDAO::get_ReservationByIdClient($IdClient);

    $verification=false;
    $annulation=false;

    if (isset($_POST["IdReservation"])){
        if ($_POST["IdReservation"] != null){

            $IdRes=$_POST["IdReservation"];

            $req=reservationDAO::delete_reservation($IdRes,$IdClient);
            $verification=true;

            if ($verification == true){
                $annulation=true;
            }else{
                $msg= "L'annulation n'a pas pu être finalisée. ";
            }
        }else {
            $msg= "La réservation n'a pas pu être annulée.";
        }
    }else {
        $msg="Veuillez renseigner tout les champs correctement.";
    }

    if ($annulation==true){
        $title="TourismeIdéal : réservation annulée !";
        include "$racine/vue/vueEntete.php";
        include "$racine/vue/vueConfirmationAnnulation.php";
    }else{
        $title="TourismeIdéal : annulation réservation";
        include "$racine/vue/vueEntete.php";
        include "$racine/vue/vueAnnulationReservation.php";
    }
}else {
    $title="TourismeIdéal : Connexion";
    include "$racine/vue/vueEntete.php";
    include "$racine/vue/vueConnexion.php";
}


