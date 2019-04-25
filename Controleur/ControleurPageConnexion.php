<?php

require_once 'Modele/Modele.php';
require_once 'Modele/Utilisateur.php';
require_once 'Modele/UtilisateurManager.php';
require_once 'Vue/Vue.php';

class ControleurPageConnexion {
    
    private $manager;
    
    private $postManager;
    
    private $commentaireManager;

    public function __construct() {
        $this->manager = new UtilisateurManager();
    }
    
    public function pageConnexion($msgErreurInscription = '', $msgValideInscription = '', $msgErreurConnexion = '', $msgValideConnexion = '') {
        if (isset($_SESSION['nomUtilisateur'])) {
            header("Location: index.php?action=espaceAdmin");
        }
        $vue = new Vue("connexion", "Espace d'administration");
        $vue->genererPageConnexion(array('msgErreurInscription' => $msgErreurInscription, 'msgValideInscription' => $msgValideInscription, 'msgErreurConnexion' => $msgErreurConnexion, 'msgValideConnexion' => $msgValideConnexion));
        
    }
    
    public function inscription() {
        if (isset($_POST['inscription']) && ($_POST['nomUtilisateur']) && ($_POST['motDePasse'])) {
            $user = new Utilisateur([
                'nomUtilisateur' => $_POST['nomUtilisateur'],
                'motDePasse' => password_hash($_POST['motDePasse'], PASSWORD_DEFAULT)
                ]);
            if (!$user->nomValide()) {
                $msgErreurInscription = '<p style="color:red;text-align:center;">Erreur : Le nom d\'utilisateur choisi est invalide.</p>';
                $this->pageConnexion($msgErreurInscription);
                unset($user);
            } elseif ($this->manager->existeDeja($user->nomUtilisateur())) {
                $msgErreurInscription = '<p style="color:red;text-align:center;">Erreur : Le nom d\'utilisateur est déjà pris.</p>';
                $this->pageConnexion($msgErreurInscription);
                unset($user);
            } else {
                $this->manager->add($user);
                $msgValideInscription = '<p style="color:green;text-align:center;">Inscription réussie. Vous pouvez à présent vous connecter.</p>';
                $this->pageConnexion('', $msgValideInscription);
                unset($user);
            }
        }
    }

    public function connexion() {
        if (isset($_POST['connexion']) && ($_POST['nomUtilisateur']) && ($_POST['motDePasse'])) {
            $user = $this->manager->getUserByLoginPassword($_POST['nomUtilisateur'], $_POST['motDePasse']);
//             $user = new Utilisateur([
//                 'nomUtilisateur' => $_POST['nomUtilisateur'],
//                 'motDePasse' => $_POST['motDePasse']
//             ]);
            $_SESSION['idUtilisateur'] = $user->id();
            $_SESSION['nomUtilisateur'] = $user->nomUtilisateur();
            header("Location: index.php?action=espaceAdmin");
        } else {
            $msgErreurConnexion = '<p style="color:red">Impossible de se connecter, mot de passe ou identifiant incorrect.</p>';
            $this->pageConnexion($msgErreurConnexion);
        }
    }
}