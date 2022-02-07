<?php
include_once "modele/pdo.php";
include "$racine/modele/rapport.php";

class RapportDAO{

    static public function get_rapports(){
        $resultat = array();

        try{
            $cnx = pdoo::connexionPDO();

            $req = $cnx->prepare('SELECT * FROM rapport');

            $req->execute();

            $ligne = $req->fetchall(PDO::FETCH_ASSOC);

            foreach($ligne as $key => $val){
                $rapport = new Rapport($val['id'],$val['date'],$val['motif'],$val['bilan'],$val['idVisiteur'],$val['idMedecin']);
                $resultat[]= $rapport;
            }
        }catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    static public function get_rapportByIdVisiteur($unIdVisiteur){
        $resultat = array();

        try{
            $cnx = pdoo::connexionPDO();

            $req = $cnx->prepare('SELECT R.id,date,motif,bilan,idVisiteur,idMedecin FROM rapport R, visiteur V 
            WHERE R.idVisiteur=:idVisiteur AND R.idVisiteur=V.id');
            $req->bindvalue(':idVisiteur',$unIdVisiteur, PDO::PARAM_STR); // assignation de la valeur en paramètre 
            $req->execute(); // éxécution de la requête

            $ligne = $req->fetchall(PDO::FETCH_ASSOC); // récupération des données dans un tableau associatif

            foreach($ligne as $key => $val){
                $rapport = new Rapport($val['id'],$val['date'],$val['motif'],$val['bilan'],$val['idVisiteur'],$val['idMedecin']);
                $resultat[]= $rapport;
            }
        }catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    static public function get_rapportByIdRapport($unIdRapport){

        try{
            $cnx = pdoo::connexionPDO();

            $req = $cnx->prepare('SELECT id,date,motif,bilan,idVisiteur,idMedecin FROM rapport WHERE id=:id');
            $req->bindvalue(':id',$unIdRapport, PDO::PARAM_INT); // assignation de la valeur en paramètre 
            $req->execute(); // éxécution de la requête

            $ligne = $req->fetch(PDO::FETCH_ASSOC); // récupération des données dans un tableau associatif

            $rapport = new Rapport($ligne['id'],$ligne['date'],$ligne['motif'],$ligne['bilan'],$ligne['idVisiteur'],$ligne['idMedecin']);
        
        }catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $rapport;
    }

    static public function get_rapportByIdMedecin($unIdMedecin){
        $resultat = array();

        try{
            $cnx = pdoo::connexionPDO();

            $req = $cnx->prepare('SELECT rapport.id,date,motif,bilan,idVisiteur,idMedecin FROM rapport WHERE idMedecin=:idMedecin');
            $req->bindvalue(':idMedecin',$unIdMedecin, PDO::PARAM_INT); // assignation de la valeur en paramètre 
            $req->execute(); // éxécution de la requête

            $ligne = $req->fetchall(PDO::FETCH_ASSOC); // récupération des données dans un tableau associatif

            foreach($ligne as $key => $val){
                $rapport = new Rapport($val['id'],$val['date'],$val['motif'],$val['bilan'],$val['idVisiteur'],$val['idMedecin']);
                $resultat[]= $rapport;
            }
        }catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    static public function get_rapportByDate($uneDate){
        $resultat = array();

        try{
            $cnx = pdoo::connexionPDO();

            $req = $cnx->prepare('SELECT id,date,motif,bilan,idVisiteur,idMedecin FROM rapport WHERE date=:date');
            $req->bindvalue(':date',$uneDate, PDO::PARAM_STR); // assignation de la valeur en paramètre 
            $req->execute(); // éxécution de la requête

            $ligne = $req->fetchall(PDO::FETCH_ASSOC); // récupération des données dans un tableau associatif

            foreach($ligne as $key => $val){
                $rapport = new Rapport($val['id'],$val['date'],$val['motif'],$val['bilan'],$val['idVisiteur'],$val['idMedecin']);
                $resultat[]= $rapport;
            }
        }catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }
    
    static public function add_rapport($uneDate,$unMotif,$unBilan,$unIdVisiteur,$unIdMedecin){

        $check = false;

        try{
            $cnx=pdoo::connexionPDO();

            #Préparation de la requête d'ajout 
            $req = $cnx->prepare('INSERT INTO rapport (date, motif, bilan, idVisiteur, idMedecin)
            VALUES (:date, :motif, :bilan, :idVisiteur, :idMedecin)');
            
            #Assignation des valeurs de la réservation en paramètres
            $req->bindValue(':date', $uneDate, PDO::PARAM_STR);
            $req->bindValue(':motif', $unMotif, PDO::PARAM_STR);
            $req->bindValue(':bilan', $unBilan, PDO::PARAM_STR);
            $req->bindValue(':idVisiteur', $unIdVisiteur, PDO::PARAM_STR);
            $req->bindValue(':idMedecin', $unIdMedecin, PDO::PARAM_INT);
            
            #Éxécution de la requête
            $req->execute();

            $check = true;
        
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $check;
    }

    /* INSERT INTO rapport (date, motif, bilan, idVisiteur, idMedecin)
            VALUES (2021-10-21, "caca", "ct nul", "a131", 1);*/

    
    static public function update_rapportById($unId,$unMotif,$unBilan){

        $check = false;
        try{
            $cnx = pdoo::connexionPDO();

            $req = $cnx->prepare('UPDATE rapport SET motif = :motif,bilan = :bilan WHERE id = :id');
            $req->bindvalue(':motif' , $unMotif , PDO::PARAM_STR);
            $req->bindvalue(':bilan' , $unBilan , PDO::PARAM_STR);
            $req->bindvalue(':id' , $unId , PDO::PARAM_INT);

            $req->execute();
            $check = true;
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $check;
    }
    

    static public function delete_reservation($IdReservation,$IdClient){
        $resultat = -1;
        
        try {
        $cnx = pdoo::connexionPDO(); #Connexion a la base de données
        
        #Préparation de la requête de suppression
        $req = $cnx->prepare('DELETE from reservation where IdReservation=:IdReservation and IdClient=:IdClient');
        $req->bindValue(':IdReservation', $IdReservation, PDO::PARAM_INT); #Assignation des valeurs
        $req->bindValue(':IdClient', $IdClient, PDO::PARAM_INT);
        
        $resultat = $req->execute();   #Éxécution de la requête
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
    }
/*
    static public function get_ReservationByIdClient($IdClient){
        try{
            $cnx= pdoo::connexionPDO();

            $req= $cnx->prepare('SELECT * FROM reservation WHERE IdClient=:IdClient');
            $req->bindvalue(':IdClient',$IdClient, PDO::PARAM_INT);

            $req->execute();

            $ligne = $req->fetchall();
            $resultat=array();

            foreach ($ligne as $key => $val) { 
                $collectionReservations = new reservation ($val['IdReservation'],$val['DateReservation'],$val['MoyenPaiementRes'],
                $val['IdClient'],$val['CodeCircuit_concerner']);
                $resultat[]=$collectionReservations;
            }
        }catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }*/

    
}



