<?php
require_once 'Controleur/ControleurPageAccueil.php';
require_once 'Controleur/ControleurPagePropos.php';
require_once 'Controleur/ControleurPageRoman.php';
require_once 'Controleur/ControleurPageChapitre.php';
require_once 'Controleur/ControleurPageContact.php';
require_once 'Controleur/ControleurPageConnexion.php';
require_once 'Controleur/ControleurEspaceAdmin.php';
require_once 'Controleur/Deconnexion.php';
require_once 'Framework/Debug.php';
require_once 'Vue/Vue.php';

class Routeur
{

    private $ctrlPageAccueil;
    
    private $ctrlPagePropos;

    private $ctrlPageRoman;
    
    private $ctrlPageChapitre;
    
    private $ctrlAjoutCommentaireBillet;
    
    private $ctrlPageContact;
    
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
    
    private $ctrlPageCommentairesSignales;
    
    private $ctrlAutoriserCommentaireSignale;
    
    private $ctrlSupprimerCommentaireSignale;
    
    private $ctrlDeconnexion;

    public function __construct()
    {
        
    }

    // Traite une requête entrante
    public function routerRequete()
    {
        try {
            $action = 'pageAccueil';
            if (isset($_GET['action'])) {
                $action = $_GET['action'];
            }
            // faire un deuxieme switch en comprenant les pages admins et où on ne peut y aller sans $_SESSION, dans ce cas, on appelle la pageConnexion
            switch ($action) {
                case 'pageAccueil':
                    $this->ctrlPageAccueil = new ControleurPageAccueil();
                    $this->ctrlPageAccueil->accueil();
                    break;
                case 'pagePropos':
                    $this->ctrlPagePropos = new ControleurPagePropos();
                    $this->ctrlPagePropos->propos();
                    break;
                case 'pageRoman':
                    $this->ctrlPageRoman = new ControleurPageRoman();
                    $this->ctrlPageRoman->roman();
                    break;
                case 'pageChapitre':
                    $this->ctrlPageChapitre = new ControleurPageChapitre();
                    $this->ctrlPageChapitre->post();
                    break;
                case 'commenter':
                    $this->ctrlAjoutCommentaireBillet = new ControleurPageChapitre();
                    $this->ctrlAjoutCommentaireBillet->commenter();
                    break;
                case 'pageContact':
                    $this->ctrlPageContact = new ControleurPageContact();
                    $this->ctrlPageContact->contact();
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
                case 'PageConnexion':
                    $this->ctrlPageConnexion = new ControleurPageConnexion();
                    $this->ctrlPageConnexion->pageConnexion();
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
                case 'modifierRoman':
                    $this->ctrlModifierRoman = new ControleurEspaceAdmin();
                    $this->ctrlModifierRoman->modifierRoman();
                    break;
                case 'pageSupprimerRoman':
                    $this->ctrlPageSupprimerRoman = new ControleurEspaceAdmin();
                    $this->ctrlPageSupprimerRoman->pageSupprimerRoman();
                    break;
                case 'supprimerRoman':
                    $this->ctrlSupprimerRoman = new ControleurEspaceAdmin();
                    $this->ctrlSupprimerRoman->supprimerRoman();
                    break;
                case 'signalementCommentaire': 
                    $this->ctrlSignalementCommentaire = new ControleurPageChapitre();
                    $this->ctrlSignalementCommentaire->signalerCommentaire();
                    break;
                case 'pageCommentairesSignales':
                    $this->ctrlPageCommentairesSignales = new ControleurEspaceAdmin();
                    $this->ctrlPageCommentairesSignales->pageCommentairesSignales();
                    break;
                case 'autoriserCommentaireSignale':
                    $this->ctrlAutoriserCommentaireSignale = new ControleurEspaceAdmin();
                    $this->ctrlAutoriserCommentaireSignale->autoriserCommentaireSignale();
                    break;
                case 'supprimerCommentaireSignale':
                    $this->ctrlSupprimerCommentaireSignale = new ControleurEspaceAdmin();
                    $this->ctrlSupprimerCommentaireSignale->supprimerCommentaireSignale();
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

// Plus fonctionnel a ce stade du framework car Routeur modifié 
// et ne nécessite plus de paramètres pour fonctionner
//     private function getParametre($tableau, $nom)
//     {
//         if (isset($tableau[$nom])) {
//             return $tableau[$nom];
//         } else
//             throw new Exception("Paramètre '$nom' absent");
//     }

    // Affiche une erreur
    private function erreur($msgErreur)
    {
        $vue = new Vue("PageErreurs");
        $vue->genererPageErreurs(array(
            'msgErreur' => $msgErreur
        ));
    }
}