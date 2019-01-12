<?php

require_once 'Modele/Billet.php';
require_once 'Vue/Vue.php';

class ControleurRoman {
    
    private $billet;
    
    public function __construct() {
        $this->billet = new Billet();
    }
    
    // Affiche la liste de tous les billets du blog
    public function roman() {
        $billets = $this->billet->getBillets();
        $vue = new Vue("Roman");
        $vue->generer(array('billets' => $billets));
    }
}