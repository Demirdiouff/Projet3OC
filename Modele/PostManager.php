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

class PostManager extends Modele {
    
    private $_bdd; // Instance de PDO
    
    public function __construct() {
        
    }
    
    public function add(Post $post) {
        // Connexion à la BDD
        // Prépare une requête de type INSERT
        // Assignation des valeurs à la requête
        // Exécution de la requête
        $bdd = $this->getBdd();
        $add = $bdd->prepare('INSERT INTO posts(id_post, date_post, auteur_post, titre_post, contenu_post) VALUES(null, :date_post, :auteur_post, :titre_post, :contenu_post)');
        $date = date(DATE_W3C); // Récupère la date courante
        $today = date("Y-m-d H:i:s");
        $add->bindValue(':date_post', $today);
        $add->bindValue(':auteur_post', $post->auteurPost());
        $add->bindValue(':titre_post', $post->titrePost());
        $add->bindValue(':contenu_post', $post->contenuPost());
        $add->execute();
    }
    
    public function delete(Post $post) {
        // Exécute une requête de type DELETE
        $bdd = $this->getBdd();
        $bdd->exec('DELETE FROM posts WHERE id_post = ' . $post->id());
    }
    
    public function getPost($idPost) {
        // Exécute une requête de type SELECT avec une clause WHERE, et retourne un objet Post
        $bdd = $this->getBdd();
        $getOnePost = $bdd->prepare('SELECT * from posts where id_post=?');
        $getOnePost->execute(array($idPost));
        if ($getOnePost->rowCount() == 1) {
            $fetchOnePost = $getOnePost->fetch();
            return new Post($fetchOnePost); // Accès à la première ligne de résultat
        } else {
            throw new Exception("Aucun post ne correspond à l'identifiant $idPost");
        }
    }
    
    public function getPosts() {
        // Exécute une requête de type SELECT pour retourner les posts
        $posts = [];
        $bdd = $this->getBdd();
        $getPosts = $bdd->query('SELECT * from posts order by date_post desc');
        while ($post = $getPosts->fetch(PDO::FETCH_ASSOC)) {
            $posts[] = new Post($post);
        }
        return $posts;
    }
    
    public function update(Post $post) {
        // Connexion à la BDD
        // Prépare une requête de type UPDATE
        // Assignation des valeurs à la requête
        // Exécution de la requête
        $bdd = $this->getBdd();
        $update = $bdd->prepare('UPDATE posts SET auteur_post = :auteur_post, titre_post = :titre_post, contenu_post = :contenu_post WHERE id_post = :id_post');
        $update->bindValue(':auteur_post', $post->auteurPost());
        $update->bindValue(':titre_post', $post->titrePost());
        $update->bindValue(':contenu_post', $post->contenuPost());
        $update->bindValue(':id_post', $post->id());
        $update->execute();
    }
    
    public function existeDeja($info) {
        if (is_int($info)) // On veut voir si tel post ayant pour id $info existe
        {
            return (bool) $this->getBdd()->query('SELECT COUNT(*) FROM posts WHERE id_post = ' . $info)->fetchColumn();
        }
        // Sinon c'est qu'on veut vérifier si le titre existe ou pas
        $existeDeja = $this->getBdd()->prepare('SELECT COUNT(*) FROM posts WHERE titre_post = :titre_post');
        $existeDeja->execute([':titre_post' => $info]);
        
        return (bool) $existeDeja->fetchColumn();
    }
}