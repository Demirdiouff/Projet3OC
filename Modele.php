<?php

// Renvoi la liste de tous les billets, triés par identifiant décroissant
function getBillets(){
    $bdd = getBdd();
    $bdd = new PDO('mysql:host=localhost;dbname=Projet3OC;charset=utf8', 'root', 'root');
    $billets = $bdd->query('select BIL_ID as id, BIL_DATE as date,' . ' BIL_TITRE as titre, BIL_CONTENU as contenu from T_BILLET' . ' order by BIL_ID desc');
    return $billets;
}

function getBdd(){
    $bdd = new PDO('mysql:host=localhost;dbname=Projet3OC;charset=utf8', 'root', 'root');
    return $bdd;
}