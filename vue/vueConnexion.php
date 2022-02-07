

<div id="cnx">  <!-- C'est la card entière qui contient le logo, le formulaire de connexion, ... -->

    <div class="placement-mid">
        <div id="logo-entier">

            <div class="placement-mid"> <!-- Cette div avec cette classe permet de centrer n'importe quel élément -->
                <i class='bx bx-plus-medical'></i>
            </div>  
            
            <div id="nom-logo">Galaxy Swiss Bourdin</div>
        </div>
    </div> 

    <!-- Cela permet d'afficher un message d'erreur -->
    <?php if ($erreur!=null){ ?><p class="erreurCnx"><?php  echo $erreur; ?> </p><?php }?> 

    <h2>Connexion </h2>

    <div class="formulaireConnexion">
        <form action="./?action=connexion" method="post">

            <!-- <p class="formTitre">Veuillez entrer votre login et votre mot de passe pour vous connecter : </p> -->

                <input type="text" name="login" class="page-cnx" autocomplete="off" placeholder="Login" /><br />

                <input type="password" name="mdp" class="page-cnx" placeholder="Mot de passe"  /><br />

                <input type="submit" class="boutonForm" value="" />
        </form>
    </div>
</div>



