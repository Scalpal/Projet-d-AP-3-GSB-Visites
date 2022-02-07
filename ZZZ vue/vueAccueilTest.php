
<div style="padding:30px; overflow:hidden;">
	<div class="partieAccueil"> 

		<!-- <h1 id="accueil"> Bonjour <strong><?php echo $prenom." ".$nom ;?></strong> ! </h1> -->

		<h1 id="accueil">Tableau de bord </h1>

		<div class="placement-flex"> <!--Placement des deux div côte à côte  -->

			<div id="left-side-home"> <!-- Partie gauche de l'accueil -->
				<div id="img-and-card"> <!-- Image et bloc -->
					<div id="home-img-div"><img src="images/rapport-icon.png" height="100%"></div> <!-- Image à gauche  -->
				
					<div id="home-rapport"> <!-- Le bloc de gestion de rapports  -->

						<div id="home-title-card"><h2>Gestion des rapports</h2></div>

						<div class="home-rapport-elts"> <!-- Les boutons du bloc de gestion  -->
							<a href='./?action=rapport' class="btn-grad" id="bouton-rapport">
								<i class='bx bxs-bookmark-alt-plus bx-sm' id="home-small-icons"></i>
								<strong> Créer un rapport </strong></a>
							<!-- <button type="button" class="button-63" id="bouton-rapport" onclick="openForm()">Créer un rapport</button> -->
						</div>

						<div class="home-rapport-elts">
							<a href='./?action=profil' class="btn-grad" >
								<i class='bx bx-book-open' id="home-small-icons"></i>
							<strong> Consulter vos rapports </strong></a>
							
						</div>

					</div>	
				</div>		

				<div id="img-and-card">

					<div id="home-img-div"><img src="images/40.png" height="10%"></div>
					
					<div id="home-rapport">
						<div id="home-title-card"><h2>Gestion des médecins</h2></div>

						<div class="home-rapport-elts" style="margin:auto auto;">
							<a href='./?action=medecin' class="btn-grad" >
							<i class='bx bx-plus-medical' id="home-small-icons"></i>
							<strong> Consulter les médecins </strong></a>
						</div>
					</div>
				</div>	
			</div>







			<div id="right-side-home">

				<div id="info-card">

					<div id="home-title-card" class="right-title"><h2>Vos informations </h2></div>
					<div id="info-card-content">

						<div id="para1">
							<p><strong> Votre ID : </strong><?php echo $Visiteur[0]->get_IdVisiteur()."<br/>"; ?>
							<strong> Votre nom : </strong><?php echo $Visiteur[0]->get_NomVisiteur()."<br/>"; ?>
							<strong> Votre prénom : </strong><?php echo $Visiteur[0]->get_PrenomVisiteur()."<br/>"; ?> </p>
						</div>

						<div id="para2">
							<p><strong> Votre adresse : </strong><?php echo $Visiteur[0]->get_AdresseVisiteur()."<br/>"; ?>
							<strong> Votre code postale : </strong><?php echo $Visiteur[0]->get_CpVisiteur()."<br/>"; ?>
							<strong> Votre ville de résidence : </strong><?php echo $Visiteur[0]->get_VilleVisiteur()."<br/>"; ?>
							<strong> Date de votre embauche : </strong><?php echo $Visiteur[0]->get_DateEmbaucheVisiteur(); ?></p>
						</div>

					</div>

				</div>

				<div id="home-last-rapport" style="height:20%; ">
					<div id="home-title-card" class="right-title"><h2>Dernier rapport vous concernant </h2></div>
					<div id="info-card-content" class="home-tab"> <?php
					
					if($dernierRapport != null){ ?>
						<table id="home">
							<thead>
								<tr>
									<th colspan="1"><strong> Id du rapport </strong></th>
									<th colspan="1"><strong> Date du rapport </strong></th>
									<th colspan="1"><strong> Motif du rapport </strong></th>
									<th colspan="1"><strong> Bilan du rapport </strong></th>
									<th colspan="1"><strong> Id du médecin </strong></th>
									<th colspan="1"><strong> Id du médicament </strong></th>
									<th colspan="1"><strong> Quantité offerte </strong></th>
								</tr>
							</thead>

							<tbody>
								<tr>
									<td class="bottom-left"><?php echo $dernierRapport->get_IdRapport(); ?> </td>
									<td><?php echo $dernierRapport->get_DateRapport() ?></td>
									<td><?php echo $dernierRapport->get_Motif() ?> </td>
									<td><?php echo $dernierRapport->get_Bilan() ?> </td>
									<td><?php echo $dernierRapport->get_IdMedecin() ?></td>
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
									<td class="bottom-right"><?php 

										if ($IdMedicamentsRapport != null){
											for ($nombreMedicament = 0 ; $nombreMedicament < count($IdMedicamentsRapport) ; $nombreMedicament++){ 
											$quantiteOfferte = $QteMedicamentsRapport[$nombreMedicament]['quantite']; // récupération de la quantité offerte du médicament ?> 
											<p> <?php echo $quantiteOfferte; 
											}
										}else{
											echo "Aucun";
										} ?>
									</td>
								</tr>
							</tbody>
						</table> <?php 
					}else{ ?>
						<h2> <?php echo $message ?></h2> <?php
					} ?>

					</div>
				</div>
			</div>
		</div>
		<a href="./?action=deconnexion" id="deconnexion" class="placement-mid"> Se déconnecter </a>
	</div>

</div> 
