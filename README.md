# Projet3OC

Projet 3 OpenClassrooms - Créer un Blog pour un écrivain

* 3) Structure Finale du projet MVC.

Le projet reprend l'organisation d'un MVC final. Le tout est codé en POO.

Structure actuelle du code : 

- Une page index.php qui instancie et appelle simplement un routeur situé dans le dossier des Controleur 
- Un routeur qui renvoi vers les bonnes actions correspondantes.
- Selon les actions, différents Controleur sont appelés pour chaque action correspondante. 
- Le Controleur fait appel au Modele pour récupérer l'information, et renvoi le tout dans une Vue globale
- La Vue globale s'occupe de faire afficher les bonnes vues correspondantes et renvoi la page au visiteur.