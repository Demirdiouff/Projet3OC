<?php

?>
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
				<li><p class="affichageNom">Bienvenue <?= $_SESSION['nomUtilisateur'] ?> - <a
							href="index.php?action=deconnexion">Déconnexion</a></li>
			</ul>
		</div>
	</div>
</nav>
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-3 col-md-2 sidebar">
			<ul class="nav nav-sidebar">
				<li><a href="index.php?action=espaceAdmin">Accueil</a></li>
				<li class="active"><a href="index.php?action=pageAjoutRoman">Ajouter un article<span class="sr-only">(current)</span></a></li>
				<li><a href="index.php?action=pageModifierRoman">Modifier un article</a></li>
				<li><a href="index.php?action=pageSupprimerRoman">Supprimer un article</a></li>
			</ul>
		</div>
		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<h2 class="sub-header">Publier un chapitre</h2>
			<form method="post" action="index.php?action=ajouterRoman">
			<div class="table-responsive">
				<div class="form-group">
					<label for="usr">Auteur :</label> 
					<input type="text" class="form-control" id="usr" name="auteurPost">
				</div>
				<div class="form-group">
					<label for="pwd">Titre du chapitre :</label> 
					<input type="text" class="form-control" id="pwd" name="titrePost">
				</div>
				<div class="form-group">
					<label for="comment">Contenu :</label>
					<textarea name="contenuPost">Next, get a free Tiny Cloud API key!</textarea>
				</div>
				
			</div>
			<a href="index.php?action=ajouterRoman" class="btn btn-success">
			<input type="submit" name="ajouterRoman" value="Publier"><span class="glyphicon glyphicon-plus-sign"></span> Publier</a>
			</form>
<?php
if (!empty($msgErreurAjouterRoman)) {
    echo $msgErreurAjouterRoman;
}
if (!empty($msgValideAjouterRoman)) {
    echo $msgValideAjouterRoman;
}
?>
		</div>
	</div>
</div>