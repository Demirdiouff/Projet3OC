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
    public function espaceAdmin($msgValideModifChapitre = '') {
        if (!isset($_SESSION['isAdmin'])) {
            header("Location: index.php?");
            exit();
        }
        $posts = $this->postManager->getPosts();
        $tableauNbCommentaire = $this->commentaireManager->getTableauNombreCommentaires();
        $vue = new Vue("EspaceAdmin", "Page d'Administration - Accueil");
        $vue->genererPageEspaceAdmin(array(
            'msgValideModifChapitre' => $msgValideModifChapitre,
            'posts' => $posts,
            'tableauNbCommentaire' => $tableauNbCommentaire
        ));
    }
    
    public function pageAjoutChapitre($msgErreurAjouterChapitre = '', $msgValideAjouterChapitre = '') {
        if (!isset($_SESSION['isAdmin'])) {
            header("Location: index.php?");
            exit();
        }
        $vue = new Vue("PageAjoutChapitre", "Page d'Administration - Ajouter un Chapitre");
        $vue->genererPageEspaceAdmin(array('msgErreurAjouterChapitre' => $msgErreurAjouterChapitre, 'msgValideAjouterChapitre' => $msgValideAjouterChapitre));
    }
    
    public function ajouterChapitre() {
        $msgErreurAjouterChapitre = '';
        $msgValideAjouterChapitre = '';
        if (isset($_POST['ajouterChapitre']) && isset($_POST['auteurPost']) && isset($_POST['titrePost']) && isset($_POST['contenuPost'])) {
            $post = new Post([
                'auteurPost' => $_POST['auteurPost'],
                'titrePost' => $_POST['titrePost'],
                'contenuPost' => $_POST['contenuPost']
            ]);
            if (!$post->auteurValide()) {
                $msgErreurAjouterChapitre = '<p style="color:red">Erreur : Le nom de l\'auteur ne peut être vide</p>';
                $this->pageAjoutChapitre($msgErreurAjouterChapitre, '');
            } elseif (!$post->titreValide()) {
                $msgErreurAjouterChapitre = '<p style="color:red">Erreur : Le titre du chapitre ne peut être vide</p>';
                $this->pageAjoutChapitre($msgErreurAjouterChapitre, '');
            } elseif (!$post->contenuValide()) {
                $msgErreurAjouterChapitre = '<p style="color:red">Erreur : Le contenu du chapitre ne peut être vide</p>';
                $this->pageAjoutChapitre($msgErreurAjouterChapitre, '');
            } else {
                $this->postManager->add($post);
                $msgValideAjouterChapitre = '<p style="color:green">Votre chapitre a bien été posté</p>';
                $this->pageAjoutChapitre('', $msgValideAjouterChapitre);
            }
        } else {
            $this->pageAjoutChapitre($msgErreurAjouterChapitre, $msgValideAjouterChapitre);
        }
    }
    
    public function pageModifierChapitre($msgErreurModifChapitre = '') {
        if (!isset($_SESSION['isAdmin'])) {
            header("Location:index.php?");
            exit();
        }
        if (isset($_REQUEST['idPost'])) {
            $idPost = $_REQUEST['idPost'];
        }
        $post = $this->postManager->getPost($idPost);
        $vue = new Vue("PageModifierChapitre", "Modification : ");
        $vue->genererPageEspaceAdmin(array(
            'msgErreurModifChapitre' => $msgErreurModifChapitre,
            'post' => $post
        ));
    }
    
    public function modifierChapitre() {
        $msgErreurModifChapitre = '';
        $msgValideModifChapitre = '';
        if (isset($_POST['modifierChapitre'], $_POST['auteurPost'], $_POST['titrePost'], $_POST['contenuPost'], $_GET['idPost'])){
            $post = new Post([
                'auteurPost' => $_POST['auteurPost'],
                'titrePost' => $_POST['titrePost'],
                'contenuPost' => $_POST['contenuPost'],
                'idPost' => $_GET['idPost']
            ]);
            if (!$post->auteurValide()) {
                $msgErreurModifChapitre = '<p style="color:red">Erreur : Le nom de l\'auteur ne peut être vide</p>';
                $this->pageModifierChapitre($msgErreurModifChapitre);
            } elseif (!$post->titreValide()) {
                $msgErreurModifChapitre = '<p style="color:red">Erreur : Le titre du chapitre ne peut être vide</p>';
                $this->pageModifierChapitre($msgErreurModifChapitre);
            } elseif (!$post->contenuValide()) {
                $msgErreurModifChapitre = '<p style="color:red">Erreur : Le contenu du chapitre ne peut être vide</p>';
                $this->pageModifierChapitre($msgErreurModifChapitre);
            } else {
               $this->postManager->update($post);
               $msgValideModifChapitre = '<p style="color:green">Votre chapitre a bien été mis à jour</p>';
               $this->espaceAdmin($msgValideModifChapitre);
            }
        } else {
            $this->espaceAdmin();
        }
    }
    
    public function pageSupprimerChapitre() {
        if (!isset($_SESSION['isAdmin'])) {
            header("Location:index.php?");
            exit();
        }
        $posts = $this->postManager->getPosts();
        $tableauNbCommentaire = $this->commentaireManager->getTableauNombreCommentaires();
        $vue = new Vue("PageSupprimerChapitre", "Page d'Administration - Supprimer un Chapitre");
        $vue->genererPageEspaceAdmin(array(
            'posts' => $posts,
            'tableauNbCommentaire' => $tableauNbCommentaire
        ));
    }
    
    public function supprimerChapitre() {
        if (isset($_REQUEST['idPost'])) {
            $idPost = $_REQUEST['idPost'];
        }
        $post = $this->postManager->getPost($idPost);
        $this->postManager->delete($post);
        $this->pageSupprimerChapitre();
    }
    
    public function pageCommentairesSignales() {
        if (!isset($_SESSION['isAdmin'])) {
            header("Location:index.php?");
            exit();
        }
        $posts = $this->postManager->getPosts();
        $commentairesSignales = $this->commentaireManager->getTableauCommentairesSignales();
        $vue = new Vue("PageCommentairesSignales", "Page d'Administration - Commentaires Signalés");
        $vue->genererPageEspaceAdmin(array(
            'posts' => $posts,
            'commentairesSignales' => $commentairesSignales
        ));
    }
    
    public function autoriserCommentaireSignale() {
        if (isset($_REQUEST['idCommentaire'])) {
            $idCommentaire = $_REQUEST['idCommentaire'];
        }
        $this->commentaireManager->getTableauCommentairesSignales();
        $this->commentaireManager->reinitialiserSignalementCommentaire($idCommentaire);
        $this->pageCommentairesSignales();
    }
    
    public function supprimerCommentaireSignale() {
        $com = new Commentaire([
            'idCommentaire' => $_GET['idCommentaire']    
        ]);
        $this->commentaireManager->getTableauCommentairesSignales();
        $supprimeCommentaireSignale = $this->commentaireManager->delete($com);
        if ($supprimeCommentaireSignale == true) {
            header('Location: index.php?action=pageCommentairesSignales');
            exit();
        }
        $this->pageCommentairesSignales();
    }
}