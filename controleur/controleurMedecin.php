<?php

include "getRacine.php";
include "modele/medecin.php";
include "modele/medecinDAO.php";
include "modele/rapportDAO.php";
include "modele/offrirDAO.php";
include "modele/medicamentDAO.php";

if (connexionDAO::isLoggedOn()){
    // Obligatoire pour que les infos du visiteur sur la navbar soient affichées
    $Visiteur= VisiteurDAO::get_visiteurByLogin($_SESSION['login']); 

    $action = $_GET['action'];

    switch($action){

        case "medecin":
            $title = "GSB Visites : liste des médecins";

            $critere = null; // Initialisation de la variable $critere a null car il n'y en a pas par défaut 

            //Par défaut, la variable $_GET est nulle, donc elle ne peut pas être assignée à la variable $tri si celle-ci n'existe pas, il faut donc initialiser $tri dés le départ 
            $tri=null;
            if (!empty($_GET['order'])){
                $tri = $_GET['order'];
            }

            // Le tri se fait ici, dépendant de la valeur du $_GET, $tri va faire appelle à une fonction spécifique pour $lesMedecins ce qui affectera la liste des médecins affichés sur la vue
            // $critere aura aussi une valeur différente en fonction de $tri
            if ($tri != null && $tri != "ZA"){

                $lesMedecins = MedecinDAO::get_medecinsOrderBy($tri);

            }elseif($tri == "ZA"){

                $lesMedecins = MedecinDAO::get_medecinsOrderByNomZA();
                $critere = "trié par ordre alphabétique inversé (Z - A).";

            }else{

                $lesMedecins = MedecinDAO::get_medecins();

            }

            if ($tri == "id"){
                $critere = "trié par ID.";
            }elseif($tri == "specialitecomplementaire"){
                $critere = "trié par spécialité.";
            }elseif($tri == "departement"){
                $critere = "trié par département.";
            }

            include "vue/vueEntete.php";
            include "$racine/vue/vueNavbar.php";
            include "vue/vueMedecin.php";
            require "$racine/vue/vueFooter.php";
        break;

        case "modificationMedecin":
            $idMedecin = $_GET['id'];
            $Medecin = MedecinDAO::get_medecinById($idMedecin);

            // Cette condition me permet d'utiliser 2x le meme contrôleur pour faire la modification d'un médecin
            // Par défaut les $_POST sont vides donc la condition est forcément vraie et va donc m'afficher la vue du formulaire de modification 
            // Une fois que le formulaire est rempli on fait appelle au même contrôleur, sauf que la les $_POST ne seront pas vides donc c'est ce qui est dans le else qui va être exécuté.
            if (empty($_POST['nom']) && empty($_POST['prenom']) && empty($_POST['adresse']) && empty($_POST['tel'])  && empty($_POST['specialite'])  && empty($_POST['departement'])){

                $title = "GSB Visites : Modification des informations d'un médecin ";

                include "vue/vueEntete.php";
                include "$racine/vue/vueNavbar.php";
                include "$racine/vue/vueModificationMedecin.php";
                require "$racine/vue/vueFooter.php";

            }else{

                $id = $idMedecin; 

                $nom ="";
                if (isset($_POST['nom'])){
                    $nom = $_POST['nom'];
                }

                $prenom ="";
                if (isset($_POST['prenom'])){
                    $prenom = $_POST['prenom'];
                }

                $newAdresse ="";
                if (isset($_POST['adresse'])){
                    $newAdresse = $_POST['adresse'];
                }

                $newTel =null;
                if (isset($_POST['tel'])){
                    $newTel = $_POST['tel'];
                }

                $newSpecialite =null;
                if (isset($_POST['specialite'])){
                    $newSpecialite = $_POST['specialite'];
                }

                $newDepartement ="";
                if (isset($_POST['departement'])){
                    $newDepartement = $_POST['departement'];
                }
                
                $req = MedecinDAO::update_MedecinById($idMedecin, $nom, $prenom, $newAdresse,$newTel,$newSpecialite, $newDepartement);

                if($req == true){

                    $title = "GSB Visites : confirmation de modification";
                    
                    include "vue/vueEntete.php";
                    include "vue/vueConfirmationModifMedecin.php";
                    require "$racine/vue/vueFooter.php";
                }else{
                echo ("Echec de la modification");
                }
            }
        break;

        case "rechercheMedecin":
            // Étant donné que les nom des médecins sont tous en majuscules, et que lorsque l'on fait une recherche, on écrit pas forcément tout en majuscule, je transforme le texte du 
            // $_POST en majuscule étant donné que c'est une requête en LIKE 
            $idMedecin= null;
            if (isset($_POST['nom'])){
                $idMedecin = strtoupper($_POST['nom']); 
            }

            if ($idMedecin != null){

                $lesMedecins = MedecinDAO::get_medecinByNom($idMedecin);

                $title = "GSB Visites : résultat de votre recherche ";

                $critere = "dont le nom commence par '".$_POST['nom']."'";

                include "$racine/vue/vueEntete.php";
                include "$racine/vue/vueNavbar.php";
                include "$racine/vue/vueMedecin.php";
                require "$racine/vue/vueFooter.php";
            }
        break;

        case "rapportMedecin":
            $idMedecin = $_GET['id']; // Récupération de l'id du médecin choisi
            $lesRapportVisiteur = RapportDAO::get_rapportByIdMedecin($idMedecin); // Récupération de tout les rapports du médecin dont l'id est en paramètre

            $leMedecin = MedecinDAO::get_medecinById($idMedecin);

            $title = "GSB Visites : rapport du médecin ".$leMedecin->get_Nom()." ".$leMedecin->get_Prenom();

            $critereRecherche = $leMedecin->get_Nom()." ".$leMedecin->get_Prenom(); // Assignation du nom et du prénom du médecin choisi dans une variable pour m'en servir dans $critere

            $critere = " Liste des rapports du Dr. ".$critereRecherche;

            include "$racine/vue/vueEntete.php";
            include "$racine/vue/vueNavbar.php";
            include "$racine/vue/vueProfil.php";
            include "$racine/vue/vueFooter.php";
        break;
    }
}

