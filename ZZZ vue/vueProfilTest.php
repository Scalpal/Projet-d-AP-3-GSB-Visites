
<div class="placement-mid">
    <nav id="navbar">  
        <a href='./?action=rapport'> Créer un rapport </a>
        <a href='./?action=accueilNW'> Accueil</a>
        <a href="./?action=medecin"> Consulter les médecins </a>
    </nav>
</div>

<div id="profil-content">

    <h1 id="research-title"><?php if ($critere != null){echo ($critere) ;
        }else{ echo ":";} ?> </h1>

    <?php
    if($critereRecherche == null){ ?>
        <div id="search-bar-medecin">

            <form action="./?action=rechercheRapport" id="caca" method="post">
                <select name="dateRapport" id="zoneEcnx">
                    <option value="" disabled selected hidden>Date du rapport </option>
                    <?php for ( $o=0; $o<count($lesRapportVisiteur) ; $o++){ 
                        
                        if(!in_array($lesRapportVisiteur[$o]->get_DateRapport(),$tableauDate)){ ?>
                            <option value="<?php echo $lesRapportVisiteur[$o]->get_DateRapport(); ?>"><strong>Rapports du <?php echo $lesRapportVisiteur[$o]->get_DateRapport(); ?></option>
                        <?php } 
                        
                        $tableauDate[] = $lesRapportVisiteur[$o]->get_DateRapport();  } ?>
                </select>

                <input type="image" id="search-bar-submit-rapport" src="images/search-alt-2-regular-36.png">
            </form> 
        </div> <?php
    } 

    if($lesRapportVisiteur != null){ ?>

        <div id="full-rapport-card">

            <table id="rapport-table">
                <thead>
                    <th> ID</th>
                    <th> Date du rapport</th>
                    <th> Motif du rapport</th>
                    <th> Bilan du rapport </th>
                    <th> Id du médecin </th>
                    <th> Id du médicament </th>
                    <th> Quantité offerte </th>
                </thead>

                <tbody>
                    
                    <?php 
                    /* Boucle pour créer 1 ligne du tableau qui correspond à UN rapport entier */
                    for ( $i=0 ; $i<count($lesRapportVisiteur) ; $i++){ 
                    
                        // récupération dans la table offrir de l'ID du médicament et de sa quantité offerte
                        $IdMedicamentsRapport= OffrirDAO::get_IdMedicamentOffertRapport($lesRapportVisiteur[$i]->get_IdRapport()); // ID des médicaments du rapport
                        $QteMedicamentsRapport= OffrirDAO::get_QteMedicamentOffertRapport($lesRapportVisiteur[$i]->get_IdRapport()); // Quantités DES médicaments du rapport 

                        $lesMedicaments=[]; // Initialisation du tableau des médicaments 

                        /* Boucle pour récupérer tout les médicaments  avec sa quantité associée dun rapport d'indice i */
                        for ($nombreMedicament = 0 ; $nombreMedicament < count($IdMedicamentsRapport) ; $nombreMedicament++){ 
                            
                            $idMedicament = $IdMedicamentsRapport[$nombreMedicament]['idMedicament']; // récupération dans une variable de l'ID du médicament 
                            $leMedicament = MedicamentDAO::get_MedicamentById($idMedicament); // création de l'objet médicament avec l'ID en paramètre pour afficher ces données 

                            $lesMedicaments[] = $leMedicament; // Stockage des objets médicaments dans un tableau de médicaments

                        }

                        $leMedecin = MedecinDAO::get_medecinById($lesRapportVisiteur[$i]->get_IdMedecin()); // Récupération du médecin concerné pour le rapport d'indice i ?>
                    
                        <tr>
                            <td><p><?php echo $lesRapportVisiteur[$i]->get_IdRapport(); ?></p></td>
                            <td><?php echo $lesRapportVisiteur[$i]->get_DateRapport() ?></td>
                            <td><?php echo $lesRapportVisiteur[$i]->get_Motif() ?></td>
                            <td><?php echo $lesRapportVisiteur[$i]->get_Bilan() ?></td>

                            <td> <!-- Case du tableau du médecin concerné -->       
                                <div id="details-hover">
                                    <p id="details" style="text-align:center;"> <?php echo $lesRapportVisiteur[$i]->get_IdMedecin() ?> </p>
                                        <span> 
                                        <strong>Nom : </strong><?php echo $leMedecin->get_Nom(); ?> <br/>
                                        <strong>Prénom : </strong><?php echo $leMedecin->get_Prenom(); ?> <br/>
                                        <strong>Adresse : </strong><?php echo $leMedecin->get_Adresse(); ?> <br/>
                                        <strong>Téléphone : </strong><?php echo $leMedecin->get_Tel(); ?> <br/>
                                        <strong>Spécialité complémentaire : </strong><?php if ($leMedecin->get_Specialite() == null){ echo ("Aucune"); }else{echo ($leMedecin->get_Specialite());}?> <br/>
                                        <strong>Département : </strong><?php echo $leMedecin->get_Departement(); ?> <br/>
                                        </span>
                                </div>
                            </td>

                            <td> <!-- Case du tableau des médicaments -->
                                <?php       
                                if ($IdMedicamentsRapport == null ){ ?>
                                    <h3> Aucun médicament proposés </h3> <?php
                                }else{
                                    // Boucle pour parcourir les médicaments (utile s'il y en a plusieurs)
                                    for ( $j=0 ; $j < count($lesMedicaments) ; $j++){ ?>

                                        <div id="details-hover">
                                            <p id="details" style="text-align:center;"><?php echo $lesMedicaments[$j]->get_IdMedicament(); ?> </p>
                                            <span> 
                                                <strong>Nom : </strong><?php echo $lesMedicaments[$j]->get_NomCommercial(); ?> <br/>
                                                <strong>Composition : </strong> <?php echo $lesMedicaments[$j]->get_Composition(); ?> <br/>
                                                <strong>Effets : </strong> <?php echo $lesMedicaments[$j]->get_Effets(); ?> <br/>
                                                <strong>Contreindications : </strong> <?php echo $lesMedicaments[$j]->get_ContreIndication(); ?> <br/>
                                            </span>
                                        </div> <?php
                                    } 
                                } ?>
                            </td>

                            <td> <!-- Case du tableau de la quantité de médicaments offerte -->
                                <?php

                                // Boucle pour afficher la quantité offerte du médicament associé (utile s'il y'en a plusieurs)
                                for ($j=0; $j<count($lesMedicaments) ; $j++){
                                    $quantiteOfferte = $QteMedicamentsRapport[$j]['quantite']; ?>
                                    
                                    <p style="font-size:1.2em;"><?php echo $quantiteOfferte ; ?> </p> <?php 
                                } ?>
                                
                                <a href="./?action=modificationRapport&id=<?php echo $lesRapportVisiteur[$i]->get_IdRapport(); ?>" id="rapport-modify-btn"> <i class='bx bxs-edit' ></i></a> 
                            </td>

                        </tr><?php
                    } ?>
                </tbody>
            </table>
        </div> <?php
    }else{ ?>
        <h1> Vous n'avez aucun rapports. </h1> <?php
    } ?>
