<?php

function controleurPrincipal($action) {
  $lesActions = array();

  //Accueil
  $lesActions["defaut"] = "controleurAccueilNoWlcm.php";
  $lesActions["accueil"] = "controleurAccueil.php";
  $lesActions["accueilNW"] = "controleurAccueilNoWlcm.php";

  //Rapports
  $lesActions["profil"] = "controleurRapport.php";
  $lesActions["CreerRapport"]= "controleurRapport.php";
  $lesActions["modificationRapport"] = "controleurRapport.php";
  $lesActions["rechercheRapport"] = "controleurRapport.php";

  //Médecins
  $lesActions["medecin"] = "controleurMedecin.php";  
  $lesActions["modificationMedecin"] = "controleurMedecin.php";
  $lesActions["rechercheMedecin"] = "controleurMedecin.php";
  $lesActions["rapportMedecin"] = "controleurMedecin.php";

  //Connexion
  $lesActions["connexion"] = "controleurConnexion.php";
  $lesActions["deconnexion"] = "controleurDeconnexion.php";

  if (array_key_exists($action, $lesActions)) {
    return $lesActions[$action];
  } 
  else {
    return $lesActions["defaut"];
  }
}

?>