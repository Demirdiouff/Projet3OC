<?php

require_once 'Modele/Post.php';
require_once 'Modele/PostManager.php';
require_once 'Vue/Vue.php';

class ControleurPageRoman {
    
       private $manager;
    
    public function __construct() {
        $this->manager = new PostManager();
    }
    
    // Affiche la liste de tous les billets du blog
    public function roman() {
        $posts = $this->manager->getPosts();
        $vue = new Vue("PageRoman", "Liste des Romans");
        $vue->genererPageRoman(array('posts' => $posts));
    }
}