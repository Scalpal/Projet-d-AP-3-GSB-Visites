<body id="reservation">

<p> <a href="./?action=accueil"> <img src="images/logoTourismeideal.jpg" height="100" width="100" alt="logo du site" id="logo" title="Cliquez moi dessus pour
retourner à l'accueil !"></a></p> 

<h1> TourismeIdéal </h1> 



<div class="formulaireReservation">
		<form action="./?action=reservation" method="post">
			
			<p class="formTitre">Veuillez remplir les champs pour finaliser votre réservation : </p>

            <p>
            <select name="CodeCircuit" id="circuitReservation" required>
			
            <optgroup label="Dubaï">
				<option value="" disabled selected hidden> Circuit</option>
				<option value="1"> Le Voyage </option>
                <option value="2"> Vive le soleil </option>
            </optgroup>
                
            <optgroup label="Cambodge">
                <option value="3"> L'Aventure</option>
            </optgroup>

			<optgroup label="Thaïlande">
                <option value="4"> Nourriture Oui </option>
                <option value="5"> Le Rêve </option>
            </optgroup>
            </select>
			</p>
			
			<label for="nom" id="infoReserv" >Votre ID client :</label>
			<input type="text" name="IdClient" id="zoneEReserv" value="<?= $InfosPersonne["IdClient"] ?>" disabled="disabled" required />
		   
			<br />
		   
			<label for="prenom" id="infoReserv" >Moyen de paiement :</label>
			<input type="text" name="MoyenPaiementRes" id="zoneEReserv" placeholder="Carte bancaire" required />
		   
			<br/>
		   
			<input type="submit" value="Réserver" class="boutonForm" />
		</form>	
	</div>
<?= $msg ?>
</body>
</html>