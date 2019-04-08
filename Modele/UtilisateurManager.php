<?php

require_once 'Modele/Modele.php';

// Quelles seront les caractéristiques de mes objets ?
// Quelles seront les fonctionnalités de mes objets ?

// De quoi à besoin un manager pour fonctionner = une connexion à la BDD pour pouvoir exécuter des requêtes. En utilisant PDO, la connexion à la BDD est representée par un objet

// Un manager doit pouvoir :
// enregistrer une nouvelle entité; (C)
// sélectionner une entité; (R)
// modifier une entité; (U)
// supprimer une entité; (D)

class UtilisateurManager extends Modele {
    
    private $_bdd; // Instance de PDO
    
    
    public function __construct() {
    }
    
    public function add(Utilisateur $user) {
        // Préparation de la requête d'insertion
        $bdd = $this->getBdd();
        
        $add = $bdd->prepare('insert INTO utilisateurs(id_utilisateur, nom_utilisateur, mot_de_passe) VALUES(null, :nom_utilisateur, :mot_de_passe)');
        $add->bindValue(':nom_utilisateur', $user->nomUtilisateur());
        $add->bindValue(':mot_de_passe', $user->motDePasse());
        $add->execute();
    }
    
    public function delete(Utilisateur $user) {
        // Exécute une requête de type DELETE
        $bdd = $this->getBdd();
        $bdd->exec('DELETE FROM utilisateurs WHERE id = ' . $user->id());
    }
    
    public function getUser($idUtilisateur) {
        // Exécute une requête de type SELECT avec une clause WHERE, et retourne un objet Utilisateur
        $bdd = $this->getBdd();
        $getOneUser = $bdd->prepare('SELECT * from utilisateurs where id_utilisateur=?');
        $getOneUser->execute(array($idUtilisateur));
        if ($getOneUser->rowCount() == 1) {
            $fetchOneUser = $getOneUser->fetch();
            return new Utilisateur($fetchOneUser); // Accès à la première ligne de résultat
        } else {
            throw new Exception("Mot de passe ou identifiant incorrect");
        }
    }
    
    public function getUserByLoginPassword($login, $password) {
        // Exécute une requête de type SELECT avec une clause WHERE et retourne un objet Utilisateur
        // Pour permettre la première connexion en comparant le nomUtilisateur et le motDePasse
        $bdd = $this->getBdd();
        $getUserByLoginPassword = $bdd->prepare('SELECT * from utilisateurs where nom_utilisateur=?');
        $getUserByLoginPassword->execute(array($login));
        if ($getUserByLoginPassword->rowCount() == 1) {
            $fetchUserByLoginPassword = $getUserByLoginPassword->fetch();
            $user = new Utilisateur($fetchUserByLoginPassword);
            if (password_verify($password, $user->motDePasse())) {
                return $user;
            } else {
                throw new Exception("Mot de passe incorrect");
            }
        } else {
            throw new Exception("Identifiant incorrect");
        }
       
    }
    
    public function getUserList() {
        // Retourne la liste de tous les utilisateurs
        $bdd = $this->getBdd();
        $getUsers = $bdd->query('SELECT id_utilisateur as id, nom_utilisateur as utilisateur from utilisateurs order by id_utilisateur desc');
        return $getUsers;
    }
    
    public function update(Utilisateur $user) {
        // Prépare une requête de type UPDATE
        // Assignation des valeurs à la requête
        // Exécution de la requête
        $bdd = $this->getBdd();
        $update = $bdd->prepare('UPDATE utilisateurs SET nom_utilisateur = :nom_utilisateur, mot_de_passe = :mot_de_passe WHERE id_utilisateur = :id_utilisateur');
        $update->bindValue(':nom_utilisateur', $user->nomUtilisateur());
        $update->bindValue(':mot_de_passe', $user->motDePasse());
        $update->execute();
    }
    
//     public function setBdd(PDO $bdd) {
//         $this->_bdd = $bdd;
//     }

    public function existeDeja($info) {
        if (is_int($info)) // On veut voir si tel utilisateur ayant pour id $info existe
        {
            return (bool) $this->getBdd()->query('SELECT COUNT(*) FROM utilisateurs WHERE id_utilisateur = '.$info)->fetchColumn();
        }
        
        // Sinon c'est qu'on veut vérifier si le nom existe ou pas
        
        $existeDeja = $this->getBdd()->prepare('SELECT COUNT(*) FROM utilisateurs WHERE nom_utilisateur = :nom_utilisateur');
        $existeDeja->execute([':nom_utilisateur' => $info]);
        
        return (bool) $existeDeja->fetchColumn();
    }
}