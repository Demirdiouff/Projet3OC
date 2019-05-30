<?php

require_once 'Modele/Modele.php';
require_once 'Vue/Vue.php';

class ControleurPageContact {
    
    public function __construct() {
        
    }
    
    // Affiche la page contact
    public function contact() {
        $vue = new Vue("PageContact", "Contactez-moi");
        $vue->genererPageContact(array());
    }
}