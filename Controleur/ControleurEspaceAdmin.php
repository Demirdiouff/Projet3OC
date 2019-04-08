<?php

require_once 'Modele/Modele.php';
require_once 'Vue/Vue.php';

class ControleurEspaceAdmin {
    
    private $postManager;
    
    private $commentaireManager;
    
    public function __construct() {
        $this->postManager = new PostManager();
        $this->commentaireManager = new CommentaireManager();
    }
    
    // Affiche la liste de tous les billets du blog
    public function espaceAdmin() {
//         if (isset($_REQUEST['idPost'])) {
//             $idPost = $_REQUEST['idPost'];
//         }
        $posts = $this->postManager->getPosts();
        $tableauNbCommentaire = $this->commentaireManager->getTableauNombreCommentaires();
        $vue = new Vue("EspaceAdmin", "Page d'Administration - Accueil");
        $vue->genererPageEspaceAdmin(array(
            'posts' => $posts,
            'tableauNbCommentaire' => $tableauNbCommentaire
        ));
    }
    
//     public function nbCommentaires() {
//         $this->commentaireManager->nombreCommentaires();
//         $this->espaceAdmin();
//     }
}