<?php

include_once "$racine/modele/personneDAO.php";

if (connexionDAO::isLoggedOn()){
    $MailClient=$_SESSION["MailClient"]; 
    $MdpClient=$_SESSION["MdpClient"];
    $InfosPersonne = personneDAO::get_InfoPersonneByMail($MailClient);

    $IdClient= $InfosPersonne["IdClient"];

    $lesMedecins=medecinDAO::get_medecins();
}else{
    $title = "TourismeIdéal : Connexion ";
    include "$racine/vue/vueEntete.php";
    include "$racine/vue/vueConnexion.php";
} 

$NewNomClient="";
if (isset($_POST["NomClient"])){
    $NewNomClient=$_POST["NomClient"];
}

$NewPrenomClient="";
if (isset($_POST["PrenomClient"])){
    $NewPrenomClient=$_POST["PrenomClient"];
}

$NewAdresseClient="";
if (isset($_POST["AdresseClient"])){
    $NewAdresseClient=$_POST["AdresseClient"];
}

$NewTelClient="";
if (isset($_POST["TelClient"])){
    $NewTelClient=$_POST["TelClient"];
}

$NewMailClient="";
if (isset($_POST["MailClient"])){
    $NewMailClient=$_POST["MailClient"];
}

$NewMdpClient="";
if (isset($_POST["MdpClient"])){
    $NewMdpClient=$_POST["MdpClient"];
}

$validmodif = false;
$verification=false;

    if(isset($_POST["NomClient"]) && isset($_POST["PrenomClient"]) && isset($_POST["AdresseClient"]) 
    && isset($_POST["TelClient"]) && isset($_POST["MailClient"]) && isset($_POST["MdpClient"])){
        if ($_POST["NomClient"] !="" && $_POST["PrenomClient"] !="" && $_POST["AdresseClient"] !=""
        && $_POST["TelClient"] !="" && $_POST["MailClient"] !="" && $_POST["MdpClient"] !="" ){

            $modification=personneDAO::update_PersonneById($NewNomClient,$NewPrenomClient,$NewAdresseClient,$NewTelClient,$NewMailClient,
            $NewMdpClient,$IdClient);

            $verification=true;

        }else{
            $msg="Veuillez remplir les champs.";
        }
    }else{
        $msg ="Veuillez remplir les champs correctement.";
    }

    if ($verification==true){
        $validmodif=true;
    }else {
        $msg ="Modification invalide.";
    }

    if($validmodif == true){
        $title = "TourismeIdéal : Modification réussie !";

        include "$racine/vue/vueEntete.php";
        include "$racine/vue/vueConfirmationModification.php";
    }else {
        $title = "TourismeIdéal : Modification profil";

        include "$racine/vue/vueEntete.php";
        include "$racine/vue/vueModification.php";
    }