<?php

require_once 'Modele/Modele.php';
require_once 'Vue/Vue.php';

class ControleurPagePropos {
    
    public function __construct() {
        
    }
    
    public function propos() {
        $vue = new Vue("PagePropos", "A Propos");
        $vue->genererPagePropos(array());
    }
}