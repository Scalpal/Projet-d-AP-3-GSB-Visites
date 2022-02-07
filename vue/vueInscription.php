<body id="cnx">

<p> <a href="./?action=accueil"> <img src="images/logoTourismeideal.jpg" height="100" width="100" alt="logo du site" id="logo" title="Cliquez moi dessus pour
retourner à l'accueil !"></a></p> 

<h1> TourismeIdéal </h1> 
<h1>Inscription </h1>


<div class="formulaireInscription">
		<form action="./?action=inscription" method="post">
			
			<p class="formTitre">Veuillez entrer vos coordonnées pour compléter votre inscription : </p>
			
			<label for="nom" id="nom" >Votre nom :</label>
			<input type="text" name="NomClient" id="zoneE" placeholder="Lim" required />
		   
			<br />
		   
			<label for="prenom" id="prenom" >Votre prénom :</label>
			<input type="text" name="PrenomClient" id="zoneE" placeholder="Pascal" required />
		   
			<br/>

            <label for="adresse" id="adresse" >Votre adresse :</label>
			<input type="text" name="AdresseClient" id="zoneE" placeholder="1 rue du bois" required />
		   
			<br/>

            <label for="numTel" id="numTel" >Votre numéro de téléphone :</label>
			<input type="tel" name="TelClient" id="zoneE" placeholder="0611223344" required />
		   
			<br/>
		   
			<label for="email" id="email" >Votre e-mail :</label>
			<input type="email" name="MailClient" id="zoneE" placeholder="pascallim@gmail.com" required/>
            
            <br/>

            <label for="mdp" id="mdp" >Votre mot de passe :</label>
			<input type="password" name="MdpClient" id="zoneE" placeholder="Mot de passe" required />
		   
			<br/>
		   
			<input type="submit" value="Inscription" class="boutonForm" />
		</form>	
	</div>
</body>