<?php

require_once 'Modele/Modele.php';
require_once 'Modele/Admin.php';
require_once 'Vue/Vue.php';

class ControleurEspaceAdmin {
    
    private $identifiant;
    
    public function __construct() {
        $this->identifiant = new Admin();
    }
    
    public function espaceAdmin() {
        $vue = new Vue("espaceAdmin");
        $vue->generer(array());
    }
    
    public function inscription($pseudo, $motDePasse) {
        if (isset($_POST['inscription']) && ($_POST['pseudo']) && ($_POST['motDePasse'])) {
            $pseudo = $_POST['pseudo'];
            $motDePasse = password_hash($_POST['motDePasse'], PASSWORD_DEFAULT);
            $this->identifiant->ajoutIdentifiant($pseudo, $motDePasse);
        }
        $this->espaceAdmin();
        //header('Location: http://localhost:8888/Projet3OC/index.php');
    }
    
    public function connexion($pseudo, $motDePasse) {
        if (isset($_POST['connexion']) && ($_POST['pseudo']) && $_POST['motDePasse']) {
            $motDePasse = password_verify($_POST['motDePasse'], PASSWORD_DEFAULT);
        $this->identifiant->verifIdentifiant($pseudo);
        }
        $this->espaceAdmin();
    }
}