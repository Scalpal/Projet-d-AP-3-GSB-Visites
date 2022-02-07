<?php

include 'modele/activite.php';
#include 'modele/pdo.php';

class activiteDAO{

    static public function get_familles(){
        $resultat=array();
        try {
            $cnx = pdoo::connexionPDO(); #Connexion à la base de données 
    
            $req = $cnx->prepare('SELECT * FROM famille'); #Préparation de la requête 

            $req->execute(); #Éxécution de la requête

            $ligne = $req->fetchall(); 
            
            foreach ($ligne as $key => $val) { 
                $collectionFamilles = new Famille ($val['id'],$val['libelle']);
                $resultat[]=$collectionActivite;
            }
        
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    static public function get_familleById($unIdFamille){
        $resultat=array();
        try {
            $cnx = pdoo::connexionPDO(); #Connexion à la base de données 
    
            $req = $cnx->prepare('SELECT * FROM famille WHERE id=:id'); #Préparation de la requête 
            $req->bindvalue(':id',$unIdFamille,PDO::PARAM_INT);
            $req->execute(); #Éxécution de la requête

            $ligne = $req->fetchall(); 
            
            foreach ($ligne as $key => $val) { 
                $collectionActivite = new Famille ($val['id'],$val['libelle']);
                $resultat[]=$collectionActivite;
            }
        
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }
}