<?php

require_once 'Modele/Post.php';
require_once 'Modele/PostManager.php';
require_once 'Modele/Commentaire.php';
require_once 'Modele/CommentaireManager.php';
require_once 'Vue/Vue.php';

class ControleurPageChapitre {
    
    private $postManager;
    
    private $commentaireManager;    
    
    
    public function __construct() {
        $this->postManager = new PostManager();
        $this->commentaireManager = new CommentaireManager();
    }
    
    // Affiche les chapitres du roman
    public function post($msgErreur = '') {
       if (isset($_REQUEST['idPost'])) {
            $idPost = $_REQUEST['idPost'];
            $titrePost = $_REQUEST['titrePost'];
        }
        $post = $this->postManager->getPost($idPost);
        $commentaires = $this->commentaireManager->getCommentaire($idPost);
        $vue = new Vue("PageChapitre", "Chapitre - ".'[#'.$idPost.'] ' . $titrePost);
        $vue->genererPageChapitre(array(
            'post' => $post,
            'commentaires' => $commentaires
        ));
    }
    
    // Permet l'ajout d'un commentaire sous un roman
    public function commenter($msgErreur = '', $msgValide = '') {
        if (isset($_POST['commenter']) && ($_POST['auteurCommentaire']) && ($_POST['contenuCommentaire']) && ($_POST['idPost'])) {
            $com = new Commentaire([
               'auteurCommentaire' => $_POST['auteurCommentaire'],
               'contenuCommentaire' => $_POST['contenuCommentaire'],
               'idPost' => $_POST['idPost']
            ]);
            if (!$com->auteurValide()) {
                $msgErreur = '<p style="color:red">Erreur : Le nom de l\'auteur ne peut être vide</p>';
                $this->post($msgErreur);
                unset($com);
            } else {
                $this->commentaireManager->add($com);
                $this->post($msgErreur);
            }
        }
    }
    
    // Permet de signaler un commentaire
    public function signalerCommentaire() {
        if (isset($_GET['idCommentaire'])) {
            $idCommentaire = $_GET['idCommentaire'];
            $this->commentaireManager->updateSignalementCommentaire($idCommentaire);
        }
        $this->post();
    }
}