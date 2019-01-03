<?php

require 'Modele/Modele.php';

// Affiche la liste de tous les billets du blog
function accueil(){
    $billets = getBillets();
    require 'Vue/vueAccueil.php';
}

// Affiche un billet et ses commentaires associés
function billet($idBillet){
    $billet = getBillet($idBillet);
    $commentaires = getCommentaires($idBillet);
    require 'Vue/vueBillet.php';
}

// Affiche les erreurs
function erreur($msgErreur){
    require 'Vue/vueErreurs.php';
}