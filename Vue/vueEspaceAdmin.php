<?php
 
?>

<p>Connectez vous à votre espace administrateur pour avoir plus de fonctionnalités</p>


<br />


<h1>Connexion</h1><br />
<form method="post" action="index.php?action=connexion">
	<input type="text" id="txt" name="pseudo" placeholder="Pseudo" required/>
	<input type="password" id="txt" name="motDePasse" placeholder="Mot de passe" required/>
	<input id="bouton-default" type="submit" name="connexion" value="Se connecter" />
</form>

<br />
<br />
<p>Ou inscrivez-vous plus bas</p>

<h2>Inscription</h2><br />
<form method="post" action="index.php?action=inscription">
	<input type="text" id="txt" name="pseudo" placeholder="Pseudo" required/>
	<input type="password" id="txt" name="motDePasse" placeholder="Mot de passe" required/>
	<input id="bouton-default" type="submit" name="inscription" value="S'inscrire" />
</form>