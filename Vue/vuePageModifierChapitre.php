<?php

if (false) $post = new Post(); 

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
				<li><p class="affichageNom">Bienvenue <?= $_SESSION['nomUtilisateur'] ?> - <a href="index.php?action=deconnexion">Déconnexion</a></li>
				<li><a href="index.php?action=espaceAdmin">Accueil</a></li>
            	<li><a href="index.php?action=pageAjoutChapitre">Ajouter un chapitre</a></li>
            	<li><a href="index.php?action=pageSupprimerChapitre">Supprimer un chapitre</a></li>
            	<li><a href="index.php?action=pageCommentairesSignales">Commentaires signalés</a></li>
			</ul>
		</div>
	</div>
</nav>
<div class="container-fluid">
	<div class="row">
		<div class="col-sm-3 col-md-2 sidebar">
			<ul class="nav nav-sidebar">
				<li><a href="index.php?action=espaceAdmin">Accueil</a></li>
				<li><a href="index.php?action=pageAjoutChapitre">Ajouter un chapitre</a></li>
				<li class="active"><a href="#">Modifier un chapitre<span class="sr-only">(current)</span></a></li>
				<li><a href="index.php?action=pageSupprimerChapitre">Supprimer un chapitre</a></li><br />
				<li><a href="index.php?action=pageCommentairesSignales">Commentaires signalés</a></li>
			</ul>
		</div>
		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<h2 class="sub-header">Modification "<strong><?= $post->titrePost() ?></strong>"</h2>
			<form method="post" action="index.php?action=modifierChapitre&idPost=<?= $post->id() ?>">
			<div class="table-responsive">
				<div class="form-group">
					<label for="usr">Auteur :</label> 
					<input type="text" class="form-control" id="usr" name="auteurPost" value="<?= htmlspecialchars($post->auteurPost()) ?>">
				</div>
				<div class="form-group">
					<label for="pwd">Titre du chapitre :</label> 
					<input type="text" class="form-control" id="pwd" name="titrePost" value="<?= htmlspecialchars($post->titrePost()) ?>">
				</div>
				<div class="form-group">
					<label for="comment">Contenu :</label>
					<textarea name="contenuPost"><?= htmlspecialchars($post->contenuPost()) ?></textarea>
					<!-- <textarea>Next, get a free Tiny Cloud API key!</textarea> -->
				</div>
			</div>
			<a href="index.php?action=modifierChapitre&idPost=<?= $post->id() ?>" class="btn btn-warning">
			<input class="inputModif" type="submit" name="modifierChapitre" value="Modifier"><span class="glyphicon glyphicon-download-alt"></span></a>
			</form>
<?php
if (!empty($msgErreurModifChapitre)) {
echo $msgErreurModifChapitre;
} ?>
		</div>
	</div>
</div>