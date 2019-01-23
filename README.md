# Projet3OC

Projet 3 OpenClassrooms - Créer un Blog pour un écrivain

* 2) Isolation de l'affichage et séparation contenu PHP - SQL - HTML

Le MVC Simpliste n'est pas organisé à la manière d'un MVC final mais reprend quand même la façon de penser, ainsi qu'une structuration du code semblable.


Structure actuelle du code :

- La page index.php fait simplement appel aux billets, pour effectuer un affichage de la page d'accueil.
- Le billet.php fait office de contrôleur, qui fait le lien entre Modele.php et l'affichage des vues.
- Les vues sont pour l'instant appelés depuis un Contrôleur, et non générés par une classe Vue qui traite l'affichage. 