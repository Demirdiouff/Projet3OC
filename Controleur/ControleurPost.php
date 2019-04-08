<?php

require_once 'Modele/Post.php';
require_once 'Modele/PostManager.php';
require_once 'Modele/Commentaire.php';
require_once 'Modele/CommentaireManager.php';
require_once 'Vue/Vue.php';

class ControleurPost {
    
    private $postManager;
    
    private $commentaireManager;    
    
    
    public function __construct() {
        $this->postManager = new PostManager();
        $this->commentaireManager = new CommentaireManager();
    }
    
    // Affiche les détails sur un billet
    public function post($msgErreur = '') {
       if (isset($_REQUEST['idPost'])) {
            $idPost = $_REQUEST['idPost'];
            $titrePost = $_REQUEST['titrePost'];
        }
        $post = $this->postManager->getPost($idPost);
        $commentaires = $this->commentaireManager->getCommentaire($idPost);
        $vue = new Vue("Billet", "Roman - ".'[#'.$idPost.'] ' . $titrePost);
        $vue->genererPageBillet(array(
            'post' => $post,
            'commentaires' => $commentaires
        ));
    }
    
    public function commenter($msgErreur = '', $msgValide = '') {
        if (isset($_POST['commenter']) && ($_POST['auteurCommentaire']) && ($_POST['contenuCommentaire']) && ($_POST['idPost'])) {
            $com = new Commentaire([
               'auteurCommentaire' => $_POST['auteurCommentaire'],
               'contenuCommentaire' => $_POST['contenuCommentaire'],
               'idPost' => $_POST['idPost']
            ]);
            if (!$com->auteurValide()) {
                $msgErreur = '<p style="color:red">Erreur : Le nom de l\'auteur est invalide</p>';
                $this->post($msgErreur);
                unset($com);
            } else {
                $this->commentaireManager->add($com);
                $this->post($msgErreur);
            }
        }
        //Sauvegarde du commentaire
        // Sauvegarde du commentaire
//         $this->commentaire->ajouterCommentaire($auteur, $contenu, $idBillet);
//         // Actualisation de l'affichage du billet
//         $this->billet($idBillet);
    }
    
    public function signalerCommentaire() {
        if (isset($_GET['idCommentaire'])) {
            $idCommentaire = $_GET['idCommentaire'];
            $commentaireSignale = $this->commentaireManager->updateSignalementCommentaire($idCommentaire);
            if ($commentaireSignale == true) {
                $msgValide = '<p style="color:green">Le commentaire est bien signalé.</p>';
                $this->commenter($msgValide);
            } else {
                $msgErreur = '<p style="color:red">Erreur sur le signalement du commentaire.</p>';
                $this->commenter($msgErreur);
            }
        }
        $this->post();
    }
}