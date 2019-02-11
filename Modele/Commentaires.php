<?php

require_once 'Modele/Modele.php';

class Commentaire extends Modele
{

    // Renvoie la liste des commentaires associés à un billet
    public function getCommentaires($idBillet)
    {
        $bdd = $this->getBdd();
        $commentaires = $bdd->prepare('select id_commentaire as id, date_commentaire as date, auteur_commentaire as auteur, contenu_commentaire as contenu from commentaires where id_post=?');
        $commentaires->execute(array($idBillet));
        return $commentaires;
    }
    
    // Ajoute un commentaire dans la base 
    public function ajouterCommentaire($auteur, $contenu, $idBillet) {
        $sql = 'insert into commentaires(date_commentaire, auteur_commentaire, contenu_commentaire, id_post) values(?, ?, ?, ?)';
        $date = date(DATE_W3C); // Récupère la date courante
        $this->executerRequete($sql, array($date, $auteur, $contenu, $idBillet));
    }
}