<?php
require_once 'Controleur/ControleurAccueil.php';
require_once 'Controleur/ControleurPropos.php';
require_once 'Controleur/ControleurRoman.php';
require_once 'Controleur/ControleurBillet.php';
require_once 'Controleur/ControleurContact.php';
require_once 'Controleur/ControleurEspaceAdmin.php';
require_once 'Vue/Vue.php';

class Routeur
{

    private $ctrlAccueil;
    
    private $ctrlPropos;

    private $ctrlRoman;
    
    private $ctrlBillet;
    
    private $ctrlAjoutCommentaireBillet;
    
    private $ctrlContact;
    
    private $ctrlEspaceAdmin;

    public function __construct()
    {
        
    }

    // Traite une requête entrante
    public function routerRequete()
    {
        try {
            $action = 'accueil';
            if (isset($_GET['action'])) {
                $action = $_GET['action'];
            }
            switch ($action) {
                case 'accueil':
                    $this->ctrlAccueil = new ControleurAccueil();
                    $this->ctrlAccueil->accueil();
                    break;
                case 'propos':
                    $this->ctrlPropos = new ControleurPropos();
                    $this->ctrlPropos->propos();
                case 'roman':
                    $this->ctrlRoman = new ControleurRoman();
                    $this->ctrlRoman->roman();
                    break;
                case 'billetRoman':
                    $this->ctrlBillet = new ControleurBillet();
                    $idBillet = -1;
                    if (isset($_GET['id'])) {
                        $idBillet = $_GET['id'];
                    }
                    $this->ctrlBillet->billet($idBillet);
                    break;
                case 'commenter':
                    $this->ctrlAjoutCommentaireBillet = new ControleurBillet();
                    $auteur = $this->getParametre($_POST, 'auteur');
                    $contenu = $this->getParametre($_POST, 'contenu');
                    $idBillet = $this->getParametre($_POST, 'id');
                    $this->ctrlAjoutCommentaireBillet->commenter($auteur, $contenu, $idBillet);
                    break;
                case 'contact':
                    $this->ctrlContact = new ControleurContact();
                    $this->ctrlContact->contact();
                    break;
                case 'espaceAdmin':
                    $this->ctrlEspaceAdmin = new ControleurEspaceAdmin();
                    $this->ctrlEspaceAdmin->espaceAdmin();
                    break;
                // faire quelque chose
                default:
                    throw new Exception("Action non valide");
            }
        } catch (Exception $e) {
            $this->erreur($e->getMessage());
        }
    }

    private function getParametre($tableau, $nom)
    {
        if (isset($tableau[$nom])) {
            return $tableau[$nom];
        } else
            throw new Exception("Paramètre '$nom' absent");
    }

    // Affiche une erreur
    private function erreur($msgErreur)
    {
        $vue = new Vue("Erreurs");
        $vue->generer(array(
            'msgErreur' => $msgErreur
        ));
    }
}