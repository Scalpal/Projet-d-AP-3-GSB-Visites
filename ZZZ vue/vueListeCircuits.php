<body id="circuit">

<h2 id="listeCircuits"><?= $ladestination ?></h2>

<?php 

if($lesCircuits != null){ // Vérifie si il y'a au moins 1 circuit à afficher (pour éviter les erreurs)
  
  for ($i=0 ; $i<count($lesCircuits); $i++){
      
    ?>
    <div class="listeCircuits">
    <?php 

    $CodeCircuit=$lesCircuits[$i]->get_CodeCircuit(); // récupération du CodeCircuit du circuit pour s'en servir en tant que paramètre
    $lesPhotos= photosDAO::get_PhotoByCodeCircuit($CodeCircuit); ?> <!-- récupération dans la bdd de l'image qui correspond au circuit -->
          
    <a href="images/<?= $lesPhotos[0]['CheminPhoto'] ?>"><img src="images/<?= $lesPhotos[0]['CheminPhoto']?>" height="252" width="360" class="Photos" /></a>
      
    <p id="infosCircuit"> <?php echo "<b>Circuit n°".$lesCircuits[$i]->get_CodeCircuit().
    "</b><br> <b>Nom du circuit :</b> ".$lesCircuits[$i]->get_NomCircuit().
    "<br> <b>Date de départ :</b> ".$lesCircuits[$i]->get_DateDepart().
    "<br> <b>Ville de départ :</b> ".$lesCircuits[$i]->get_VilleDepart().
    "<br> <b>Destination :</b> ".$lesCircuits[$i]->get_DestinationsIntoStr(); ?></p>

    <?php
    
    $listeActivite=activiteDAO::get_activiteByCodeCircuit($CodeCircuit); ?> <!-- récupération des activités qui correspondent au CodeCircuit en paramètre -->

    <p id="infosActivite"> 
    <?php echo "<b>Liste d'activités :</b><br>";

    for ($e=0 ; $e<count($listeActivite) ; $e++){ // boucle qui permet l'affichage de toutes les activités du circuit 
      $IdAct=$listeActivite[$e]->get_IdAct(); // récupération de l'id de l'activité 
      $lesPhotosAct= photosDAO::get_PhotosByIDAct($IdAct); ?> <!-- récupération de l'image qui correspond à l'id de l'activité -->
      <a href="images/<?= $lesPhotosAct[0]['CheminPhoto'] ?>">-<?php echo ($listeActivite[$e]->get_NomAct()) ?></a> 
      <?php echo "<br> <b>Prix de l'activité :</b> ".$listeActivite[$e]->get_PrixAct()."€<br>"; 
    } 
    
    ?></p>
    <div id="infosReservation">

      <p id="textReservationHaut"><?php echo "<b>Prix :</b> ".$lesCircuits[$i]->get_PrixCircuit()." €"; ?> </p>
      
      <form action="./?action=reservation" method="post">
        <input type="submit" value="Réserver" id="circuitReserve" /> 
      </form>
    
      <p id="textReservationBas"><?php echo "<b>Durée :</b> ".$lesCircuits[$i]->get_Duree()." jours"; ?></p>

    </div>  
  </div>
    
  <?php 
  }
}else{ ?>
  <p class="descriptionsiteAccueil">
  <?php echo "Désolé, aucun de nos circuits ne correspond à vos critères de recherche."; ?>
  </p>
<?php } ?>


