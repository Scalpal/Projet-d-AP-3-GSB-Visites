
    
<div class="partieAccueil">

    <div class="loader-wrapper">
        <span class="loader"><span class="loader-inner"></span></span>
    </div>

    <script src="loading.js"></script>

    <h1 style="text-align:center; margin-bottom:0px;"> Modification des informations d'un médecin </h1>

    <div id="medecin-modify-page"> 

        <div id="medecin-card-modif">

            <div id="medecin-img"><img src="images/1.jpg"></div>

            <h2 id="medecin-card-title"> Dr. <?php echo $Medecin->get_Nom()." ".$Medecin->get_Prenom(); ?></h2>

            <form action="./?action=modificationMedecin&id=<?php echo $Medecin->get_IdMedecin(); ?>" method="POST">

                <label for="nom">Votre ID : </label>
                <input type="text" name="id" value="<?php echo $Medecin->get_IdMedecin(); ?>" class="form-disabled" disabled required>

                <div style="display:flex; width:100%;">

                    <div id="input-label">
                        <label for="nom">Nom</label>
                        <input type="text" name="nom" value="<?php echo $Medecin->get_Nom() ?>" class="form-disabled" readonly required>
                    </div>
                    
                    <div id="input-label"> 
                        <label for="prenom">Prénom</label>
                        <input type="text" name="prenom" value="<?php echo $Medecin->get_Prenom() ?>" class="form-disabled" readonly required>
                    </div>

                </div>

                <div style="display:flex; width:100%;">
                
                <div id="input-label" style="width:70%;">
                <label>Adresse</label>
                <input type="text" name="adresse" value="<?php echo $Medecin->get_Adresse(); ?>" required>

                </div>

                <div id="input-label" style="width:30%">
                <label>Département</label>
                <input type="text" name="departement" value="<?php echo $Medecin->get_Departement(); ?>" required>
                
                </div>


                </div>

                <label>Téléphone</label>
                <input type="tel" name="tel" value="<?php echo $Medecin->get_Tel(); ?>" maxlength="10" required>

                <label>Spécialité complémentaire</label>
                <input type="text" name="specialite" value="<?php if ($Medecin->get_Specialite() == null){ echo ("Aucune"); }else{echo ($Medecin->get_Specialite());}?>" required>

                <input type="submit" id="bouton-modification" value="Valider">
            </form>

        </div>
    </div> 
</div>

