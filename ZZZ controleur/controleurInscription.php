<?php

if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}

include_once "getRacine.php";
include_once "$racine/modele/pdo.php";
include_once "$racine/modele/personneDAO.php";


$inscrit = false;
$verification=false;
$msg="";
// recuperation des donnees GET, POST, et SESSION
if (isset($_POST["NomClient"]) && isset($_POST["PrenomClient"]) && isset($_POST["AdresseClient"]) && isset($_POST["TelClient"]) && isset($_POST["MailClient"]) && isset($_POST["MdpClient"])) {

    if ($_POST["NomClient"] !="" && $_POST["PrenomClient"] !="" && $_POST["AdresseClient"] !="" && $_POST["TelClient"] !="" && $_POST["MailClient"] != "" && $_POST["MdpClient"] != "") {
        $NomClient=$_POST["NomClient"];
        $PrenomClient=$_POST["PrenomClient"];
        $AdresseClient=$_POST["AdresseClient"];
        $TelClient=$_POST["TelClient"];
        $MailClient = $_POST["MailClient"];
        $MdpClient = $_POST["MdpClient"];

        // enregistrement des donnees
        $ret = personneDAO::add_personne($NomClient,$PrenomClient,$AdresseClient,$TelClient,$MailClient,$MdpClient);
        $verification=true;
        if ($verification==true) {
            $inscrit = true;
        } else {
            $msg = "l'utilisateur n'a pas pu être inscrit";
        }
    }
 else {
    $msg="Renseigner tous les champs...";    
    }
}

if ($inscrit== true) {
    // appel du script de vue qui permet de gerer l'affichage des donnees
    $title = "Inscription confirmée";
    include "$racine/vue/vueEntete.php";
    include "$racine/vue/vueConfirmationInscription.php";
} else {
    // appel du script de vue qui permet de gerer l'affichage des donnees
    $title = "Inscription : invalide ";
    include "$racine/vue/vueEntete.php";
    include "$racine/vue/vueInscription.php";
}