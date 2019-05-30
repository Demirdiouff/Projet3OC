<?php

class Vue {
    
    // Nom du fichier associé à la vue
    private $fichier;
    // Titre de la vue (défini dans le fichier vue)
    private $titre;
    
    public function __construct($action, $titre = '') {
        // Détermination du nom du fichier vue à partir de l'action
        $this->fichier = "Vue/vue" . $action . ".php";
        $this->titre = $titre;
    }
    
    // Génère et affiche la vue
    public function generer($donnees) {
        // Génération de la partie spécifique de la vue
        $contenu = $this->genererFichier($this->fichier, $donnees);
        // Génération ddu gabarit commun utilisant la partie spécifique
        $vue = $this->genererFichier('Vue/templatePageAccueil.php', array('titre' => $this->titre, 'contenu' => $contenu));
        // Renvoi de la vue au navigateur
        echo $vue;
    }
    
    public function genererPageConnexion($donnees) {
        // Génération de la partie spécifique de la vue, semblable a la fonction generer mais pour un autre template et styleConnexion.css
        $contenu = $this->genererfichier($this->fichier, $donnees);
        // Génération du gabarit commun utilisant la partie spécifique
        $vue = $this->genererfichier('Vue/templatePageConnexion.php', array('titre' => $this->titre, 'contenu' => $contenu));
        // Renvoi de la vue au navigateur
        echo $vue;
    }
    
    public function genererPageEspaceAdmin($donnees) {
        // Génération de la partie spécifique de la vue, semblable a la fonction generer mais pour un autre template et styleConnexion.css
        $contenu = $this->genererfichier($this->fichier, $donnees);
        // Génération du gabarit commun utilisant la partie spécifique
        $vue = $this->genererfichier('Vue/templateEspaceAdmin.php', array('titre' => $this->titre, 'contenu' => $contenu));
        // Renvoi de la vue au navigateur
        echo $vue;
    }
    
    public function genererPagePropos($donnees) {
        // Génération de la partie spécifique de la vue, semblable a la fonction generer mais pour un autre template et stylePropos.css
        $contenu = $this->genererfichier($this->fichier, $donnees);
        // Génération du gabarit commun utilisant la partie spécifique
        $vue = $this->genererfichier('Vue/templatePagePropos.php', array('titre' => $this->titre, 'contenu' => $contenu));
        // Renvoi de la vue au navigateur
        echo $vue;
    }
    
    public function genererPageContact($donnees) {
        // Génération de la partie spécifique de la vue, semblable a la fonction generer mais pour un autre template et styleContact.css
        $contenu = $this->genererfichier($this->fichier, $donnees);
        // Génération du gabarit commun utilisant la partie spécifique
        $vue = $this->genererfichier('Vue/templatePageContact.php', array('titre' => $this->titre, 'contenu' => $contenu));
        // Renvoi de la vue au navigateur
        echo $vue;
    }
    
    public function genererPageRoman($donnees) {
        // Génération de la partie spécifique de la vue, semblable a la fonction generer mais pour un autre template et styleRoman.css
        $contenu = $this->genererfichier($this->fichier, $donnees);
        // Génération du gabarit commun utilisant la partie spécifique
        $vue = $this->genererfichier('Vue/templatePageRoman.php', array('titre' => $this->titre, 'contenu' => $contenu));
        // Renvoi de la vue au navigateur
        echo $vue;
    }
    
    public function genererPageBillet($donnees) {
        // Génération de la partie spécifique de la vue, semblable a la fonction generer mais pour un autre template et styleBillet.css
        $contenu = $this->genererfichier($this->fichier, $donnees);
        // Génération du gabarit commun utilisant la partie spécifique
        $vue = $this->genererfichier('Vue/templatePageChapitre.php', array('titre' => $this->titre, 'contenu' => $contenu));
        // Renvoi de la vue au navigateur
        echo $vue;
    }
    
    public function genererPageErreurs($donnees) {
        // Génération de la partie spécifique de la vue, semblable a la fonction generer mais pour un autre template et styleErreurs.cEs
        $contenu = $this->genererfichier($this->fichier, $donnees);
        // Génération du gabarit commun utilisant la partie spécifique
        $vue = $this->genererfichier('Vue/templatePageErreurs.php', array('titre' => $this->titre, 'contenu' => $contenu));
        // Renvoi de la vue au navigateur
        echo $vue;
    }
    
    // Génère un fichier vue et renvoie le résultat produit
    private function genererfichier($fichier, $donnees) {
        if (file_exists($fichier)) {
            // Rend les éléments du tableau $donnees accessibles dans la vue
            extract($donnees);
            // Démararge de la temporisation de sortie
            ob_start();
            // Inclut le fichier vue
            // Son résultat est placé dans le tampon de sortie
            require $fichier;
            // Arrêt de la temporisation et renvoi du tampon de sortie
            return ob_get_clean();        
        }
        else {
            throw new Exception("Fichier '$fichier' introuvable");
        }
    }
}