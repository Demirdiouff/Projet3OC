<?php

require_once 'Modele/AbstractEntity.php';

class Post extends AbstractEntity {
    
    private $id_post;
    private $date_post;
    private $auteur_post;
    private $titre_post;
    private $contenu_post;
    
    public function __construct($donnees) {
        $this->hydrate($donnees);
    }
    
    // Liste des getters
    public function id() {
        return $this->id_post;
    }
    
    public function datePost() {
        return $this->date_post;
    }
    
    public function auteurPost() {
        return $this->auteur_post;
    }
    
    public function titrePost() {
        return $this->titre_post;
    }
    
    public function contenuPost() {
        return $this->contenu_post;
    }
    
    // Liste des setters
    public function setIdPost($id) {
        // Les valeurs possibles de l'identifiant sont tous les nombres entiers strictement positifs
        // On convertit l'argument en nombre entier
        // Si c'en était déjà un rien ne changera
        // Sinon, la conversion donnera le nombre 0 (à quelques exceptions près)
        $id = (int) $id;
        
        // On vérifie ensuite si ce nombre est bien strictement positif
        if ($id > 0) {
            // Si c'est le cas, c'est parfait, on assigne la valeur à l'attribut correspondant
            $this->id_post = $id;
        }
    }
    
    public function setDatePost($datePost) {
        // Les valeurs possibles du date post sont des champs date
        // On vérifie qu'il s'agit bien d'une date
        if (is_string($datePost)) {    
            $this->date_post = $datePost;
        }
    }
    
    public function setAuteurPost($auteurPost) {
        // Les valeurs possibles de l'auteur post sont toutes les chaînes de caractères
        // On vérifie qu'il s'agit bien d'une chaîne de caractère
        if (is_string($auteurPost)) {
            $this->auteur_post = $auteurPost;
        }
    }
    
    public function setTitrePost($titrePost) {
        // Les valeurs possibles du titre post sont toutes les chaînes de caractères
        // On vérifie qu'il s'agit bien d'une chaîne de caractères 
        if (is_string($titrePost)) {
            $this->titre_post = $titrePost;
        }
    }
    
    public function setContenuPost($contenuPost) {
        // Les valeurs possibles du contenu post sont toutes les chaînes de caractères
        // On vérifie qu'il s'agit bien d'une chaîne de caractères
        if (is_string($contenuPost)) {
            $this->contenu_post = $contenuPost;
        }
    }
    
    // On vérifie si l'auteur du post est valide
    public function auteurValide() {
        return !empty($this->auteur_post);
    }
    
    // On vérifie si le titre du post est valide
    public function titreValide() {
        return !empty($this->titre_post);
    }
    
    // On vérifie si le contenu du post est valide
    public function contenuValide() {
        return !empty($this->contenu_post);
    }
}
