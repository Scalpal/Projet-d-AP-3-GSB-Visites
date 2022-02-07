<?php

include_once "modele/visiteurDAO.php";

class connexionDAO{

    static public function logout() {
        if (!isset($_SESSION)) {
            session_start();
        }
        unset($_SESSION["login"]);
        unset($_SESSION["mdp"]);
    }

    static public function get_loginVisiteurLoggedOn(){
        if (connexionDAO::isLoggedOn() == true){
            $ret = $_SESSION["login"];
        }
        else {
            $ret = "";
        }
        return $ret;  
    }

    static public function isLoggedOn() {
        if (!isset($_SESSION)) {
            session_start();
        }
        $ret = false;

        if (isset($_SESSION["login"])) {
            $visiteur = visiteurDAO::get_visiteurByLogin($_SESSION["login"]);
            if ($visiteur[0]->get_login() == $_SESSION["login"] && $visiteur[0]->get_mdp() == $_SESSION["mdp"]) {
                $ret = true;
            }
        }
        return $ret;
    }

}