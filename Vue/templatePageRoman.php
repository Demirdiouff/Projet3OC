<?php

?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="../../favicon.ico">

<title><?= $titre; ?></title>

<!-- Bootstrap core CSS -->
<link href="Contenu/bootstrap-3.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
<link href="Contenu/bootstrap-3.3.7/assets/css/ie10-viewport-bug-workaround.css"
	rel="stylesheet">

<!-- Custom styles for this template -->
<link href="Contenu/stylePageRoman.css" rel="stylesheet">

<!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
<script src="Contenu/bootstrap-3.3.7/assets/js/ie-emulation-modes-warning.js"></script>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

	<div class="container">
		<div class="header clearfix">
			<nav>
				<ul class="nav nav-pills pull-right">
					<li role="presentation"><a href="index.php">Accueil</a></li>
					<li role="presentation"><a href="index.php?action=pagePropos">A Propos</a></li>
					<li role="presentation" class="active"><a href="index.php?action=pageRoman">Roman</a></li>
					<li role="presentation"><a href="index.php?action=pageContact">Contact</a></li>
				</ul>
			</nav>
			<h3 class="text-muted"><a class="titrePage" href="index.php">Un billet pour l'Alaska</a></h3>
		</div>
	</div>
	<!-- /container -->
	
	<?= $contenu; ?>
	
	<hr>
	
      <footer class="footer">
      <?php if (isset($_SESSION['nomUtilisateur'])) {
                echo "<p class='affichageNomSurPageRoman'>Salutations " . $_SESSION['nomUtilisateur'] . "</p>"; ?>
                <p class="affichageNomSurPageRoman"><a href="index.php?action=deconnexion">Déconnexion</a></p>
                <?php if (isset($_SESSION['isAdmin'])) { ?>
                	  <p><a href="index.php?action=espaceAdmin">Espace d'administration</a></p>
                	  <?php } ?>
            <?php } else { ?>
                 <p class="connexion"><a href="index.php?action=pageConnexion">Connexion</a></p>
            <?php } ?>
      </footer> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>


	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>

