<?php

require 'Modele.php';

// Affiche la liste de tous les billets du blog
function accueil(){
    $billets = getBillets();
    require 'vueAccueil.php';
}

// Affiche un billet et ses commentaires associés
function billet($idBillet){
    $billet = getBillet($idBillet);
    $commentaires = getCommentaires($idBillet);
    require 'vueBillet.php';
}

// Affiche les erreurs
function erreur($msgErreur){
    require 'vueErreurs.php';
}