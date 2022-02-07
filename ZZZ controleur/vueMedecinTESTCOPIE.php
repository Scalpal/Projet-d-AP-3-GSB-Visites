

<p> <a href="./?action=accueil"> <img src="images/logoTourismeideal.jpg" height="100" width="100" alt="logo du site" id="logo" title="Cliquez moi dessus pour
    retourner à l'accueil !"></a></p> 

<div id="profil-content">

    <h1 id="research-title"> Liste des médecins : </h1>

    <div id="search-bar-medecin">
        <form action="./?action=rechercheMedecin" method="POST" >
            <input type="text" name="nom" id="zoneEcnx" required >
            <input type="image" id="search-bar-submit" src="images/search-alt-2-regular-36.png">
        </form> 
    </div>

    <?php

    if ($lesMedecins != null){ ?>
        <div id="full-rapport-card"> <?php
        
            for($i=0 ; $i<count($lesMedecins) ; $i++){ ?>
                <div id="medecin-card">

                    <div id="medecin-img"><img src="images/1.jpg"></div>

                    <h2> Dr. <?php echo $lesMedecins[$i]->get_Nom()." ".$lesMedecins[$i]->get_Prenom(); ?></h2>
                    <div id="medecin-infos">
                        <p><strong>ID : </strong><?php echo $lesMedecins[$i]->get_IdMedecin(); ?></p>
                        <p><strong><i class='bx bx-location-plus'></i>Adresse : </strong><?php echo $lesMedecins[$i]->get_Adresse(); ?></p>
                        <p><strong>Département : </strong><?php echo $lesMedecins[$i]->get_Departement(); ?></p>
                        
                        <div id="medecin-infos-under">
                            <p class="left-infos-under"><strong>Spécialité complémentaire : </strong><?php if ($lesMedecins[$i]->get_Specialite() == null){ echo ("Aucune"); }else{echo ($lesMedecins[$i]->get_Specialite());}?></p>
                            <p class="right-infos-under"><a href="tel:<?php echo $lesMedecins[$i]->get_Tel(); ?>" class="tel-link"><i class='bx bxs-phone-call' ></i>   Appeller le médecin</a></p>
                        </div>
                            
                    
                    
                    </div>
                </div> <?php
            } ?>
        </div> <?php
    }else{ ?>
        <h1> Vous n'avez aucun rapports. </h1> <?php 
    } ?>
    
</div>