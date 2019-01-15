<?php

require_once 'Modele/Modele.php';
require_once 'Vue/Vue.php';

class ControleurPropos {
    
    public function __construct() {
        
    }
    
    public function propos() {
        $vue = new Vue("Propos");
        $vue->generer(array());
    }
}