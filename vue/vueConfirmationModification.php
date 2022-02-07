<div id="confirmInscrip">
    
    <p> <a href="./?action=accueil"> <img src="images/logoTourismeideal.jpg" height="100" width="100" alt="logo du site" id="logo" title="Cliquez moi dessus pour
    retourner à l'accueil !"></a></p> 

    <p class="ConfirmInscrip"> Votre modification s'est déroulée avec succès. </br> Appuyez sur le logo pour retourner à l'accueil.</p>

    if($dernierRapport != null){ ?>
 				<p> <strong> Id du rapport : </strong><?php echo $dernierRapport->get_IdRapport(); ?> </p>
				<p> <strong> Date du rapport : </strong><?php echo $dernierRapport->get_DateRapport() ?> </p>
				<p> <strong> Motif du rapport : </strong><?php echo $dernierRapport->get_Motif() ?> </p>
				<p> <strong> Bilan du rapport : </strong><?php echo $dernierRapport->get_Bilan() ?> </p>
				<h3 id="details"> ID du médecin concerné : <?php echo $dernierRapport->get_IdMedecin() ?> </h3> <?php
			
				if ($IdMedicamentsRapport == null ){ ?>
					<h3> Aucun médicament proposés </h3> <?php
				}else{
					
				} 
			}else{ ?>
				<h2> <?php echo $message ?></h2> <?php
			} ?>

</div>