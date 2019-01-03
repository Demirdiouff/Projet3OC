<?php

require_once 'Modele/Modele.php';

class Commentaire extends Modele
{

    // Renvoie la liste des commentaires associés à un billet
    public function getCommentaires($idBillet)
    {
        $bdd = $this->getBdd();
        $commentaires = $bdd->prepare('select COM_ID as id, COM_DATE as date,' . ' COM_AUTEUR as auteur, COM_CONTENU as contenu from T_COMMENTAIRE' . ' where BIL_ID=?');
        $commentaires->execute(array(
            $idBillet
        ));
        return $commentaires;
    }
}