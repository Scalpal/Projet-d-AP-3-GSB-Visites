<?php

if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}

include_once "getRacine.php";
include_once "$racine/modele/visiteur.php";
include_once "$racine/modele/visiteurDAO.php";
include_once "$racine/modele/connexionDAO.php";

$title = "GSB Visites : connexion ";

$erreur =null;

$loginVisiteur=null;
$mdpVisiteur=null;

if ($_POST["login"] != null && $_POST["mdp"] != null){ // on vérifie que les champs ne sont pas nuls 
    if (isset($_POST["login"]) && isset($_POST["mdp"])){ // on vérifie que la variable $_POST est bien remplie une 2nde fois

        $loginVisiteur=$_POST["login"];
        $mdpVisiteur=$_POST["mdp"];

        $Visiteur=visiteurDAO::get_visiteurByLogin($loginVisiteur); // récupération des informations de l'utilisateur correspondant au mail entré 
 
        if ($Visiteur != null){ // on vérifie si le login rentré est bien dans la base de données 
            // si le mail et le mdp entré son pareil que ceux de l'utilisateur concerné on crée la connexion
            if ($loginVisiteur == $Visiteur[0]->get_login() && $mdpVisiteur == $Visiteur[0]->get_mdp()) {
                session_start();
                $_SESSION["login"] = $Visiteur[0]->get_login();
                $_SESSION["mdp"] = $Visiteur[0]->get_mdp();
                include "$racine/controleur/controleurAccueil.php";
            }else { 
                $title = "GSB Visites : connexion ";
                $erreur = "Mauvais login ou mot de passe.";

                include "$racine/vue/vueEntete.php";
                include "$racine/vue/vueConnexion.php";
                require "$racine/vue/vueFooter.php";
            }
        }else{
            $title = "GSB Visites : connexion ";
            $erreur = "Mauvais login ou mot de passe.";
            
            include "$racine/vue/vueEntete.php";
            include "$racine/vue/vueConnexion.php";
            require "$racine/vue/vueFooter.php";
        }
    }      
}else{
    $title = "GSB Visites : connexion ";
    $erreur = "Veuillez remplir les champs."; 

    include "$racine/vue/vueEntete.php";
    include "$racine/vue/vueConnexion.php";
    require "$racine/vue/vueFooter.php";
}


?>