<?php
require_once 'Controleur/ControleurAccueil.php';
require_once 'Controleur/ControleurPropos.php';
require_once 'Controleur/ControleurRoman.php';
require_once 'Controleur/ControleurPost.php';
require_once 'Controleur/ControleurContact.php';
require_once 'Controleur/ControleurPageConnexion.php';
require_once 'Controleur/ControleurEspaceAdmin.php';
require_once 'Framework/Debug.php';
require_once 'Vue/Vue.php';

class Routeur
{

    private $ctrlAccueil;
    
    private $ctrlPropos;

    private $ctrlRoman;
    
    private $ctrlPost;
    
    private $ctrlAjoutCommentaireBillet;
    
    private $ctrlContact;
    
    private $ctrlPageConnexion;
    
    private $ctrlPageConnexionApresSubmit;
    
    private $ctrlInscription;
    
    private $ctrlConnexion;
    
    private $ctrlEspaceAdmin;
    
    private $ctrlSignalementCommentaire;

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
                    break;
                case 'roman':
                    $this->ctrlRoman = new ControleurRoman();
                    $this->ctrlRoman->roman();
                    break;
                case 'billetRoman':
                    $this->ctrlBillet = new ControleurPost();
                    $this->ctrlBillet->post();
                    break;
                case 'commenter':
                    $this->ctrlAjoutCommentaireBillet = new ControleurPost();
                    $this->ctrlAjoutCommentaireBillet->commenter();
//                     $auteur = $this->getParametre($_POST, 'auteur');
//                     $contenu = $this->getParametre($_POST, 'contenu');
//                     $idBillet = $this->getParametre($_POST, 'id');
//                     $this->ctrlAjoutCommentaireBillet->commenter($auteur, $contenu, $idBillet);
                    break;
                case 'contact':
                    $this->ctrlContact = new ControleurContact();
                    $this->ctrlContact->contact();
                    break;
                case 'pageConnexion':
                    $this->ctrlPageConnexion = new ControleurPageConnexion();
                    $this->ctrlPageConnexion->pageConnexion();
                    break;
//                 case 'pageConnexionApresSubmit':
//                     $this->ctrlPageConnexionApresSubmit = new ControleurPageConnexion();
//                     $this->ctrlPageConnexionApresSubmit->pageConnexionApresSubmit();
//                     break;
                case 'inscription':
                    $this->ctrlInscription = new ControleurPageConnexion();
                    $this->ctrlInscription->inscription();
//                     $this->ctrlInscription = new ControleurEspaceAdmin();
//                     $pseudo = $this->getParametre($_POST, 'pseudo');
//                     $motDePasse = $this->getParametre($_POST, 'motDePasse');
//                     $this->ctrlInscription->inscription($pseudo, $motDePasse);
                    break;
                case 'connexion':
                    $this->ctrlConnexion = new ControleurPageConnexion();
                    $this->ctrlConnexion->connexion();
                    break;
                case 'espaceAdmin':
                    $this->ctrlEspaceAdmin = new ControleurEspaceAdmin();
                    $this->ctrlEspaceAdmin->espaceAdmin();
                    break;
                case 'signalementCommentaire': 
                    $this->ctrlSignalementCommentaire = new ControleurPost();
                    $this->ctrlSignalementCommentaire->signalerCommentaire();
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
        $vue->genererPageErreurs(array(
            'msgErreur' => $msgErreur
        ));
    }
}