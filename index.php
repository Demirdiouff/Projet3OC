<?php

// Accès aux données
require 'Modele.php';

try {
    $billets = getBillets();
    require 'vueAccueil.php';
}
catch (Exception $e) {
    require 'vueErreurs.php';
}
