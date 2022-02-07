<?php

class Famille{
    public $IdFamille;
    private $libelle;

    public function __construct($unId, $unLibelle){
        $this->idFamille=$unId;
        $this->libelle=$unLibelle;
    }

    public function get_idFamille(){ return $this->idFamille; }
    public function get_libelle(){ return $this->libelle; }

}