<?php

class destinations{
    public $tabCircuits;

    public function __construct($tabCircuits){
        $this->tabCircuits=null;
    }
    
    public function add_circuit($unCircuit){
        $this->tabCircuits[]=$unCircuit;
    }
}