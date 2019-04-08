<?php

require_once 'Modele/Modele.php';
require_once 'Modele/Utilisateur.php';
require_once 'Modele/UtilisateurManager.php';
require_once 'Vue/Vue.php';

class ControleurPageConnexion {
    
    private $manager;
    
    public function __construct() {
        $this->manager = new UtilisateurManager();
    }
    
    public function pageConnexion($msgErreurInscription = '', $msgValideInscription = '', $msgErreurConnexion = '', $msgValideConnexion = '') {
        $vue = new Vue("connexion", "Espace d'administration");
        $vue->genererPageConnexion(array('msgErreurInscription' => $msgErreurInscription, 'msgValideInscription' => $msgValideInscription, 'msgErreurConnexion' => $msgValideConnexion));
    }
    
//     public function pageConnexionApresSubmit($msgErreur = '', $msgValide ='') {
//         $vue = new Vue("connexionReussie", "Espace d'administration");
//         $vue->genererPageConnexionApresSubmit(array('msgErreur' => $msgErreur, 'msgValide' => $msgValide));
//         Debug::printPile();
//     }
    
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
                $this->pageConnexion($msgValideInscription);
                unset($user);
            }
        }
//         $this->pageConnexionApresSubmit();
//         if (isset($_POST['inscription']) && ($_POST['pseudo']) && ($_POST['motDePasse'])) {
//             $pseudo = $_POST['pseudo'];
//             $motDePasse = password_hash($_POST['motDePasse'], PASSWORD_DEFAULT);
//             $this->identifiant->ajoutIdentifiant($pseudo, $motDePasse);
//         }
//         $this->espaceAdmin();
    }

    public function connexion() {
        if (isset($_POST['connexion']) && ($_POST['nomUtilisateur']) && ($_POST['motDePasse'])) {
            $user = $this->manager->getUserByLoginPassword($_POST['nomUtilisateur'], $_POST['motDePasse']);
            $msgValideConnexion = '<p style="color:black">Connexion réussie. Bienvenue !</p>';
            // Session.......
            $this->pageConnexion($msgValideConnexion);
            unset($user);
        } else {
            $msgErreurConnexion = '<p style="color:red">Impossible de se connecter, mot de passe ou identifiant incorrect.</p>';
            $this->pageConnexion($msgErreurConnexion);
            unset($user);
        }
    }
    
    
//     public function connexion($pseudo, $motDePasse) {
//         if (isset($_POST['connexion']) && ($_POST['pseudo']) && $_POST['motDePasse']) {
//             $motDePasse = password_verify($_POST['motDePasse'], PASSWORD_DEFAULT);
//         $this->identifiant->verifIdentifiant($pseudo);
//         }
//         $this->espaceAdmin();
//     }
}