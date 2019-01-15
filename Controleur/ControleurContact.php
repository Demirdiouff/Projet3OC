<?php

require_once 'Modele/Modele.php';
require_once 'Vue/Vue.php';

class ControleurContact {
    
    public function __construct() {
        
    }
    
    // Affiche la page contact
    public function contact() {
        $vue = new Vue("Contact");
        $vue->generer(array());
    }
}