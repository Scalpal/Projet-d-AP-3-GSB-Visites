

<div class="partieAccueil">

	<div class="loader-wrapper">
		<span class="loader"><span class="loader-inner"></span></span>
	</div>

	<script src="loading.js"></script>

	<h1 style=text-align:center;> Modification du rapport <?php echo $leRapport->get_IdRapport() ?></h1>
	
	<div id="full-formulaire-rapport" style="margin-top:120px;">

	<div class="formulaireRapport">
		<form action="./?action=modificationRapport&id=<?php echo $leRapport->get_IdRapport() ?>" method="post" id="FormRapport">

				<div id="form-bloc">

					<div id="form-bloc-left">
						<input type="text" name="idVisiteur" id="FormDate" class="form-disabled" value="<?php echo $leRapport->get_IdVisiteur()?>" disabled required/>
						<input type="date" name="dateRapport" value="<?php echo $leRapport->get_DateRapport(); ?>" id="FormDate" class="form-disabled" disabled required/>
					</div>
					
				</div>

				<textarea name="motifRapport" placeholder="<?php echo $leRapport->get_Motif(); ?>" required></textarea>

				<textarea name="bilanRapport" placeholder="<?php echo $leRapport->get_Bilan(); ?>" required></textarea>

				<input type="text" name="idMedecin" id="FormDate" class="form-disabled" value="<?php echo $leRapport->get_IdMedecin()?>" disabled required/>


			<input type="submit" value="Valider" id="FormSubmitRapport" required/>

		</form>
	</div>
	</div>

</div>

