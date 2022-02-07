<?php

class Offrir{
    private $IdRapport;
    private $IdMedicament;
    private $quantite;

    public function __construct($unIdRapport,$unIdMedecin,$uneQuantite){
        $this->IdRapport=$unIdRapport;
        $this->IdMedecin=$unIdMedecin;
        $this->Quantite=$uneQuantite;
    }

    public function get_IdRapport(){ return $this->IdRapport ;}
    public function get_IdMedecin(){ return $this->IdMedecin ;}
    public function get_Quantite(){ return $this->Quantite ;}
}