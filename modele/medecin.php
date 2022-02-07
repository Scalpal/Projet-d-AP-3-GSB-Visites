<?php 

class Medecin{
    
    private $Nom;
    private $Prenom;
    private $Adresse;
    private $Tel;
    private $Specialite;
    private $Departement;

    public function __construct($unId,$unNom,$unPrenom,$uneAdresse,$unTel,$uneSpecialite,$unDepartement){
        $this->idMedecin=$unId;
        $this->Nom=$unNom;
        $this->Prenom=$unPrenom;
        $this->Adresse=$uneAdresse;
        $this->Tel=$unTel;
        $this->Specialite=$uneSpecialite;
        $this->Departement=$unDepartement;
    }

    public function get_IdMedecin(){ return $this->idMedecin; }
    public function get_Nom(){ return $this->Nom; }
    public function get_Prenom(){ return $this->Prenom; }
    public function get_Adresse(){ return $this->Adresse; }
    public function get_Tel(){ return $this->Tel; }
    public function get_Specialite(){ return $this->Specialite; }
    public function get_Departement(){ return $this->Departement; }
    

    public function get_DestinationsIntoStr(){
        $str="";
        if ($this->Destinations == 1){
            $str ="Dubaï";
        }
        elseif ($this->Destinations == 2){
            $str="Thaïlande";
        }
        else{
            $str="Cambodge";
        }
        return $str;
    }

    /* public function create_circuit($Code){
        $ListeCircuits = circuitDAO::get_CircuitByCode($Code);

        while ($ligne = )
        $circuit = new Circuit()
    } */

}

