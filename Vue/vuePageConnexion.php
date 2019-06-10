<?php

?>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed"
				data-toggle="collapse" data-target="#navbar" aria-expanded="false"
				aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span> <span
					class="icon-bar"></span> <span class="icon-bar"></span> <span
					class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="index.php">Un billet pour l'Alaska</a>
		</div>
		<div id="navbar" class="navbar-collapse collapse">
			<ul class="nav navbar-nav navbar-right">
				<li><a class="couleurMenu" href="index.php?">Accueil</a></li>
				<li><a class="couleurMenu" href="index.php?action=pagePropos">A Propos</a></li>
				<li><a class="couleurMenu" href="index.php?action=pageRoman">Roman</a></li>
				<li><a class="couleurMenu" href="index.php?action=pageContact">Contact</a></li>
			</ul>
		</div>
	</div>
</nav>
	
	<br /><br />

	<div class="container">
		<form class="form-signin" method="post" action="index.php?action=connexion">
			<h2 class="form-signin-heading">Formulaire de <strong>connexion</strong></h2>
			<label for="inputEmail" class="sr-only">Pseudo</label> 
			<input type="text" name="nomUtilisateur" id="inputEmail" class="form-control" placeholder="Pseudo" required> 
				<label for="inputPassword" class="sr-only">Mot de passe</label> 
			<input type="password" name="motDePasse" id="inputPassword" class="form-control" placeholder="Mot de passe" required>
			<div class="checkbox">
			</div>
			<a href="index.php?action=espaceAdmin"><input class="btn btn-lg btn-primary btn-block" type="submit" name="connexion" value="Connexion" /></a>
			<!-- <a href="landingAdminPage.php" class="btn btn-lg btn-primary btn-block" type="submit">Se connecter</a> -->
		</form>
	</div>
	
<?php if (!empty($msgErreurConnexion)) {
    echo $msgErreurConnexion;
}
if (!empty($msgValideConnexion)) {
    echo $msgValideConnexion;
}

?>
	
	<div class="container">
		<form class="form-signin" method="post" action="index.php?action=inscription">
			<h2 class="form-signin-heading">Formulaire <strong>d'inscription</strong></h2>
			<label for="inputEmail" class="sr-only">Pseudo</label> 
			<input type="text" name="nomUtilisateur" id="inputEmail" class="form-control" placeholder="Pseudo" required> 
				<label for="inputPassword" class="sr-only">Mot de passe</label> 
			<input type="password" name="motDePasse" id="inputPassword" class="form-control" placeholder="Mot de passe" required>
			<div class="checkbox">
			</div>
			<input class="btn btn-lg btn-primary btn-block" type="submit" name="inscription" value="Inscription" />
			<!-- <a href="landingAdminPage.php" class="btn btn-lg btn-primary btn-block" type="submit">Se connecter</a> -->
		</form>
	</div>
	<!-- /container -->
	
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="Contenu/bootstrap-3.3.7/dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="Contenu/bootstrap-3.3.7/docs/assets/js/ie10-viewport-bug-workaround.js"></script>


	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<script src="Contenu/bootstrap-3.3.7/docs/assets/js/ie10-viewport-bug-workaround.js"></script>
</body>

<?php if (!empty($msgErreurInscription)) {
    echo $msgErreurInscription;
}
if (!empty($msgValideInscription)) {
    echo $msgValideInscription;
}

?>