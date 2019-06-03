<?php

?>

<body>
	<div class="container">
		<form class="form-signin" method="post" action="index.php?action=connexion">
			<h2 class="form-signin-heading">Utilisez le formulaire ci-dessous pour vous connecter</h2>
			<label for="inputEmail" class="sr-only">Pseudo</label> 
			<input type="text" name="nomUtilisateur" id="inputEmail" class="form-control" placeholder="Pseudo" required> 
				<label for="inputPassword" class="sr-only">Mot de passe</label> 
			<input type="password" name="motDePasse" id="inputPassword" class="form-control" placeholder="Mot de passe" required>
			<div class="checkbox">
			</div>
			<a href="index.php?action=espaceAdmin"><input class="btn btn-lg btn-primary btn-block" type="submit" name="connexion" value="Se connecter" /></a>
			<!-- <a href="landingAdminPage.php" class="btn btn-lg btn-primary btn-block" type="submit">Se connecter</a> -->
			<p class="backlink">
				<a href="index.php">Retour à l'accueil</a>
			</p>
		</form>
	</div>
	
<?php if (!empty($msgErreurConnexion)) {
    echo $msgErreurConnexion;
}
if (!empty($msgValideConnexion)) {
    echo $msgValideConnexion;
}

?>
	
	<br />
	<br />
	
	<div class="container">
		<form class="form-signin" method="post" action="index.php?action=inscription">
			<h4 class="form-signin-heading">Utilisez le formulaire ci-dessous pour vous inscrire</h4>
			<label for="inputEmail" class="sr-only">Pseudo</label> 
			<input type="text" name="nomUtilisateur" id="inputEmail" class="form-control" placeholder="Pseudo" required> 
				<label for="inputPassword" class="sr-only">Mot de passe</label> 
			<input type="password" name="motDePasse" id="inputPassword" class="form-control" placeholder="Mot de passe" required>
			<div class="checkbox">
			</div>
			<input class="btn btn-lg btn-primary btn-block" type="submit" name="inscription" value="S'inscrire" />
			<!-- <a href="landingAdminPage.php" class="btn btn-lg btn-primary btn-block" type="submit">Se connecter</a> -->
			<p class="backlink">
				<a href="index.php">Retour à l'accueil</a>
			</p>
		</form>
	</div>
	<!-- /container -->
	
	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<script src="Contenu/bootstrap-3.3.7/assets/js/ie10-viewport-bug-workaround.js"></script>
</body>

<?php if (!empty($msgErreurInscription)) {
    echo $msgErreurInscription;
}
if (!empty($msgValideInscription)) {
    echo $msgValideInscription;
}

?>