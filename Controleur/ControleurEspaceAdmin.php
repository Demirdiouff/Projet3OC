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
        if (!isset($_SESSION['isAdmin'])) {
            header("Location: index.php?");
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
        if (!isset($_SESSION['isAdmin'])) {
            header("Location: index.php?");
        }
        $vue = new Vue("PageAjoutRoman", "Page d'Administration - Ajouter un Chapitre");
        $vue->genererPageEspaceAdmin(array('msgErreurAjouterRoman' => $msgErreurAjouterRoman, 'msgValideAjouterRoman' => $msgValideAjouterRoman));
    }
    
    public function ajouterRoman() {
        $msgErreurAjouterRoman = '';
        $msgValideAjouterRoman = '';
        if (isset($_POST['ajouterRoman']) && isset($_POST['auteurPost']) && isset($_POST['titrePost']) && isset($_POST['contenuPost'])) {
            $post = new Post([
                'auteurPost' => $_POST['auteurPost'],
                'titrePost' => $_POST['titrePost'],
                'contenuPost' => $_POST['contenuPost']
            ]);
            if (!$post->auteurValide()) {
                $msgErreurAjouterRoman = '<p style="color:red">Erreur : Le nom de l\'auteur ne peut être vide</p>';
                $this->pageAjoutRoman($msgErreurAjouterRoman, '');
            } elseif (!$post->titreValide()) {
                $msgErreurAjouterRoman = '<p style="color:red">Erreur : Le titre du chapitre ne peut être vide</p>';
                $this->pageAjoutRoman($msgErreurAjouterRoman, '');
            } elseif (!$post->contenuValide()) {
                $msgErreurAjouterRoman = '<p style="color:red">Erreur : Le contenu du chapitre ne peut être vide</p>';
                $this->pageAjoutRoman($msgErreurAjouterRoman, '');
            } else {
                $this->postManager->add($post);
                $msgValideAjouterRoman = '<p style="color:green">Votre chapitre a bien été posté</p>';
                $this->pageAjoutRoman('', $msgValideAjouterRoman);
            }
        } else {
            $this->pageAjoutRoman($msgErreurAjouterRoman, $msgValideAjouterRoman);
        }
    }
    
    public function pageModifierRoman($msgErreurModifRoman = '', $msgValideModifRoman = '') {
        if (!isset($_SESSION['isAdmin'])) {
            header("Location:index.php?");
        }
        if (isset($_REQUEST['idPost'])) {
            $idPost = $_REQUEST['idPost'];
            $titrePost = $_REQUEST['titrePost'];
        }
        $post = $this->postManager->getPost($idPost);
        $vue = new Vue("PageModifierRoman", "Modification : " . $titrePost);
        $vue->genererPageEspaceAdmin(array(
            'msgErreurModifRoman' => $msgErreurModifRoman,
            'msgValideModifRoman' => $msgValideModifRoman,
            'post' => $post
        ));
    }
    
    public function modifierRoman() {
        $msgErreurModifRoman = '';
        $msgValideModifPost = '';
        if (isset($_POST['modifierRoman']) && isset($_POST['auteurPost']) && isset($_POST['titrePost']) && isset($_POST['contenuPost']) && ($_GET['idPost'])) {
            $post = new Post([
                'auteurPost' => $_POST['auteurPost'],
                'titrePost' => $_POST['titrePost'],
                'contenuPost' => $_POST['contenuPost'],
                'idPost' => $_GET['idPost']
            ]);
            if (!$post->auteurValide()) {
                echo 'erreur auteur';
                $msgErreurModifRoman = '<p style="color:red">Erreur : Le nom de l\'auteur ne peut être vide</p>';
                $this->espaceAdmin($msgErreurModifRoman, '');
            } elseif (!$post->titreValide()) {
                echo 'erreur titre';
                $msgErreurModifRoman = '<p style="color:red">Erreur : Le titre du chapitre ne peut être vide</p>';
                $this->espaceAdmin($msgErreurModifRoman, '');
            } elseif (!$post->contenuValide()) {
                echo 'erreur contenu';
                $msgErreurModifRoman = '<p style="color:red">Erreur : Le contenu du chapitre ne peut être vide</p>';
                $this->espaceAdmin($msgErreurModifRoman, '');
            } else {
                echo 'ajout réussi';
               $this->postManager->update($post);
               $msgValideModifPost = '<p style="color:green">Votre chapitre a bien été mis à jour</p>';
               $this->espaceAdmin('', $msgValideModifPost);
            }
        } else {
            echo 'rien passé';
            $this->espaceAdmin();
        }
    }
    
    public function pageSupprimerRoman() {
        if (!isset($_SESSION['isAdmin'])) {
            header("Location:index.php?");
        }
        $posts = $this->postManager->getPosts();
        $tableauNbCommentaire = $this->commentaireManager->getTableauNombreCommentaires();
        $vue = new Vue("PageSupprimerRoman", "Page d'Administration - Supprimer un Roman");
        $vue->genererPageEspaceAdmin(array(
            'posts' => $posts,
            'tableauNbCommentaire' => $tableauNbCommentaire
        ));
    }
    
    public function supprimerRoman() {
        if (isset($_REQUEST['idPost'])) {
            $idPost = $_REQUEST['idPost'];
        }
        $post = $this->postManager->getPost($idPost);
        $this->postManager->delete($post);
        $this->pageSupprimerRoman();
    }
    
    public function pageCommentairesSignales() {
        if (!isset($_SESSION['isAdmin'])) {
            header("Location:index.php?");
        }
        $posts = $this->postManager->getPosts();
        $commentaires = $this->commentaireManager->getCommentaires();
        $commentairesSignales = $this->commentaireManager->getTableauCommentairesSignales();
        $vue = new Vue("PageCommentairesSignales", "Page d'Administration - Commentaires Signalés");
        $vue->genererPageEspaceAdmin(array(
            'posts' => $posts,
            'commentaires' => $commentaires,
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
        $com = $this->commentaireManager->getTableauCommentairesSignales();
        $this->commentaireManager->delete($com);
        $this->pageCommentairesSignales();
    }
}