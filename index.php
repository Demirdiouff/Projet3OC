<?php

// Accès aux données
require 'Controleur/Routeur.php';

session_start();

$routeur = new Routeur();
$routeur->routerRequete();