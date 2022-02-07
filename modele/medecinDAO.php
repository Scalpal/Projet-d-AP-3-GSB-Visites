<?php

include_once "modele/pdo.php";
include_once "modele/medecin.php";

class MedecinDAO{

    static public function get_medecins(){

        $resultat=array();
        try {
            $cnx = pdoo::connexionPDO(); #Connexion à la base de données 
    
            $req = $cnx->prepare('SELECT * FROM medecin ORDER BY nom ASC'); #Préparation de la requête 

            $req->execute(); #Éxécution de la requête

            $ligne = $req->fetchall(); 
            
            foreach ($ligne as $key => $val) { 
                $collectionMedecins= new Medecin ($val['id'],$val['nom'],$val['prenom'],$val['adresse'],$val['tel'],
                $val['specialitecomplementaire'],$val['departement']);
                $resultat[]=$collectionMedecins;
            }
        
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }
    
    static public function get_medecinById($unIdMedecin){
        $Medecin = null;
        try {
            $cnx = pdoo::connexionPDO();
            $req = $cnx->prepare('SELECT * FROM medecin WHERE id=:id');
            $req->bindValue(':id', $unIdMedecin, PDO::PARAM_INT);
    
            $req->execute();
    
            $ligne = $req->fetchall();
            foreach ($ligne as $key => $val) { 
                $Medecin = new Medecin($val['id'], $val['nom'], $val['prenom'], $val['adresse'], $val['tel'], $val['specialitecomplementaire'], $val['departement']);
            }
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $Medecin;
    }

    static public function get_medecinByNom($unNom){
        $resultat = array();

        try {
            $cnx = pdoo::connexionPDO();
            $req = $cnx->prepare("SELECT * FROM medecin WHERE nom LIKE :nom ");
            $req->bindValue(':nom', $unNom."%", PDO::PARAM_STR);
    
            $req->execute();
    
            $ligne = $req->fetchall(PDO::FETCH_ASSOC);

            foreach($ligne as $key => $value){
                $Medecin = new Medecin($value['id'], $value['nom'], $value['prenom'], $value['adresse'], $value['tel'], $value['specialitecomplementaire'], $value['departement']);
                $resultat[] = $Medecin;
            }
            
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    static public function liveSearchByName($leNom){
        $resultat = array();

        try {

            $cnx = pdoo::connexionPDO();

            $req = $cnx->prepare('SELECT * FROM medecin WHERE nom LIKE :nom');
            $req->execute(["nom" => $leNom."%"]);

            $ligne = $req->fetchall(PDO::FETCH_ASSOC);

            foreach ($ligne as $key=>$value) {
                $Medecin = new Medecin($value['id'], $value['nom'], $value['prenom'], $value['adresse'], $value['tel'], $value['specialitecomplementaire'], $value['departement']);
                $resultat[] = $Medecin;
            }
            
        } catch (PDOException $e) {
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

    static public function update_MedecinById($unId,$unNom,$unPrenom,$uneAdresse,$unTel,$uneSpecialite,$unDepartement){

        $check = false;
        try{

            $cnx = pdoo::connexionPDO();

            $req = $cnx->prepare("UPDATE medecin SET nom=:nom, prenom=:prenom, adresse=:adresse, tel=:tel, specialitecomplementaire=:specialitecomplementaire, departement=:departement WHERE id=:id");
            $req->bindvalue(":id", $unId, PDO::PARAM_INT);
            $req->bindvalue(":nom", $unNom, PDO::PARAM_STR);
            $req->bindvalue(":prenom", $unPrenom, PDO::PARAM_STR);
            $req->bindvalue(":adresse", $uneAdresse, PDO::PARAM_STR);
            $req->bindvalue(":tel", $unTel, PDO::PARAM_INT);
            $req->bindvalue(":specialitecomplementaire", $uneSpecialite, PDO::PARAM_STR);
            $req->bindvalue(":departement", $unDepartement, PDO::PARAM_INT);

            $req->execute();

            $check = true;
        }catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $check;
    }

    static public function get_medecinsOrderBy($critere){

        $resultat=array();
        try {
            $cnx = pdoo::connexionPDO(); #Connexion à la base de données 
    
            $req = $cnx->prepare('SELECT * FROM medecin ORDER BY '.$critere.' ASC'); #Préparation de la requête 

            $req->execute(); #Éxécution de la requête

            $ligne = $req->fetchall(PDO::FETCH_ASSOC); 
            
            foreach ($ligne as $key => $val) { 
                $collectionMedecins= new Medecin ($val['id'],$val['nom'],$val['prenom'],$val['adresse'],$val['tel'],
                $val['specialitecomplementaire'],$val['departement']);
                $resultat[]=$collectionMedecins;
            }
        
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    static public function get_medecinsOrderByNomZA(){

        $resultat=array();
        try {
            $cnx = pdoo::connexionPDO(); #Connexion à la base de données 
    
            $req = $cnx->prepare('SELECT * FROM medecin ORDER BY nom DESC'); #Préparation de la requête 

            $req->execute(); #Éxécution de la requête

            $ligne = $req->fetchall(); 
            
            foreach ($ligne as $key => $val) { 
                $collectionMedecins= new Medecin ($val['id'],$val['nom'],$val['prenom'],$val['adresse'],$val['tel'],
                $val['specialitecomplementaire'],$val['departement']);
                $resultat[]=$collectionMedecins;
            }
        
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }
        
}

