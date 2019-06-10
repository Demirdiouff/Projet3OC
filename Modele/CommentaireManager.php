<?php

require_once 'Modele/Modele.php';

// Quelles seront les caractéristiques de mes objets ?
// Quelles seront les fonctionnalités de mes objets ?

// De quoi à besoin un manager pour fonctionner = une connexion à la BDD, pour pouvoir exécuter des requêtes. En utilisant PDO, la connexion à la BDD est représentée par un objet

// Un manager doit pouvoir :
// enregistrer une nouvelle entité; (C)
// sélectionner une entité; (R)
// modifier une entité; (U)
// supprimer une entité; (D)

class CommentaireManager extends Modele {
    
    private $_bdd; // Instance de PDO
    
    public function __construct() {
        
    }
    
    public function add(Commentaire $com) {
        // Connexion à la BDD
        // Prépare une requête de type INSERT
        // Assignation des valeurs à la requête
        // Exécution de la requête
        $bdd = $this->getBdd();
        $add = $bdd->prepare('INSERT INTO commentaires(date_commentaire, auteur_commentaire, contenu_commentaire, id_post) VALUES(:date_commentaire, :auteur_commentaire, :contenu_commentaire, :id_post)');
        $date = date(DATE_W3C); // Récupère la date courante
        $today = date("Y-m-d H:i:s");
        $add->bindValue(':date_commentaire', $today);
        $add->bindValue(':auteur_commentaire', $com->auteurCommentaire());
        $add->bindValue(':contenu_commentaire', $com->contenuCommentaire());
        $add->bindValue(':id_post', $com->idPost());
        $add->execute();
    }
    
    public function delete(Commentaire $com) {
        // Exécute une requête de type DELETE
        $bdd = $this->getBdd();
        $bdd->exec('DELETE FROM commentaires WHERE id_commentaire = ' . $com->id());
    }
    
    public function getCommentaire($idPost) {
        // Exécute une requête de type SELECT avec une clause WHERE, et retourne un objet Commentaire
        $commentaires = [];
        $bdd = $this->getBdd();
        $getCommentaires = $bdd->prepare('SELECT * from commentaires where id_post=?');
        $getCommentaires->execute(array($idPost));
        while ($commentaire = $getCommentaires->fetch(PDO::FETCH_ASSOC)) {
            $commentaires[] = new Commentaire($commentaire);
        }
        return $commentaires;
    }
    
    public function getCommentaires() {
        // Exécute une requête de type SELECT pour retourner les commentaires
        $commentaires = [];
        $bdd = $this->getBdd();
        $getCommentaires = $bdd->query('SELECT * from commentaires order by id_commentaire desc');
        while ($commentaire = $getCommentaires->fetch(PDO::FETCH_ASSOC)) {
            $commentaires[] = new Commentaire($commentaire);
        }
        return $commentaires;
    }
    
    public function update(Commentaire $com) {
        // Connexion à la BDD
        // Prépare une requête de type UPDATE
        // Assignation des valeurs à la requête
        // Exécution de la requête
        $bdd = $this->getBdd(); 
        $update = $bdd->prepare('UPDATE commentaires SET date_commentaire = :date_commentaire, auteur_commentaire = :auteur_commentaire, contenu_commentaire = :contenu_commentaire WHERE id_commentaire = :id_commentaire');
        $update->bindValue(':date_commentaire', $com->dateCommentaire());
        $update->bindValue(':auteur_commentaire', $com->auteurCommentaire());
        $update->bindValue(':contenu_commentaire', $com->contenuCommentaire());
        $update->execute();
    }
    
    public function updateSignalementCommentaire($idCommentaire) {
        // Connexion à la BDD
        // Prépare une requête de type UPDATE
        // Assignation des valeurs à la requête
        // Exécution de la requête
        $bdd = $this->getBdd();
        $updateSignalementCommentaire = $bdd->prepare('UPDATE commentaires SET signalement_commentaire = signalement_commentaire+1 WHERE id_commentaire = :id_commentaire');
        $updateSignalementCommentaire->bindValue(':id_commentaire', $idCommentaire);
        $updateSignalementCommentaire->execute();
        return $updateSignalementCommentaire;
    }
    
    public function getTableauNombreCommentaires() {
        $bdd = $this->getBdd();
        $ligneBdd = $bdd->query('SELECT id_post, count(*) as nb_commentaire from commentaires group BY id_post');
        $ligneBdd->execute();
        $tableauNbCommentaire = array();
        while ($currentLine = $ligneBdd->fetch()) {
            $currentIdPost = $currentLine['id_post'];
            $currentCount = $currentLine['nb_commentaire'];
            $tableauNbCommentaire[$currentIdPost] = $currentCount;
        }
        return $tableauNbCommentaire;
    }
    
    public function getTableauCommentairesSignales() {
        $commentairesSignales = [];
        $bdd = $this->getBdd();
        $getCommentairesSignales = $bdd->query('SELECT * from commentaires WHERE signalement_commentaire > 0');
        while ($commentaireSignale = $getCommentairesSignales->fetch(PDO::FETCH_ASSOC)) {
            $commentairesSignales[] = new Commentaire($commentaireSignale);
        }
        return $commentairesSignales;
    }
    
    public function getTableauCommentaireUniqueSignale($com) {
        $bdd = $this->getBdd();
        $getOneCommentaireSignale = $bdd->prepare('SELECT * from commentaires WHERE signalement_commentaire > 0');
        $getOneCommentaireSignale->execute(array($com));
        if ($getOneCommentaireSignale->rowCount() > 0) {
            $fetchOneCommentaireSignale = $getOneCommentaireSignale->fetch();
            return new Commentaire($fetchOneCommentaireSignale); // Accès à la première ligne de résultat
        } else {
            throw new Exception("Aucun commentaire n'a été signalé");
        }
    }
    
    public function reinitialiserSignalementCommentaire($idCommentaire) {
        $bdd = $this->getBdd();
        $reinitialiserSignalementCommentaire = $bdd->prepare('UPDATE commentaires SET signalement_commentaire = 0 WHERE id_commentaire = :id_commentaire');
        $reinitialiserSignalementCommentaire->bindValue(':id_commentaire', $idCommentaire);
        $reinitialiserSignalementCommentaire->execute();
        return $reinitialiserSignalementCommentaire;
    }

//     Peut être utile pour un retour de commentaire sur post unique
//     public function getNombreCommentaires($idPost) {
//         $bdd = $this->getBdd();
//         $nombreCommentaires = $bdd->query('SELECT count(*) AS nombre_commentaire FROM commentaires WHERE id_post= :id_post');
//         $nombreCommentaires->bindValue(':id_post', $idPost);
//         $nombreCommentaires->execute();
//         $resultatNbCommentaires = $nombreCommentaires->fetch();
//         return $resultatNbCommentaires['nombre_commentaire'];
//     }
}