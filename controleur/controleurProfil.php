<?php

if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}

include_once "getRacine.php";
include_once "$racine/modele/connexionDAO.php";
include_once "$racine/modele/rapportDAO.php";
include_once "$racine/modele/visiteur.php";
include_once "$racine/modele/visiteurDAO.php";
include_once "$racine/modele/offrirDAO.php";   
include_once "$racine/modele/medicamentDAO.php";
include_once "$racine/modele/medecinDAO.php";

if (connexionDAO::isLoggedOn()){

    // Obligatoire pour que les infos du visiteur sur la navbar soient affichées
    $Visiteur= VisiteurDAO::get_visiteurByLogin($_SESSION['login']); 

    $action = $_GET['action'];

    switch($action){

        case "profil":

            $title = "GSB Visites : Mes rapports ";

            $_GET['id'] = null;

            $loginVisiteur=$_SESSION['login']; // récupération du login du visiteur connecté
            $leVisiteur = VisiteurDAO::get_visiteurByLogin($loginVisiteur); // création de l'objet visiteur à partir du login en paramètre pour utiliser ces données 
            $idVisiteur = $leVisiteur[0]->get_IdVisiteur(); // récupération de l'ID du visiteur 

            $lesRapportVisiteur = RapportDAO::get_rapportByIdVisiteur($idVisiteur); // récupération de tout les rapports du visiteur
            
            $critereRecherche = null; // Initialisation a null car par défaut, la barre de sélection doit être visible tant qu'aucune recherche n'a été faite 
            $critere = "Liste de vos rapports : "; // Le titre change lorsque une recherche est faite 

            include "$racine/vue/vueEntete.php";
            include "$racine/vue/vueNavbar.php";
            include "$racine/vue/vueProfil.php";
            require "$racine/vue/vueFooter.php";
        break;

        case "CreerRapport":

            $title = "GSB Visites : Création rapport ";

            // Cette condition me permet d'utiliser 2x le meme contrôleur pour faire la modification d'un médecin
            // Par défaut les $_POST sont vides donc la condition est forcément vraie et va donc m'afficher la vue du formulaire de modification 
            // Une fois que le formulaire est rempli on fait appelle au même contrôleur, sauf que la les $_POST ne seront pas vides donc c'est ce qui est dans le else qui va être exécuté.
            if (empty($_POST['dateRapport']) && empty($_POST['motifRapport']) && empty($_POST['bilanRapport']) && empty($_POST['medicament'])  && empty($_POST['quantite'])  && empty($_POST['idVisiteur']) && empty($_POST['medecin'])) {
                
                $lesMedecins = MedecinDAO::get_medecins(); // Agrémenter les options du champ select de médecins
                $lesMedicaments = MedicamentDAO::get_medicaments(); // Agrémenter les options du champ select de Médicaments 

                $loginVisiteur = $_SESSION['login']; // récupérer le login du visiteur connecté 
                $VisiteurRapport=VisiteurDAO::get_visiteurByLogin($loginVisiteur); // créer l'objet Visiteur du visiteur connecté
                $idVisiteur = $VisiteurRapport[0]->get_IdVisiteur(); // récupérer l'id du visiteur pour s'en servir dans le formulaire 

                include "vue/vueEntete.php";
                include "vue/vueNavbar.php";
                include "vue/vueFormulaireRapport.php";
                require "$racine/vue/vueFooter.php";
            }else{

                $dateRapport=null; // Date du rapport 
                if (isset($_POST["dateRapport"])){
                    $dateRapport = date('Y-m-d', strtotime($_POST['dateRapport']));
                }

                $motifRapport = null; // Motif du rapport 
                if (isset($_POST["motifRapport"])){
                    $motifRapport = $_POST["motifRapport"];
                }

                $bilanRapport = null; // Bilan du rapport 
                if (isset($_POST["bilanRapport"])){
                    $bilanRapport = $_POST["bilanRapport"];
                }

                $idMedicament=null; // Id du médicament 
                if (isset($_POST["medicament"])){
                    $idMedicament = $_POST["medicament"];
                }

                $quantiteOfferte=null; // Quantité offerte pour le médicament 
                if (isset($_POST["quantite"])){
                    $quantiteOfferte = $_POST["quantite"];
                }

                $idMedicamentTWO=null; // Id du deuxième médicament 
                if (isset($_POST["medicament2"])){
                    $idMedicamentTWO = $_POST["medicament2"];
                }

                $quantiteOfferteTWO=null; // Quantité offerte pour le deuxième médicament 
                if (isset($_POST["quantite2"])){
                    $quantiteOfferteTWO = $_POST["quantite2"];
                }

                $id = null; // Id du visiteur
                if (isset($_POST["idVisiteur"])){
                    $id=$_POST["idVisiteur"];
                }

                $medecin=null; // Id du medecin
                if (isset($_POST["medecin"])){
                    $medecin = $_POST["medecin"];
                }

                $req = RapportDAO::add_rapport($dateRapport, $motifRapport, $bilanRapport, $id, $medecin); // Ajout du rapport dans la BDD

                $lesRapports = RapportDAO::get_rapports(); // Récupération de tout les rapports 
                $DernierRapport = end($lesRapports); // Récupération du dernier rapport ajouté 
                $idDernierRapport = $DernierRapport->get_IdRapport(); // Récupération de l'id du dernier rapport pour s'en servir en tant que paramètre

                if ($idMedicament != null && $quantiteOfferte != null){
                    $reqOffrir = OffrirDAO::Add_MedicamentOffertRapport($idDernierRapport, $idMedicament, $quantiteOfferte); // requête d'ajout des médicaments offerts et de la qté associée dans la table offrir 
                }

                if ($idMedicamentTWO != null && $quantiteOfferteTWO != null){
                    $reqOffrirTWO = OffrirDAO::Add_MedicamentOffertRapport($idDernierRapport, $idMedicamentTWO, $quantiteOfferteTWO); // requête d'ajout des médicaments offerts et de la qté associée dans la table offrir 
                }

                if ($req == true){

                    $title = "GSB Visites : Confirmation rapport ";
                    include "vue/vueEntete.php";
                    include "vue/vueConfirmationRapport.php";
                    require "$racine/vue/vueFooter.php";
                }else {
                    echo "Votre rapport n'a pas pu être ajouté";
                }
            }
        break;

        case "modificationRapport":

            $idRapport = $_GET['id']; // Récupération de l'id du rapport choisi
            $leRapport = RapportDAO::get_rapportByIdRapport($idRapport); // Création de l'objet rapport avec l'id du rapport en paramètre

            // Cette condition me permet d'utiliser 2x le meme contrôleur pour faire la modification d'un médecin
            // Par défaut les $_POST sont vides donc la condition est forcément vraie et va donc m'afficher la vue du formulaire de modification 
            // Une fois que le formulaire est rempli on fait appelle au même contrôleur, sauf que la les $_POST ne seront pas vides donc c'est ce qui est dans le else qui va être exécuté.
            if (empty($_POST['motifRapport']) && empty($_POST['bilanRapport'])){

                $title = "GSB Visites : Modification d'un rapport ";

                include "vue/vueEntete.php";
                include "vue/vueNavbar.php";
                include "vue/vueModificationRapport.php";
                include "$racine/vue/vueFooter.php";
            }else{

                $nouveauMotif =null;
                if (isset($_POST['motifRapport'])){
                    $nouveauMotif = $_POST['motifRapport'];
                }

                $nouveauBilan =null;
                if (isset($_POST['bilanRapport'])){
                    $nouveauBilan = $_POST['bilanRapport'];
                }

                $req = RapportDAO::update_rapportById($leRapport->get_IdRapport(), $nouveauMotif, $nouveauBilan);

                if($req == true){

                    $title = "GSB Visites : confirmation de modification";

                    include "$racine/vue/vueEntete.php";
                    include "$racine/vue/vueConfirmationModificationRapport.php";
                    require "$racine/vue/vueFooter.php";
                }else{
                    echo ("Echec de la modification");
                }
            }
        break;

        case "rechercheRapport": 
            $_GET['id']=null;

            $dateRapport=null; // Date du rapport 
            if (isset($_POST["dateRapport"])){
                $dateRapport = date('Y-m-d', strtotime($_POST['dateRapport']));
            }

            if ($dateRapport != null){

                if (connexionDAO::isLoggedOn()){
                    $Visiteur= VisiteurDAO::get_visiteurByLogin($_SESSION['login']);
                }
                
                $req = RapportDAO::get_rapportByDate($dateRapport);
                
                $lesRapportVisiteur = $req; // Assignation du résultat de la requête de recherche à $lesRapportVisiteur car on utilise toujours la même vue pour l'affichage des rapports

                $title="GSB Visites : résultat de votre recherche";
                
                $critereRecherche = $dateRapport;
                $critere = " Liste de vos rapport datant du ".$critereRecherche.".";

                include "vue/vueEntete.php";
                include "vue/vueNavbar.php";
                include "vue/vueProfil.php";
                require "$racine/vue/vueFooter.php";
            }
        break;

    }   
}











