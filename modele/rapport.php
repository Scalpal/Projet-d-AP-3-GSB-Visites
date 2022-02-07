<?php 

class Rapport{
    private $IdRapport;
    private $DateRapport;
    private $Motif;
    private $Bilan;
    private $IdVisiteur;
    private $IdMedecin;

    public function __construct($unIdRapport,$uneDateRapport,$unMotif,$unBilan,$unIdVisiteur,$unIdMedecin){
        $this->IdRapport=$unIdRapport;
        $this->DateRapport=$uneDateRapport;
        $this->Motif=$unMotif;
        $this->Bilan=$unBilan;
        $this->IdVisiteur=$unIdVisiteur;
        $this->IdMedecin=$unIdMedecin;
    }

    #Getters de la classe Reservation 
    public function get_IdRapport() { return $this->IdRapport; }
    public function get_DateRapport() { return $this->DateRapport; }
    public function get_Motif() { return $this->Motif; }
    public function get_Bilan() { return $this->Bilan; }
    public function get_IdVisiteur() { return $this->IdVisiteur; }
    public function get_IdMedecin() { return $this->IdMedecin; }
}