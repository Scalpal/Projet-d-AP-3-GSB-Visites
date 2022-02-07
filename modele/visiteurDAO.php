<?php

include_once "modele/pdo.php";
include "$racine/modele/visiteur.php";

class VisiteurDAO{

    static public function get_visiteurByLogin($unLogin){
        $resultat = array();

        try {
            $cnx = pdoo::connexionPDO();

            $req = $cnx->prepare('SELECT * FROM visiteur WHERE login=:lelogin;');
            $req->bindvalue(':lelogin',$unLogin,PDO::PARAM_STR);
            $req->execute();

            $ligne = $req->fetchall();
            
            foreach($ligne as $key => $val){
                $Visiteur = new Visiteur($val['id'],$val['nom'],$val['prenom'],$val['login'],$val['mdp']
                ,$val['adresse'],$val['cp'],$val['ville'],$val['dateEmbauche'],$val['timespan'],$val['ticket']);

                $resultat[]= $Visiteur;
            }
        }catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    static public function get_visiteurs(){
        $resultat = array();

        try {
            $cnx = pdoo::connexionPDO();

            $req = $cnx->prepare('SELECT * FROM visiteur;');

            $req->execute();

            $ligne = $req->fetch(PDO::FETCH_ASSOC);
            
            foreach($ligne as $key => $val){
                $Visiteur = new Visiteur($val['id'],$val['nom'],$val['prenom'],$val['login'],$val['mdp']
                ,$val['adresse'],$val['cp'],$val['ville'],$val['dateEmbauche'],$val['timespan'],$val['ticket']);

                $resultat[]= $Visiteur;
            }
        }catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }
}































/*
  static public function add_personne($unnom,$unprenom,$unelogin,$unmdp,$unMailClient, $unMdpClient){
    try {
        $cnx = pdoo::connexionPDO();

        #Préparation de la requête d'ajout 
        $req = $cnx->prepare('INSERT INTO personne (nom, prenom, login, mdp, MailClient, MdpClient)
        VALUES (:nom, :prenom, :login, :mdp, :MailClient, :MdpClient)');
        
        #Assignation des valeurs de la personne en paramètres
        $req->bindValue(':nom', $unnom, PDO::PARAM_STR);
        $req->bindValue(':prenom', $unprenom, PDO::PARAM_STR);
        $req->bindValue(':login', $unelogin, PDO::PARAM_STR);
        $req->bindValue(':mdp', $unmdp, PDO::PARAM_INT);
        $req->bindValue(':MailClient', $unMailClient, PDO::PARAM_STR);
        $req->bindValue(':MdpClient', $unMdpClient, PDO::PARAM_STR);
        
        #Éxécution de la requête
        $req->execute();
    
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
    }

    static public function get_InfoPersonneByLogin($unLogin){
        try {
            $cnx = pdoo::connexionPDO();
            $req = $cnx->prepare('SELECT * FROM visiteur WHERE login=:login');
            $req->bindValue(':login', $unLogin, PDO::PARAM_STR);
            $req->execute();
    
            $resultat = $req->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    static public function update_VisiteurById($id,$nom,$prenom,$login,$mdp,$Adresse,$Cp,$ville){
        try {
            $ret=false;

            $cnx = pdoo::connexionPDO();
            $req = $cnx->prepare('UPDATE personne SET nom =:nom, prenom=:prenom , login=:login,
            mdp=:mdp , MailClient=:MailClient , MdpClient=:MdpClient  WHERE IdClient=:IdClient');
            $req->bindValue(':nom', $nom, PDO::PARAM_STR);
            $req->bindValue(':prenom', $prenom, PDO::PARAM_STR);
            $req->bindValue(':login', $login, PDO::PARAM_STR);
            $req->bindValue(':mdp', $mdp, PDO::PARAM_INT);
            $req->bindValue(':MailClient', $Adresse, PDO::PARAM_STR);
            $req->bindValue(':MdpClient', $Cp, PDO::PARAM_STR);
            $req->bindValue(':IdClient', $IdClient, PDO::PARAM_INT);
            $req->execute();
            
            $ret=true;
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $ret;
    }
    
}

/* Assignation des valeurs de la personne en paramètres
    $req->bindValue(':IdClient', $unePersonne->get_Id(), PDO::PARAM_INT);
    $req->bindValue(':nom', $unePersonne->get_Nom(), PDO::PARAM_STR);
    $req->bindValue(':prenom', $unePersonne->get_Prenom(), PDO::PARAM_STR);
    $req->bindValue(':login', $unePersonne->get_Adresse(), PDO::PARAM_STR);
    $req->bindValue(':mdp', $unePersonne->get_Tel(), PDO::PARAM_INT);
    $req->bindValue(':MailClient', $unePersonne->get_Mail(), PDO::PARAM_STR);
    $req->bindValue(':MdpClient', $unePersonne->get_Mdp(), PDO::PARAM_STR); 
*/

/* Boucle pour création d'objet personne

foreach ($ligne as $key => $val) { 
    $collectionPersonne = new personne ($val['IdClient'],$val['nom'],$val['prenom'],$val['login'],$val['mdp'],
    $val['MailClient'],$val['MdpClient']);
    $resultat[]=$collectionPersonne;
}
*/