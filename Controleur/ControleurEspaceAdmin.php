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
        if (!isset($_SESSION['nomUtilisateur'])) {
            header("Location: index.php?action=pageConnexion");
        }
        $posts = $this->postManager->getPosts();
        $tableauNbCommentaire = $this->commentaireManager->getTableauNombreCommentaires();
        $vue = new Vue("EspaceAdmin", "Page d'Administration - Accueil");
        $vue->genererPageEspaceAdmin(array(
            'posts' => $posts,
            'tableauNbCommentaire' => $tableauNbCommentaire
        ));
    }
    
    public function pageAjoutRoman($msgErreurAjouterRoman = '', $msgValideAjouterRoman = '') {
        if (!isset($_SESSION['nomUtilisateur'])) {
            header("Location: index.php?action=pageConnexion");
        }
        $vue = new Vue("PageAjoutRoman", "Page d'Administration - Ajouter un Roman");
        $vue->genererPageEspaceAdmin(array('msgErreurAjouterRoman' => $msgErreurAjouterRoman, 'msgValideAjouterRoman' => $msgValideAjouterRoman));
    }
    
    public function ajouterRoman() {
        if (isset($_POST['ajouterRoman']) && ($_POST['auteurPost']) && ($_POST['titrePost']) && ($_POST['contenuPost'])) {
            $post = new Post([
                'auteurPost' => $_POST['auteurPost'],
                'titrePost' => $_POST['titrePost'],
                'contenuPost' => $_POST['contenuPost']
            ]);
            if (!$post->auteurValide()) {
                $msgErreurAjouterRoman = '<p style="color:red">Erreur : Le nom de l\'auteur est invalide</p>';
                $this->pageAjoutRoman($msgErreurAjouterRoman);
            } elseif (!$post->titreValide()) {
                $msgErreurAjouterRoman = '<p style="color:red">Erreur : Le titre du roman est invalide</p>';
                $this->pageAjoutRoman($msgErreurAjouterRoman);
            } elseif (!$post->contenuValide()) {
                $msgErreurAjouterRoman = '<p style="color:red">Erreur : Le contenu du roman est invalide</p>';
                $this->pageAjoutRoman($msgErreurAjouterRoman);
            } else {
                $this->postManager->add($post);
                $msgValideAjouterRoman = '<p style="color:green">Votre roman a bien été posté</p>';
                $this->pageAjoutRoman($msgValideAjouterRoman);
            }
        } else {
            $this->pageAjoutRoman();
        }
    }
    
    public function pageModifierRoman() {
        if (!isset($_SESSION['nomUtilisateur'])) {
            header("Location:index.php?action=pageConnexion");
        }
        $posts = $this->postManager->getPosts();
        $tableauNbCommentaire = $this->commentaireManager->getTableauNombreCommentaires();
        $vue = new Vue("PageModifierRoman", "Page d'Administration - Modifier un Roman");
        $vue->genererPageEspaceAdmin(array(
            'posts' => $posts,
            'tableauNbCommentaire' => $tableauNbCommentaire
        ));
    }
    
    public function modifierRoman() {
        
    }
    
    public function pageSupprimerRoman() {
        if (!isset($_SESSION['nomUtilisateur'])) {
            header("Location:index.php?action=pageConnexion");
        }
        $vue = new Vue("PageSupprimerRoman", "Page d'Administration - Supprimer un Roman");
        $vue->genererPageEspaceAdmin(array());
    }
    
    public function supprimerRoman() {
        
    }
}