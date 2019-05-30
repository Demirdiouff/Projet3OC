<?php

require_once 'Modele/AbstractEntity.php';

class Utilisateur extends AbstractEntity {
    
    private $id_utilisateur;
    private $nom_utilisateur;
    private $mot_de_passe;
    private $is_admin;
    
    public function __construct(array $donnees) {
        $this->hydrate($donnees);
    }
    
    // Liste des getters
    public function id() {
        return $this->id_utilisateur;
    }
    
    public function nomUtilisateur() {
        return $this->nom_utilisateur;
    }
    
    public function motDePasse() {
        return $this->mot_de_passe;
    }
    
    public function isAdmin() {
        return $this->is_admin;
    }
    
    
    // Liste des setters
    public function setIdUtilisateur($id) {
        // Les valeurs possibles de l'identifiant sont tous les nombres entiers strictement positifs
        // On convertir l'argument en nombre entier
        // Si c'en était déjà un rien ne changera
        // Sinon, la conversion donnera le nombre 0 (à quelques exceptions près) 
        $id = (int) $id;
        
        // On vérifie ensuite si ce nombre est bien strictement positif
        if ($id > 0) {
            // Si c'est le cas, c'est parfait, on assigne la valeur à l'attribut correspondant
            $this->id_utilisateur = $id;
        }
    }
    
    public function setNomUtilisateur($nomUtilisateur) {
        // Les valeurs possibles de l'utilisateur sont toutes les chaînes de caractères
        // On vérifie qu'il s'agit bien d'une chaîne de caractères
        if (is_string($nomUtilisateur)) {
            $this->nom_utilisateur = $nomUtilisateur;
        }
    }
    
    public function setMotDePasse($motDePasse) {
        // Les valeurs possibles du mot de passe sont toutes les chaînes de caractères
        // Toujours de la même manière on vérifie qu'il s'agit bien d'une chaîne de caractères
        if (is_string($motDePasse)) {
            $this->mot_de_passe = $motDePasse;
        }
    }
    
    public function setIsAdmin($isAdmin) {
        // Les valeurs possibles de l'identifiant sont tous les nombres entiers strictement positifs
        // On convertir l'argument en nombre entier
        // Si c'en était déjà un rien ne changera
        // Sinon, la conversion donnera le nombre 0 (à quelques exceptions près) 
        $isAdmin = (int) $isAdmin;
        
        // On vérifie ensuite si ce nombre est bien strictement positif
        if ($isAdmin > 0) {
            // Si c'est le cas, c'est parfait, on assigne la valeur à l'attribut correspondant
            $this->is_admin = $isAdmin;
        }
    }
    
    // On vérifie si le nom de l'utilisateur est valide
    public function nomValide() {
        return !empty($this->nom_utilisateur);
    }
}