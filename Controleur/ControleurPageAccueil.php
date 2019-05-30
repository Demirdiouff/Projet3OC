<?php

require_once 'Modele/Modele.php';
require_once 'Vue/Vue.php';

class ControleurPageAccueil {
    
    public function __construct() {
    }
    
    // Affiche la liste de tous les billets du blog
    public function accueil() {
        $vue = new Vue("PageAccueil", "Un billet pour l'Alaska");
        $vue->generer(array());
    }
}