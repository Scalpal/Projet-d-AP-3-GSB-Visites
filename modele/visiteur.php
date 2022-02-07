<?php

class Visiteur{
    private $IdVisiteur;
    private $NomVisiteur;
    private $PrenomVisiteur;
    private $login;
    private $mdp;
    private $AdresseVisiteur;
    private $Cp;
    private $ville;
    private $DateEmbauche;
    private $TimeSpan;
    private $Ticket;

    public function __construct ($unIdVisiteur,$unNom,$unPrenom,$unLogin,$unMdp,$uneAdresse,$unCp,$uneVille,$uneDate,$unTimespan,$unTicket){
        $this->IdVisiteur=$unIdVisiteur;
        $this->NomVisiteur=$unNom;
        $this->PrenomVisiteur=$unPrenom;
        $this->login=$unLogin;
        $this->mdp=$unMdp;
        $this->AdresseVisiteur=$uneAdresse;
        $this->CpVisiteur=$unCp;
        $this->VilleVisiteur=$uneVille;
        $this->DateEmbaucheVisiteur=$uneDate;
        $this->Timespan=$unTimespan;
        $this->Ticket=$unTicket;
    }

    public function get_IdVisiteur() {return $this->IdVisiteur; }
    public function get_NomVisiteur() {return $this->NomVisiteur; }
    public function get_PrenomVisiteur() {return $this->PrenomVisiteur; }
    public function get_login() {return $this->login; }
    public function get_mdp() {return $this->mdp; }
    public function get_AdresseVisiteur() {return $this->AdresseVisiteur; }
    public function get_CpVisiteur() {return $this->CpVisiteur; }
    public function get_VilleVisiteur() {return $this->VilleVisiteur; }
    public function get_DateEmbaucheVisiteur() {return $this->DateEmbaucheVisiteur; }
    public function get_Timespan() {return $this->Timespan; }
    public function get_Ticket() {return $this->Ticket; }
}