<?php
require_once 'Controleur/ControleurAccueil.php';
require_once 'Controleur/ControleurPropos.php';
require_once 'Controleur/ControleurRoman.php';
require_once 'Controleur/ControleurPost.php';
require_once 'Controleur/ControleurContact.php';
require_once 'Controleur/ControleurPageConnexion.php';
require_once 'Controleur/ControleurEspaceAdmin.php';
require_once 'Controleur/Deconnexion.php';
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
    
    private $ctrlAfficherPageConnexion;
    
    private $ctrlEspaceAdmin;
    
    private $ctrlPageAjoutRoman;
    
    private $ctrlAjoutRoman;
    
    private $ctrlPageModifierRoman;
    
    private $ctrlModifierRoman;
    
    private $ctrlPageSupprimerRoman;
    
    private $ctrlSupprimerRoman;
    
    private $ctrlSignalementCommentaire;
    
    private $ctrlDeconnexion;

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
            // faire un deuxieme switch en comprenant les pages admins et où on ne peut y aller sans $_SESSION, dans ce cas, on appelle la pageConnexion
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
                    break;
                case 'contact':
                    $this->ctrlContact = new ControleurContact();
                    $this->ctrlContact->contact();
                    break;
                case 'pageConnexion':
                    $this->ctrlPageConnexion = new ControleurPageConnexion();
                    $this->ctrlPageConnexion->pageConnexion();
                    break;
                case 'inscription':
                    $this->ctrlInscription = new ControleurPageConnexion();
                    $this->ctrlInscription->inscription();
                    break;
                case 'connexion':
                    $this->ctrlConnexion = new ControleurPageConnexion();
                    $this->ctrlConnexion->connexion();
                    break;
                case 'afficherPageConnexion':
                    $this->ctrlAfficherPageConnexion = new ControleurPageConnexion();
                    $this->ctrlAfficherPageConnexion->pageConnexion();
                    break;
                case 'espaceAdmin':
                    $this->ctrlEspaceAdmin = new ControleurEspaceAdmin();
                    $this->ctrlEspaceAdmin->espaceAdmin();
                    break;
                case 'pageAjoutRoman': 
                    $this->ctrlPageAjoutRoman = new ControleurEspaceAdmin();
                    $this->ctrlPageAjoutRoman->pageAjoutRoman();
                    break;
                case 'ajouterRoman':
                    $this->ctrlAjoutRoman = new ControleurEspaceAdmin();
                    $this->ctrlAjoutRoman->ajouterRoman();
                    break;
                case 'pageModifierRoman':
                    $this->ctrlPageModifierRoman = new ControleurEspaceAdmin();
                    $this->ctrlPageModifierRoman->pageModifierRoman();
                    break;
//                 case 'modifierRoman':
//                     $this->ctrlModifierRoman = new ControleurEspaceAdmin();
//                     $this->ctrlModifierRoman->modifierRoman();
//                     break;
                case 'pageSupprimerRoman':
                    $this->ctrlPageSupprimerRoman = new ControleurEspaceAdmin();
                    $this->ctrlPageSupprimerRoman->pageSupprimerRoman();
                    break;
//                 case 'supprimerRoman':
//                     $this->ctrlSupprimerRoman = new ControleurEspaceAdmin();
//                     $this->ctrlSupprimerRoman->supprimerRoman();
//                     break;
                case 'signalementCommentaire': 
                    $this->ctrlSignalementCommentaire = new ControleurPost();
                    $this->ctrlSignalementCommentaire->signalerCommentaire();
                    break;
                case 'deconnexion':
                    $this->ctrlDeconnexion = new Deconnexion();
                    $this->ctrlDeconnexion->deconnexion();
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