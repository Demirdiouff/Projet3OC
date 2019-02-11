<?php
require_once 'Modele/Modele.php';

class Admin extends Modele
{

    // Va ajouter l'identifiant non encore inscrit dans la BDD pour permettre la connexion plus tard
    public function ajoutIdentifiant($pseudo, $motDePasse)
    {
        $sql = 'insert INTO utilisateurs(id_utilisateur, nom_utilisateur, mot_de_passe) VALUES(null, ?, ?)';
        $this->executerRequete($sql, array(
            $pseudo,
            $motDePasse
        ));
    }

    // Va chercher si l'identifiant existe, et s'il existe et que le mot de passe est juste il récupère les données pour permettre une connexion a l'espace admin
    public function verifIdentifiant($pseudo, $motDePasse)
    {
        $sql = 'SELECT id_utilisateur as id, mot_de_passe as motDePasse FROM utilisateurs WHERE nom_utilisateur=?';
        $this->executerRequete($sql, array(
            $pseudo,
            $motDePasse
        ));
        // $verifIdent->execute(array($pseudo));

        // return $verifIdent;
    }
}