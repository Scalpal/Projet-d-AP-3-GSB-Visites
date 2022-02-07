<?php if (connexionDAO::isLoggedOn()) { ?>
        <nav id="listedestinations">
            <a href="./?action=profil" class="listeD" title="C'est une destination in-cro-yable !">Mon profil</a>
        </nav> <?php
    }else { ?>
        <nav id="listedestinations">
            <a href="./?action=connexion" class="listeD" title="C'est une destination in-cro-yable !">Connexion</a>
        </nav><?php
    } ?>

<p> <a href="./?action=accueil"> <img src="images/logoTourismeideal.jpg" height="100" width="100" alt="logo du site" id="logo"> </a></p> 

			<h1> TourismeIdéal </h1> 
			
			<h3> Bonjour et bienvenue sur ce nouveau site de tourisme !</h3>

			<p class="descriptionsite"> Ici sont présentée des destinations incontournables et ce qu'on peut y faire une fois sur place. <br/>
			 N'hésitez pas à laissez votre curseur sur la destination ou l'activité qui vous intéresse !</p>
			
            <h2><em> Voici les meilleures destinations où aller : </em></h2>
            
        <!-- La liste des destinations -->
		<nav id="listedestinations">
			<a href="./?action=dubai" class="listeDgauche" title="C'est une destination incroyable !"> Dubaï </a>
			<a href="./?action=thailande" class="listeDdroite" title="La gastronomie y est très variée !"> Thaïlande </a>
        </nav>

        <!--TEXTE CAMBODGE + IMAGE-->
		<div id="partiefull"><h3 id="cambodge" class="titres"> Cambodge </h3><br/>
			
            <div class="flottant"> <p class="textegauche">
        Comment ne pas succomber à la magie du Cambodge, tout à la fois charmant et déroutant ? Ce pays qui attire des touristes du monde entier à de quoi faire de l'effet :
        Phnom Penh, la capitale trépidante, ses provinces où la nature est très présente, ses temples bouddhistes majestueux, ses paysages magnifiques avec ces rizières et 
        évidemment sa cuisine qui fait découvrir des parfums extraordinaires ! <br/>
        Il est clair que ce pays ne vous laissera pas indifférent avec son patrimoine architectural très riche.<br/> 
        <strong>Plus qu'un voyage, une aventure !</strong><br/>
        <br/>
        <br/>
        <span>-Prix moyen du billet pour Phnom Penh(A/R)</span>: environ 617€ → 19h de vol.<br/>
        <br/>
        <span>-Quand partir au meilleur prix?</span>: N'importe quand, à part pendant la haute saison (période d'été).</p>
            
             <a href="images/imagecambodge.jpg"><img src="images/imagecambodgeMini.jpg" height="292" width="410" alt="Photo du Cambodge" title="Cliquez pour agrandir" class="Photos" /></a>
                
            <p class="textedroite"> <strong><u>Les meilleures choses à faire : </u></strong><br/>
                <br/>
                <a href="images/siemreapcambodge.jpg" class="listeac" title="Les temples sont à couper le souffle !"> 1- Visiter le site d'Angkor Wat pour ces temples majestueux </a><br/>
                <a href="images/streetfoodcambodge.jpg" class="listeac" title="C'est vraiment pas cher du tout !"> 2- Goûter les street food et la cuisine locale</a><br/>
                <a href="images/aeonmallcambodge2.jpg" class="listeac" title="Très moderne !"> 3- Allez dans l'un des grands centres commerciaux Aeon </a><br/>
                <a href="images/sihanoukvillecambodge.jpg" class="listeac" title="Une fois sur place, c'est ma-gique ! "> 4- Allez à Sihanoukville pour ses vestiges coloniaux et ses plages </a><br/>
                <a href="images/iletonsaycambodge.jpg" class="listeac" title="Parfait pour se détendre !"> 5- Allez sur l'île du lapin de Koh Tonsay </a></p> 
            </div>
        </div>



