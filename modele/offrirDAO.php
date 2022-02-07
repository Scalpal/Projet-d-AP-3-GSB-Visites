<?php

class OffrirDAO{
    
    public static function Add_MedicamentOffertRapport($unRapport,$unMedicament, $uneQuantite){

        $check = false;
        try{
            $cnx = pdoo::connexionPDO();

            $req= $cnx->prepare("INSERT INTO offrir (idRapport, idMedicament, quantite)
                            VALUES (:idRapport, :idMedicament, :quantite) ");
            $req->bindvalue(':idRapport', $unRapport, PDO::PARAM_INT);
            $req->bindvalue(':idMedicament', $unMedicament, PDO::PARAM_STR);
            $req->bindvalue(':quantite', $uneQuantite, PDO::PARAM_INT);

            $req->execute();

            $check = true;
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $check;
    }

    public static function get_IdMedicamentOffertRapport($idRapport){
        $resultat = array();

        try{
            $cnx = pdoo::connexionPDO();

            $req = $cnx->prepare("SELECT idMedicament FROM offrir WHERE idRapport=:idRapport");
            $req->bindvalue(":idRapport", $idRapport, PDO::PARAM_INT);
            $req->execute();

            $resultat = $req->fetchAll(PDO::FETCH_ASSOC); // Pour récuperer toutes les valeurs dans un tableau associatif

        }catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }   
    return $resultat;
    }

    public static function get_QteMedicamentOffertRapport($idRapport){
        $resultat = array();

        try{
            $cnx = pdoo::connexionPDO();

            $req = $cnx->prepare("SELECT quantite FROM offrir WHERE idRapport=:idRapport");
            $req->bindvalue(":idRapport", $idRapport, PDO::PARAM_INT);
            $req->execute();

            $resultat = $req->fetchAll(PDO::FETCH_ASSOC); // Pour récuperer toutes les valeurs dans un tableau associatif

        }catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }   
    return $resultat;
    }

}