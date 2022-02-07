<?php if (connexionDAO::isLoggedOn()) { ?>
        <nav id="listedestinations">
            <a href="./?action=profil" class="listeD" title="C'est une destination in-cro-yable !">Mon profil</a>
        </nav> <?php
    }else { ?>
        <nav id="listedestinations">
            <a href="./?action=connexion" class="listeD" title="C'est une destination in-cro-yable !">Connexion</a>
        </nav><?php
    } ?>
		<!-- C'est l'image du logo + présentation du site -->
		<p> <a href="./?action=accueil"> <img src="images/logoTourismeideal.jpg" height="100" width="100" alt="logo du site" id="logo"> </a></p> 

			<h1> TourismeIdéal </h1> 
			
			<h3> Bonjour et bienvenue sur ce nouveau site de tourisme !</h3>

			<p class="descriptionsite"> Ici sont présentée des destinations incontournables et ce qu'on peut y faire une fois sur place. <br/>
			 N'hésitez pas à laissez votre curseur sur la destination ou l'activité qui vous intéresse !</p>
			
            <h2><em> Voici les meilleures destinations où aller : </em></h2>
            
        <!-- La liste des destinations -->
		<nav id="listedestinations">
			<a href="./?action=dubai" class="listeDgauche" title="C'est une destination incroyable !"> Dubaï </a>
			<a href="./?action=cambodge" class="listeDdroite" title="Les paysages y sont magnifiques !"> Cambodge </a>
        </nav>
        
        <!--TEXTE THAILANDE + IMAGE -->
		<div id="partiefull"><h3 id="thailande" class="titres"> Thaïlande </h3><br/>
			
            <div class="flottant"> <p class="textegauche">
        S'il y a bien un pays pour lequel il ne vous faut pas de raison pour le visiter, c'est sans aucun doute la Thaïlande. <br/>
        La Thaïlande, ce pays qui attire des millions de touriste chaque année, c'est le pays du sourire; une fois sur place, on est jamais déçus, nos espérances sont toujours dépassées et l'émerveillement est permanent. 
        Avec ses nombreux temples, ses immenses centres commerciaux, sa culture locale fascinante et ses plages ravissantes, <strong>ce pays est plus agréable que jamais à explorer !</strong> <br/>
        <br/>
        <span>-Prix moyen du billet pour Bangkok (A/R)</span>: environ 462€. → 12h de vol. <br/>
        <span>-Prix moyen du billet pour Koh Samui (A/R)</span>: environ 774€. → 13h de vol avec une escale.<br/>
        <br/>
        <span>-Quand partir au meilleur prix?</span>: En Novembre, Janvier, Mars, Mai ou Juin (Réserver en avance en Juillet/Août/Septembre est le mieux). </p>  
                
        <a href="images/imagethailande.jpg"><img src="images/imagethailandeMini.jpg" height="292" width="410" alt="Photo de la Thaïlande" title="Cliquez pour agrandir" class="Photos" /></a>
                
            <p class="textedroite"> <strong><u>Les meilleures choses à faire :</u></strong><br/>
                <br/>
                <a href="images/gastronomiethailande.jpg" class="listeac" title="Ça peut être très épicé !"> 1- Goûter la gastronomie locale </a><br/>
                <a href="images/pattayaplage.jpg" class="listeac" title="Paradisiaque !"> 2- Allez à Pattaya ou Koh Samui pour les plages magnifiques</a><br/>
                <a href="images/chinatownthailande.jpg" class="listeac" title="Vraiment l'endroit à ne pas manquer !"> 3- Explorer le Chinatown, le quartier chinois de Bangkok </a><br/>
                <a href="images/iconsiamthailande.jpg" class="listeac" title="Le plus grand et le plus luxueux de la Thaïlande !"> 4- Allez au centre commercial IconSiam (et voir son spectacle de jets d'eaux)  </a><br/>
                <a href="images/centrecommercialthailande.jpg" class="listeac" title="Il y en a tellement !"> 5- Visiter les nombreux centres commerciaux disséminés un peu partout à Bangkok </a></p> 
            </div>
        </div>
</body>