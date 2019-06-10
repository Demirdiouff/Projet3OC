<?php

require_once 'Modele/AbstractEntity.php';

class Commentaire extends AbstractEntity {
    
    private $id_commentaire;
    private $date_commentaire;
    private $auteur_commentaire;
    private $contenu_commentaire;
    private $signalement_commentaire;
    private $id_post;
    
    public function __construct($donnees) {
        $this->hydrate($donnees);
    }
    
    // Liste des getters
    public function id() {
        return $this->id_commentaire;
    }
    
    public function dateCommentaire() {
        return $this->date_commentaire;
    }
    
    public function auteurCommentaire() {
        return $this->auteur_commentaire;
    }
    
    public function contenuCommentaire() {
        return $this->contenu_commentaire;
    }
    
    public function signalementCommentaire() {
        return $this->signalement_commentaire;
    }
    
    public function idPost() {
        return $this->id_post;
    }
    
    // Liste des setters
    public function setIdCommentaire($id) {
        // Les valeurs possibles de l'identifiant sont tous les nombres entiers strictement positifs
        // On convertit l'argument en nombre entier
        // Si c'en était déjà un rien ne changera
        // Sinon, la conversion donnera le nombre 0 (à quelques exceptions près)
        $id = (int) $id;
        
        // On vérifie ensuite si ce nombre est bien strictement positif
        if ($id > 0) {
            // Si c'est le cas, c'est parfait, on assigne la valeur à l'attribut correspondant
            $this->id_commentaire = $id;
        }
    }
    
    public function setDateCommentaire($dateCommentaire) {
        // Les valeurs possibles du post sont des champs date
        // On vérifie qu'il s'agit bien d'une dates
        if (is_string($dateCommentaire)) {
            $this->date_commentaire = $dateCommentaire;
        }
    }
    
    public function setAuteurCommentaire($auteurCommentaire) {
        // Les valeurs possibles du titre post sont toutes les chaînes de caractères
        // On vérifie qu'il s'agit bien d'une chaîne de caractères 
        if (is_string($auteurCommentaire)) {
            $this->auteur_commentaire = $auteurCommentaire;
        }
    }
    
    public function setContenuCommentaire($contenuCommentaire) {
        // Les valeurs possibles du titre post sont toutes les chaînes de caractères
        // On vérifie qu'il s'agit bien d'une chaîne de caractères 
        if (is_string($contenuCommentaire)) {
            $this->contenu_commentaire = $contenuCommentaire;
        }
    }
    
    public function setSignalementCommentaire($signalementCommentaire) {
        // Les valeurs possibles sont tous les nombres entiers strictement positifs
        // On convertir l'argument en nombre entier
        // Si c'en était déjà un rien ne changera
        // Sinon, la conversion donnera le nombre 0 (à quelques exceptions près)
        $signalementCommentaire = (int) $signalementCommentaire;
        
        // On vérifie ensuiet si ce nombre est bien strictement positif
        if ($signalementCommentaire > 0) {
            // Si c'est le cas, c'est parfait, on assigne la valeur à l'attribut correspondant
            $this->signalement_commentaire = $signalementCommentaire;
        }
    }
    
    public function setIdPost($idPost) {
        // Les valeurs possibles de l'identifiant sont tous les nombres entiers strictement positifs
        // On convertit l'argument en nombre entier
        // Si c'en était déjà un rien ne changera
        // Sinon, la conversion donnera le nombre 0 (à quelques exceptions près)
        $idPost = (int) $idPost;
        
        // On vérifie ensuite si ce nombre est bien strictement positif
        if ($idPost > 0) {
            // Si c'est pas le cas, c'est parfait, on assigne la valeur à l'attribut correspondant
            $this->id_post = $idPost;
        }
    }
    
    // On vérifie si l'auteur du commentaire est valide
    public function auteurValide() {
        return !empty($this->auteur_commentaire);
    }
    
    // On vérifie si le contenu du commentaire est valide
    public function contenuValide() {
        return !empty($this->contenu_commentaire);
    }
}