

<div id="profil-content">
    
    <h1>Liste de vos rapports : </h1>

    <div id="full-rapport-card">
        
    
    <?php 
        
        // récupération dans la table offrir de l'ID du médicament et de sa quantité offerte
        $IdMedicamentsRapport= OffrirDAO::get_IdMedicamentOffertRapport($leRapport->get_IdRapport()); // ID des médicaments du rapport
        $QteMedicamentsRapport= OffrirDAO::get_QteMedicamentOffertRapport($leRapport->get_IdRapport()); // Quantité des médicaments du rapport 

        $lesMedicaments=[]; // Initialisation du tableau des médicaments 
        
        for ($nombreMedicament = 0 ; $nombreMedicament < count($IdMedicamentsRapport) ; $nombreMedicament++){ 
            
            $idMedicament = $IdMedicamentsRapport[$nombreMedicament]['idMedicament']; // récupération dans une variable de l'ID du médicament 
            $leMedicament = MedicamentDAO::get_MedicamentById($idMedicament); // création de l'objet médicament pour afficher ces données 

            $lesMedicaments[] = $leMedicament; // Stockage des objets médicaments dans un tableau de médicaments

        }

        $leMedecin = MedecinDAO::get_medecinById($leRapport->get_IdMedecin());
    
       ?>
        
        <div id="rapport-card">

            <h2 class="card-head"> Rapport <?php echo $leRapport->get_IdRapport(); ?> </h2>
        
            <p> <strong> Id du rapport : </strong><?php echo $leRapport->get_IdRapport(); ?> </p>
            <p> <strong>Date du rapport : </strong><?php echo $leRapport->get_DateRapport() ?> </p>
			
			<form action="./?action=modification&id=<?php echo $leRapport->get_IdRapport(); ?>" method="post">
				<p><strong> Motif du rapport : </strong></p>
            	<textarea name="motifRapport" required><?php echo $leRapport->get_Motif() ?></textarea>
				
				<p><strong> Bilan du rapport : </strong></p>
				<textarea name="bilanRapport" required><?php echo $leRapport->get_Bilan() ?></textarea>
			

            <div id="details-hover">
                <h3 id="details"> ID du médecin concerné : <?php echo $leRapport->get_IdMedecin() ?> </h3>
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
            


            <!-- <form action="./?action=modification&id=" method="post">
                <button type="submit" name="IdRapport" class="modif-rapport-button" value="<?php echo $leRapport->get_IdRapport(); ?>" placeholder="Modifier"> Modifier</button>
            </form> -->

            <input type="submit" value="Modifier"/>

            <?php  //$caca = OffrirDAO::get_IdQteMedicamentOffertRapport($i);
                    // print_r($IdMedicamentsRapport);  
                    // print("<br/>");
                    // print("<br/>");
                    // // print_r($lesMedicaments);
                    // // print("<br/>");
                    // // print("<br/>");
                  	    // // print_r($leMedicament);
                    // // print("<br/>");
                    // // print("<br/>");
                    // print_r($QteMedicamentsRapport);

   ?></form>

        </div>

    </div>
</div>
