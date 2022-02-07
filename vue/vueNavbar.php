<!-- Permet de mettre de l'espace (padding: 30px) tout autour du tableau de bord sans pour autant affecter le particles.js du body -->
<!-- Le display:flex ici est primordial car c'est lui qui met la navbar et la partie droite côte à côte -->
<div style="padding:30px; display:flex; width:100%;"> 

	<nav id="navbar">  

		<div id="navbar-img"><img src="images/1.jpg"></div>

		<div id="info-card-content">

			<div id="para1">
				<p><?php echo strtoupper($Visiteur[0]->get_NomVisiteur())." ".$Visiteur[0]->get_PrenomVisiteur()."<br/>"
				.$Visiteur[0]->get_AdresseVisiteur()." "."<br/>"
				.$Visiteur[0]->get_CpVisiteur().", ".strtoupper($Visiteur[0]->get_VilleVisiteur())."<br/>";?>
				<strong> Date de votre embauche :</strong> <?php echo $Visiteur[0]->get_DateEmbaucheVisiteur(); ?></p>
			</div>

		</div>

		<a href="./?action=accueilNW" class="menu"> <i class='bx bxs-home'id="home-small-icons" ></i>Accueil</a>

		<h4> Rapports </h4>

			<a href='./?action=CreerRapport' class="menu"><i class='bx bxs-bookmark-alt-plus' id="home-small-icons"></i>Création d'un rapport </a>
			<a href='./?action=profil' class="menu"> <i class='bx bx-book-open' id="home-small-icons"></i> Consultation des rapports </a>

		<h4> Médecins </h4>
			
			<a href="./?action=medecin" class="menu"><i class='bx bx-plus-medical' id="home-small-icons"></i> Consultation des médecins </a>

		<a href="./?action=deconnexion" id="deconnexion" class="placement-mid"> Se déconnecter </a>	
		
	</nav>