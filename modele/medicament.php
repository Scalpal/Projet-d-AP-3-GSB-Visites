<?php 

class Medicament{
    protected $idMedicament;
    protected $nomCommercial;
    protected $idFamille;
    protected $composition;
    protected $effets;
    protected $contreIndications;

    public function __construct($unIdMedicament,$unNomCommercial,$unIdFamille,$uneComposition,$unEffet,$uneContreIndication){
        $this->IdMedicament=$unIdMedicament;
        $this->NomCommercial=$unNomCommercial;
        $this->IdFamille=$unIdFamille;
        $this->Composition=$uneComposition;
        $this->Effets=$unEffet;
        $this->ContreIndication=$uneContreIndication;
    }

    public function get_IdMedicament(){ return $this->IdMedicament; }
    public function get_NomCommercial(){ return $this->NomCommercial; }
    public function get_IdFamille() { return $this->IdFamille; }
    public function get_Composition() { return $this->Composition; }
    public function get_Effets() { return $this->Effets; }
    public function get_ContreIndication() { return $this->ContreIndication; }
}