<?php

require_once 'Modele/Modele.php';

class Billet extends Modele {
    
    // Renvoi la liste de tous les billets, triés par identifiant décroissant
    public function getBillets()
    {
        $sql = ('select id_post as id, date_post as date,' . ' titre_post as titre, contenu_post as contenu from posts' . ' order by id_post desc');
        $billets = $this->executerRequete($sql);
        return $billets;
    }
    
    // Renvoie les informations sur un billet
    public function getBillet($idBillet)
    {
        $sql = ('select id_post as id, date_post as date,' . ' titre_post as titre, contenu_post as contenu from posts' . ' where id_post=?');
        $billet = $this->executerRequete($sql, array($idBillet));
        if ($billet->rowCount() == 1) {
            return $billet->fetch(); // Accès à la première ligne de résultat
        } else {
            throw new Exception("Aucun billet ne correspond à l'identifiant '$idBillet'");
        }
    }

}