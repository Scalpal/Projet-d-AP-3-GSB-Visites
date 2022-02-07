<body id="profil">
    
<p> <a href="./?action=accueil"> <img src="images/logoTourismeideal.jpg" height="100" width="100" alt="logo du site" id="logo" title="Cliquez moi dessus pour
retourner à l'accueil !"></a></p> 

<h1> Mon profil </h1> 

<div id="FullProfil">

    <h2 id="TitreInfoProfil"> Mes informations </h2>

    <p id="InfosProfil">
        <?php 

        print "Mon ID client : ".$InfosPersonne['IdClient'].
        "<br> Mon nom : ".$InfosPersonne["NomClient"].
        "<br> Mon prénom : ".$InfosPersonne["PrenomClient"].
        "<br> Mon adresse : ".$InfosPersonne["AdresseClient"].
        "<br> Mon numéro de téléphone : ".$InfosPersonne["TelClient"].
        "<br> Mon e-mail : ".$InfosPersonne['MailClient'];

        ?>
    </p>

    <form action="./?action=modification" method="post">
        <input type="submit" value="Modifier" id="circuitReserve"/>
    </form>
</div>

