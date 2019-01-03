<?php

abstract class Modele
{
    
    // Objet PDO pour accèder à la BDD
    private $bdd;

    // Execute une requête SQL éventuellement paramètrée
    protected function executerRequete($sql, $params = null) {
        if ($params == null) {
            $resultat = $this->getBdd()->query($sql); // exécution directe
        } else {
            $resultat = $this->getBdd()->prepare($sql); // requête préparée
            $resultat->execute($params);
        }
        return $resultat;
    }
    
    // Connexion BDD
    // Instancie et renvoi l'objet PDO associé
    protected function getBdd()
    {
        $bdd = new PDO('mysql:host=localhost;dbname=Projet3OC;charset=utf8', 'root', 'root', array(
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ));
        return $bdd;
    }
}