<?php

// Accès aux données
require 'Controleur/Controleur.php';

try {
    if(isset($_GET['action'])) {
        if ($_GET['action'] == 'billet') {
            if (isset($_GET['id'])) {
                $idBillet = intval($_GET['id']);
                if ($idBillet != 0) {
                    billet($idBillet);
                } else {
                    throw new Exception("Identifiant de billet non valide");
                }
            } else {
                throw new Exception("Identifiant de billet non défini");
            }
        } else {
            throw new Exception("Action non définie");
        }
    } else {
        accueil();
    }
}
catch (Exception $e) {
    erreur($e->getMessage());
}
