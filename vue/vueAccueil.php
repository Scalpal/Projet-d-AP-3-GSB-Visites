
	<div class="partieAccueil"> <!-- Tout le tableau de bord de l'accueil -->

	<div class="loader-wrapper">
    	<span class="loader"><span class="loader-inner"></span></span>
	</div>

    <script src="loading.js"></script>

	<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->

		<h1 id="accueil">Tableau de bord </h1>

		<div class="placement-mid"> 

			<div id="home-last-rapport"> <!-- Bloc du tableau concernant le dernier rapport -->
				
				<div id="home-title-card" class="right-title"><h2>Vos 5 derniers rapports</h2></div>
				
				<div id="info-card-content" class="home-tab"><?php 
				
					if($lesRapportVisiteur != null){ ?>
						<table id="rapport-table" class="home">
							<thead>
								<tr>
									<th colspan="1"><strong> Id </strong></th>
									<th colspan="1"><strong> Date </strong></th>
									<th colspan="1"><strong> Motif </strong></th>
									<th colspan="1"><strong> Bilan </strong></th>
									<th colspan="1"><strong> Id du médecin </strong></th>
									<th colspan="1"><strong> Id du médicament </strong></th>
									<th colspan="1"><strong> Quantité offerte </strong></th>
								</tr>
							</thead>

							<tbody> <?php
 
								$last = count($lesRapportVisiteur); 
								for ($i = $last -1 ; $i > $last -6 ; $i-- ){ 
									
									$IdMedicamentsRapport= OffrirDAO::get_IdMedicamentOffertRapport($lesRapportVisiteur[$i]->get_IdRapport()); // ID des médicaments du rapport
									$QteMedicamentsRapport= OffrirDAO::get_QteMedicamentOffertRapport($lesRapportVisiteur[$i]->get_IdRapport()); // Quantité des médicaments du rapport ?>
								
									<tr>
										<td><?php echo $lesRapportVisiteur[$i]->get_IdRapport(); ?> </td>
										<td><?php echo $lesRapportVisiteur[$i]->get_DateRapport() ?></td>
										<td><?php echo $lesRapportVisiteur[$i]->get_Motif() ?> </td>
										<td><?php echo $lesRapportVisiteur[$i]->get_Bilan() ?> </td>
										<td><?php echo $lesRapportVisiteur[$i]->get_IdMedecin() ?></td>
										<td><?php

											if($IdMedicamentsRapport != null){
												for ($nombreMedicament = 0 ; $nombreMedicament < count($IdMedicamentsRapport) ; $nombreMedicament++){ 
												$idMedicament = $IdMedicamentsRapport[$nombreMedicament]['idMedicament']; // récupération dans une variable de l'ID du médicament ?> 
												<p><?php echo $idMedicament ?> </p> <?php 
												}	 
											}else{
												echo ("Aucun");
											} ?>

										</td>
										<td><?php 

											if ($IdMedicamentsRapport != null){
												for ($nombreMedicament = 0 ; $nombreMedicament < count($IdMedicamentsRapport) ; $nombreMedicament++){ 
												$quantiteOfferte = $QteMedicamentsRapport[$nombreMedicament]['quantite']; // récupération de la quantité offerte du médicament ?> 
												<p> <?php echo $quantiteOfferte; ?> </p> <?php
												}
											}else{
												echo "Aucun";
											} ?>
										</td>
									</tr> <?php 
								} ?>

							</tbody>
						</table> <?php 
					}else{ ?>
						<h2> <?php echo $message ?></h2> <?php
					} ?>

				</div>
			</div>
		</div>
	</div>	

