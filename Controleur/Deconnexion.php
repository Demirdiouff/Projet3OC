<?php

require_once 'Modele/Modele.php';
require_once 'Vue/Vue.php';

class Deconnexion {
    
    
    public function __construct() {
        
    }
    
    public function deconnexion() {
        session_destroy();
        header('Location: index.php');
    }
}