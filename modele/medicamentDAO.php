<?php

include_once "modele/pdo.php";
include "modele/medicament.php";
include "modele/famille.php";

class MedicamentDAO{

    static public function get_familleMedicamentById($unIdMedicament){
        try{
            $cnx = pdoo::connexionPDO(); #Connexion à la base de données 

            $req = $cnx->prepare("SELECT F.id, libelle FROM medicament M, famille F WHERE F.id=M.idFamille AND M.id=:id");
            $req->bindvalue(':id',$unIdMedicament, PDO::PARAM_STR);
            $req->execute();

            $ligne = $req->fetch(PDO::FETCH_ASSOC);
            $famille = new Famille($ligne['id'],$ligne['libelle']);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $famille;
    }

    static public function get_medicaments(){
        $resultat = array();

        try{
            $cnx = pdoo::connexionPDO(); #Connexion à la base de données 
    
            $req = $cnx->prepare('SELECT * FROM medicament ORDER BY nomCommercial ASC'); #Préparation de la requête 

            $req->execute(); #Éxécution de la requête

            $ligne = $req->fetchall();

            foreach ($ligne as $key => $val){
                
                $famille = MedicamentDAO::get_familleMedicamentById(trim($val['id']));

                $Medicament=new Medicament($val['id'],$val['nomCommercial'], $famille, $val['composition'], 
                $val['effets'],$val['contreIndications']);

                $resultat[]=$Medicament;
            }
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    static public function get_MedicamentByNom($unNom){
        
        try{

            $cnx = pdoo::connexionPDO(); #Connexion à la base de données 

            $req = $cnx->prepare("SELECT * FROM medicament WHERE nomCommercial = :nomCommercial");
            $req->bindvalue(':nomCommercial',$unNom, PDO::PARAM_STR);
            $req->execute();

            $ligne = $req->fetch(PDO::FETCH_ASSOC);

            $famille = MedicamentDAO::get_familleMedicamentById(trim($ligne['id']));

            $Medicament=new Medicament($ligne['id'],$ligne['nomCommercial'], $famille, $ligne['composition'], 
            $ligne['effets'],$ligne['contreIndications']);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $Medicament;
    }

    static public function get_MedicamentById($unId){
        
        try{

            $cnx = pdoo::connexionPDO(); #Connexion à la base de données 

            $req = $cnx->prepare("SELECT * FROM medicament WHERE id = :id");
            $req->bindvalue(':id',$unId, PDO::PARAM_STR);
            $req->execute();

            $ligne = $req->fetch(PDO::FETCH_ASSOC);

            $famille = MedicamentDAO::get_familleMedicamentById(trim($unId));

            $Medicament=new Medicament($ligne['id'],$ligne['nomCommercial'], $famille, $ligne['composition'], 
            $ligne['effets'],$ligne['contreIndications']);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $Medicament;
    }
    
    /* 
    static public function post_avis($IdClient,$CodeCircuit,$Avis){
        $resultat = -1;
    
        try {
            $cnx = connexionPDO();
            $req = $cnx->prepare('INSERT INTO (IdClient,CodeCircuit,Avis) VALUES (:IdClient,:CodeCircuit,:Avis)');
            $req->bindValue(':IdCLient', $IdClient, PDO::PARAM_INT);
            $req->bindValue(':CodeCircuit', $CodeCircuit, PDO::PARAM_INT);
            $req->bindvalue(':Avis', $Avis, PDO::PARAM_STR);
            
            $resultat = $req->execute();
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
        }

    static public function delete_avis($IdClient,$CodeCircuit){
        $resultat = -1;
   
    try {
        $cnx = connexionPDO();

        $req = $cnx->prepare('DELETE FROM aimer where IdClient=:IdClient and CodeCircuit=:CodeCircuit');
        $req->bindValue(':IdCLient', $IdClient, PDO::PARAM_INT);
        $req->bindValue(':CodeCircuit', $CodeCircuit, PDO::PARAM_INT);
        
        $resultat = $req->execute();
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
    } */
}
