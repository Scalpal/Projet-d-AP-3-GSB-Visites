


	<div class="partieAccueil"> <!-- Cette div avec cette classe correspond à toute la partie droite qui englobe tout son contenu -->

		<div class="loader-wrapper">
            <span class="loader"><span class="loader-inner"></span></span>
        </div>

        <script src="loading.js"></script>

		<h1 style="text-align:center;">Création d'un rapport </h1>

		<div id="full-formulaire-rapport">

			<form action="./?action=CreerRapport" method="post" id="FormRapport">

				<div id="form-bloc">

					<div id="form-bloc-left">
						<input type="text" name="idVisiteur" id="FormDate" class="form-disabled" value="<?= $VisiteurRapport[0]->get_IdVisiteur()?>" readonly="true" required/>
						<input type="date" name="dateRapport" value="<?php date('Y-m-d'); ?>" id="FormDate" required/>
					</div>
					
					<div id="form-bloc-right">
						<select name="medicament" id="FormMedicament">
							<option value="" disabled selected hidden> Médicaments </option>
							<?php 
							for ( $i=0; $i<count($lesMedicaments) ; $i++ ){ ?>
								<option value="<?php echo $lesMedicaments[$i]->get_IdMedicament(); ?>"><?php echo $lesMedicaments[$i]->get_NomCommercial(); ?></option>
						<?php } ?>
						</select>

						<input type="number" name="quantite" value="quantite" id="FormQuantite" placeholder="Quantité" min="0" max="99"/>
					</div>
				</div>

				<textarea name="motifRapport" placeholder="Entrez le motif du rapport" required></textarea>

				<textarea name="bilanRapport" placeholder="Entrez le bilan du rapport" required></textarea>

				<select name="medecin" id="FormMedecin" required>
					<option value="" disabled selected hidden> Liste des médecins</option>
					<?php 
					for ($i=0 ; $i <count($lesMedecins) ; $i++){ ?>
						<option value="<?php echo $lesMedecins[$i]->get_IdMedecin(); ?>"><?php echo $lesMedecins[$i]->get_nom()."&nbsp".$lesMedecins[$i]->get_prenom(); ?></option>
				<?php } ?> 
				</select>

				<details> <!-- C'est une balise en HTML qui permet de cacher du contenu et pouvoir le faire apparaître/disparaître au clic -->
					<summary>Rajouter un 2nd médicament</summary>
						
					<select name="medicament2" id="FormMedicament">
						<option value="" disabled selected hidden> Médicaments </option>
						<?php 
						for ( $i=0; $i<count($lesMedicaments) ; $i++ ){ ?>
							<option value="<?php echo $lesMedicaments[$i]->get_IdMedicament(); ?>"><?php echo $lesMedicaments[$i]->get_NomCommercial(); ?></option> <?php
					 	} ?>
					</select>

					<input type="number" name="quantite2" value="quantite" id="FormQuantite" placeholder="Quantité" min="0" max="99"/>
				</details>

				<input type="submit" value="Valider" id="FormSubmitRapport" required/>

			</form>
		</div>
	</div>


