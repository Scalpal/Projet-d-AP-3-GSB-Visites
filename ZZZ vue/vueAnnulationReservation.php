<body id="reservation">

<p> <a href="./?action=accueil"> <img src="images/logoTourismeideal.jpg" height="100" width="100" alt="logo du site" id="logo" title="Cliquez moi dessus pour
retourner à l'accueil !"></a></p> 

<h1> TourismeIdéal </h1> 

<div class="formulaireReservation">
		<form action="./?action=annulation" method="post">
			
			<p class="formTitre">Veuillez choisir la réservation à annuler : </p>

            <p>
                <select name="IdReservation" id="circuitReservation" required>
                    
                    <option value="" disabled selected hidden>Choisissez la réservation</option>
                
                    <?php for ($i=0 ; $i<count($lesCircuits) ; $i++){ ?>

                    <option value="<?= $IdReservation[$i]->get_IdRes(); ?>">Réservation n°<?= $IdReservation[$i]->get_IdRes()."&nbsp"."&nbsp"."→"."&nbsp".$lesCircuits[$i]->get_NomCircuit(); ?></option>

                <?php } ?>
                </select>
			</p>
			
			<label for="nom" id="infoReserv" >Votre ID client :</label>
			<input type="text" name="IdClient" id="zoneEReserv" value="<?= $InfosPersonne["IdClient"] ?>" disabled="disabled" required />
		   
			<br />
		
			<input type="submit" value="Confirmer" class="boutonForm" />
		</form>	
	</div>
</body>
</html>