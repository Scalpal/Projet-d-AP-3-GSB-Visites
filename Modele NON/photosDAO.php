<?php

class photosDAO{

    static public function get_Photos(){
        $resultat = array();

        try {
            $cnx = pdoo::connexionPDO(); #Connexion à la base de données 
    
            $req = $cnx->prepare('SELECT * FROM photos'); #Préparation de la requête 

            $req->execute(); #Éxécution de la requête

            $ligne = $req->fetch(PDO::FETCH_ASSOC); #Récupération du résultat de la requête et inséré dans la variable $ligne
            while ($ligne) {        #Tant que $ligne n'est pas vide, la boucle insert $ligne dans un tableau $resultat
                $resultat[] = $ligne;
                $ligne = $req->fetch(PDO::FETCH_ASSOC);
            }
        
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    static public function get_PhotosByID($IdPhoto){
        $resultat = array();

        try {
            $cnx = pdoo::connexionPDO(); #Connexion à la base de données 
    
            $req = $cnx->prepare('SELECT * FROM photos WHERE IdPhoto=:IdPhoto'); #Préparation de la requête 
            $req->bindvalue(':IdPhoto',$IdPhoto, PDO::PARAM_INT);

            $req->execute(); #Éxécution de la requête

            $ligne = $req->fetch(PDO::FETCH_ASSOC); #Récupération du résultat de la requête et inséré dans la variable $ligne
            while ($ligne) { #Tant que $ligne n'est pas vide, la boucle insert $ligne dans un tableau $resultat
                $resultat[] = $ligne;
                $ligne = $req->fetch(PDO::FETCH_ASSOC);
            }
        
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    static public function get_PhotosByIDAct($IdAct){
        $resultat = array();

        try {
            $cnx = pdoo::connexionPDO(); #Connexion à la base de données 
    
            $req = $cnx->prepare('SELECT * FROM photos WHERE IdAct=:IdAct'); #Préparation de la requête 
            $req->bindvalue(':IdAct',$IdAct, PDO::PARAM_INT);

            $req->execute(); #Éxécution de la requête

            $ligne = $req->fetch(PDO::FETCH_ASSOC); #Récupération du résultat de la requête et inséré dans la variable $ligne
            while ($ligne) { #Tant que $ligne n'est pas vide, la boucle insert $ligne dans un tableau $resultat
                $resultat[] = $ligne;
                $ligne = $req->fetch(PDO::FETCH_ASSOC);
            }
        
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    static public function get_PhotoByCodeCircuit($CodeCircuit){
        $resultat = array();

        try {
            $cnx = pdoo::connexionPDO(); #Connexion à la base de données 
    
            $req = $cnx->prepare('SELECT * FROM photos WHERE CodeCircuit=:CodeCircuit'); #Préparation de la requête 
            $req->bindvalue(':CodeCircuit',$CodeCircuit, PDO::PARAM_INT);

            $req->execute(); #Éxécution de la requête

            $ligne = $req->fetch(PDO::FETCH_ASSOC); #Récupération du résultat de la requête et inséré dans la variable $ligne
            while ($ligne) { #Tant que $ligne n'est pas vide, la boucle insert $ligne dans un tableau $resultat
                $resultat[] = $ligne;
                $ligne = $req->fetch(PDO::FETCH_ASSOC);
            }
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    static public function get_CheminPhoto($IdPhoto){
        $resultat = array();

        try {
            $cnx = pdoo::connexionPDO(); #Connexion à la base de données 
    
            $req = $cnx->prepare('SELECT CheminPhoto FROM photos WHERE IdPhoto=:IdPhoto'); #Préparation de la requête 
            $req->bindvalue(':IdPhoto',$IdPhoto, PDO::PARAM_INT);

            $req->execute(); #Éxécution de la requête

            $ligne = $req->fetch(PDO::FETCH_ASSOC); #Récupération du résultat de la requête et inséré dans la variable $ligne
            $chemin = $ligne['CheminPhoto']; #Assignation de la valeur de $ligne a uen variable $chemin 
        
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $chemin;
    }

    
}

