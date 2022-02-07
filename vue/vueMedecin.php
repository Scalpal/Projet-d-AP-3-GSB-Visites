
    <div id="profil-content">

        <div class="loader-wrapper">
            <h2> Chargement des médecins </h2>
            <span class="loader"><span class="loader-inner"></span></span>
        </div>

        <script src="loading.js"></script>

        <h1 id="research-title"> Liste des médecins : </h1>

        <div id="search-bar-medecin">
            <form action="./?action=rechercheMedecin" method="POST">
                <input type="text" name="nom" id="zoneEcnx" class="page-med" autocomplete="off" required >
                <input type="image" id="search-bar-submit" src="images/search-alt-2-regular-36.png">
            </form> 
        </div>

        <?php

        if ($critere != null ){ ?>
            <h3 id="medecin-search-criteria"><?php echo $critere ?>  <a href="./?action=medecin"> X </a></h3> <?php
        } ?>

        <nav id="medecin-filter-bar"> <!-- Barre de tri des médecins -->

            <ul id="medecin-filter-bar">

                <li style="margin-right:10px;"><p><strong>Trier par : </strong></li>

                <a href="./?action=medecin&order=id"><li> ID </li></a>
                <a href="./?action=medecin&order=specialitecomplementaire"><li> Spécialité </li></a>
                <a href="./?action=medecin&order=departement"><li> Département </li></a>
                
                <li id="medecin-list-nom"><a href="./?action=medecin" id="medecin-list-nom"> Nom </a>
                    <ul id="medecin-list-nom">  
                        <li><a href="./?action=medecin" id="medecin-list-nom-under"> A - Z</a></li>
                        <li><a href="./?action=medecin&order=ZA" id="medecin-list-nom-under"> Z - A</a></li>
                    </ul>
                </li>

            </ul>

        </nav>

        <?php

        if ($lesMedecins != null){ ?>
            <div id="full-rapport-card"> <?php
            
                for($i=0 ; $i<count($lesMedecins) ; $i++){ ?> 
                    <div id="medecin-card">

                        <div id="medecin-img"><img src="images/1.jpg"></div>

                        <h2 id="medecin-card-title"> Dr. <?php echo $lesMedecins[$i]->get_Nom()." ".$lesMedecins[$i]->get_Prenom(); ?></h2>
                        <div id="medecin-infos">
                            <p><i class='bx bxs-id-card' ></i> <strong>ID : </strong><?php echo $lesMedecins[$i]->get_IdMedecin(); ?></p>
                            <p><i class='bx bx-current-location' ></i> <strong> Adresse : </strong><?php echo $lesMedecins[$i]->get_Adresse(); ?></p>
                            <p><i class='bx bx-location-plus'></i> <strong>Département : </strong><?php echo $lesMedecins[$i]->get_Departement(); ?></p>
                            <p><i class='bx bxs-phone'></i> <strong>    Téléphone : </strong><?php echo $lesMedecins[$i]->get_Tel(); ?></p>
                            
                            <div id="medecin-infos-under">
                                <p class="left-infos-under"><i class='bx bxs-star'></i> <strong>Spécialité complémentaire : </strong><?php if ($lesMedecins[$i]->get_Specialite() == null){ echo ("Aucune"); }else{echo ($lesMedecins[$i]->get_Specialite());}?></p>
                                <p class="right-infos-under"><a href="tel:<?php echo $lesMedecins[$i]->get_Tel(); ?>" class="tel-link"><i class='bx bxs-phone-call' ></i>  Appeller le médecin</a></p>
                            </div>
                                
                                <a href="./?action=modificationMedecin&id=<?php echo $lesMedecins[$i]->get_IdMedecin(); ?>" id="medecin-modify-btn"> <i class='bx bxs-edit' ></i></a>
                                <a href="./?action=rapportMedecin&id=<?php echo $lesMedecins[$i]->get_IdMedecin(); ?>" id="medecin-list-rapport-btn"><i class='bx bx-book-open'></i></a>
                            
                        </div>
                    </div> <?php
                } ?>
            </div> <?php
        }else{ ?>
            <h1> Il n'y a pas de médecins <?php echo $critere ?>. </h1> <?php 
        } ?>
        
    </div>

    <a href="#profil-content" id="back-top-button">▲</a>
