<div class="formulaireRapport">
	<form action="./?action=CreerRapport" method="post" id="FormRapport">

		<div class="placement-mid" id="input-label">
			<label for="RapportLabel" id="RapportLabel"> Votre ID : </label>
			<input type="text" name="idVisiteur" id="FormDate" class="form-disabled" value="<?= $VisiteurRapport[0]->get_IdVisiteur()?>" readonly="true" required/>
		</div>

		<div class="placement-mid" id="input-label">
			<label for="RapportLabel" id="RapportLabel">Date : </label>
			<input type="date" name="dateRapport" value="<?php date('Y-m-d'); ?>" id="FormDate" required/>
		</div>

		<div id="FormRapport-parts">
			<div id="FormRapport-left-part">
				<h2>Informations du rapport</h2>

				<label for="RapportLabel" id="RapportLabel"> Motif du rapport : </label>
				<textarea name="motifRapport" placeholder="Entrez le motif du rapport" required></textarea>

				<label for="RapportLabel" id="RapportLabel"> Bilan du rapport </label>
				<textarea name="bilanRapport" placeholder="Entrez le bilan du rapport" required></textarea>


			</div>

			<div id="FormRapport-right-part">
				<h2>Médicaments </h2>

				<label for="RapportLabel" id="RapportLabel"> Médicament proposé : </label>
				<select name="medicament" id="FormMedicament" required>
					<option value="" disabled selected hidden> Liste des médicaments </option>
					<?php 
					for ( $i=0; $i<count($lesMedicaments) ; $i++ ){ ?>
						<option value="<?php echo $lesMedicaments[$i]->get_IdMedicament(); ?>"><?php echo $lesMedicaments[$i]->get_NomCommercial(); ?></option>
				<?php } ?>
				</select>

				<label for="RapportLabel" id="RapportLabel"> Quantité offerte : </label>
				<input type="number" name="quantite" value="quantite" id="FormQuantite" placeholder="Quantité" required/>
			</div>
		</div>
		
		<div class="placement-mid" id="input-label">		
			<label for="RapportLabel" id="RapportLabel"> Médecin concerné : </label>
			<select name="medecin" id="FormMedecin" required>
				<option value="" disabled selected hidden> Liste des médecins</option>
				<?php 
				for ($i=0 ; $i <count($lesMedecins) ; $i++){ ?>
					<option value="<?php echo $lesMedecins[$i]->get_IdMedecin(); ?>"><?php echo $lesMedecins[$i]->get_nom()."&nbsp".$lesMedecins[$i]->get_prenom(); ?></option>
			<?php } ?> 
			</select>
		</div>

		<input type="submit" value="Valider" id="FormSubmit" required/>

	</form>
</div>


<div class="formulaireRapport">
	<form action="./?action=CreerRapport" method="post" id="FormRapport">

			<!-- <label for="RapportLabel" id="RapportLabel"> Votre ID : </label> -->
			<h2 style=text-align:left;>Ce rapport est crée par : </h2>
			<input type="text" name="idVisiteur" id="FormDate" class="form-disabled" value="<?= $VisiteurRapport[0]->get_IdVisiteur()?>" readonly="true" required/>


			<!-- <label for="RapportLabel" id="RapportLabel">Date : </label> -->
			<input type="date" name="dateRapport" value="<?php date('Y-m-d'); ?>" id="FormDate" required/>

			<!-- <label for="RapportLabel" id="RapportLabel"> Motif du rapport : </label> -->
			<textarea name="motifRapport" placeholder="Entrez le motif du rapport" required></textarea>

			<!-- <label for="RapportLabel" id="RapportLabel"> Bilan du rapport </label> -->
			<textarea name="bilanRapport" placeholder="Entrez le bilan du rapport" required></textarea>

			<!-- <label for="RapportLabel" id="RapportLabel"> Médicament proposé : </label> -->
			<select name="medicament" id="FormMedicament" required>
				<option value="" disabled selected hidden> Liste des médicaments </option>
				<?php 
				for ( $i=0; $i<count($lesMedicaments) ; $i++ ){ ?>
					<option value="<?php echo $lesMedicaments[$i]->get_IdMedicament(); ?>"><?php echo $lesMedicaments[$i]->get_NomCommercial(); ?></option>
			<?php } ?>
			</select>

			<!-- <label for="RapportLabel" id="RapportLabel"> Quantité offerte : </label> -->
			<input type="number" name="quantite" value="quantite" id="FormQuantite" placeholder="Quantité" required/>

			<!-- <label for="RapportLabel" id="RapportLabel"> Médecin concerné : </label> -->
			<select name="medecin" id="FormMedecin" required>
				<option value="" disabled selected hidden> Liste des médecins</option>
				<?php 
				for ($i=0 ; $i <count($lesMedecins) ; $i++){ ?>
					<option value="<?php echo $lesMedecins[$i]->get_IdMedecin(); ?>"><?php echo $lesMedecins[$i]->get_nom()."&nbsp".$lesMedecins[$i]->get_prenom(); ?></option>
			<?php } ?> 
			</select>


		<input type="submit" value="Valider" id="FormSubmitRapport" required/>

	</form>
</div>