<?php

require_once 'Modele/Modele.php';
require_once 'Vue/Vue.php';

class ControleurEspaceAdmin {
    
    public function __construct() {
        
    }
    
    public function espaceAdmin() {
        $vue = new Vue("EspaceAdmin");
        $vue->generer(array());
    }
}