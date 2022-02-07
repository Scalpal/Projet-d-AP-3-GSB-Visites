if($lesRapportVisiteur != null){ ?>

<div id="full-rapport-card" style="border:1px solid black">
    
<?php 
for ( $i=0 ; $i<count($lesRapportVisiteur) ; $i++){ 
    
    // récupération dans la table offrir de l'ID du médicament et de sa quantité offerte
    $IdMedicamentsRapport= OffrirDAO::get_IdMedicamentOffertRapport($lesRapportVisiteur[$i]->get_IdRapport()); // ID des médicaments du rapport
    $QteMedicamentsRapport= OffrirDAO::get_QteMedicamentOffertRapport($lesRapportVisiteur[$i]->get_IdRapport()); // Quantité des médicaments du rapport 

    $lesMedicaments=[]; // Initialisation du tableau des médicaments 
    
    for ($nombreMedicament = 0 ; $nombreMedicament < count($IdMedicamentsRapport) ; $nombreMedicament++){ 
        
        $idMedicament = $IdMedicamentsRapport[$nombreMedicament]['idMedicament']; // récupération dans une variable de l'ID du médicament 
        $leMedicament = MedicamentDAO::get_MedicamentById($idMedicament); // création de l'objet médicament pour afficher ces données 

        $lesMedicaments[] = $leMedicament; // Stockage des objets médicaments dans un tableau de médicaments

    }

    $leMedecin = MedecinDAO::get_medecinById($lesRapportVisiteur[$i]->get_IdMedecin());

   ?>
    
    <div id="rapport-card">

        <!-- <h2 class="card-head"> Rapport <?php //echo $lesRapportVisiteur[$i]->get_IdRapport(); ?> </h2> -->
    
        <p> <strong> Id du rapport : </strong><?php echo $lesRapportVisiteur[$i]->get_IdRapport(); ?> </p>
        <p> <strong> Date du rapport : </strong><?php echo $lesRapportVisiteur[$i]->get_DateRapport() ?> </p>
        <p> <strong> Motif du rapport : </strong><?php echo $lesRapportVisiteur[$i]->get_Motif() ?> </p>
        <p> <strong> Bilan du rapport : </strong><?php echo $lesRapportVisiteur[$i]->get_Bilan() ?> </p>
        
        <div id="details-hover">
            <h3 id="details"> ID du médecin concerné : <?php echo $lesRapportVisiteur[$i]->get_IdMedecin() ?> </h3>
                <span> 
                <strong>Nom : </strong><?php echo $leMedecin->get_Nom(); ?> <br/>
                <strong>Prénom : </strong><?php echo $leMedecin->get_Prenom(); ?> <br/>
                <strong>Adresse : </strong><?php echo $leMedecin->get_Adresse(); ?> <br/>
                <strong>Téléphone : </strong><?php echo $leMedecin->get_Tel(); ?> <br/>
                <strong>Spécialité complémentaire : </strong><?php if ($leMedecin->get_Specialite() == null){ echo ("Aucune"); }else{echo ($leMedecin->get_Specialite());}?> <br/>
                <strong>Département : </strong><?php echo $leMedecin->get_Departement(); ?> <br/>
                </span>
        </div>

        <?php

    if ($IdMedicamentsRapport == null ){ ?>
        <h3> Aucun médicament proposés </h3> <?php
    }else{
        for ( $j=0 ; $j < count($lesMedicaments) ; $j++){ ?>
            
            <?php $quantiteOfferte = $QteMedicamentsRapport[$j]['quantite']; // récupération de la quantité offerte du médicament ?>

            <div id="details-hover">
                <h3 id="details"> ID du médicament proposé : <?php echo $lesMedicaments[$j]->get_IdMedicament(); ?> </h3>
                <span> 
                    <strong>Nom : </strong><?php echo $lesMedicaments[$j]->get_NomCommercial(); ?> <br/>
                    <strong>Composition : </strong> <?php echo $lesMedicaments[$j]->get_Composition(); ?> <br/>
                    <strong>Effets : </strong> <?php echo $lesMedicaments[$j]->get_Effets(); ?> <br/>
                    <strong>Contreindications : </strong> <?php echo $lesMedicaments[$j]->get_ContreIndication(); ?> <br/>
                </span>
            </div>
               
            <h3> Quantité offerte : <?php echo $quantiteOfferte ; ?> </h3>

        <?php } 
    } ?>

    <a href="./?action=modificationRapport&id=<?php echo $lesRapportVisiteur[$i]->get_IdRapport(); ?>"> Modifier</a>

    </div>
<?php } ?>
</div>
<?php }else{ ?>
<h1> Vous n'avez aucun rapports. </h1>
<?php } ?>
</div>