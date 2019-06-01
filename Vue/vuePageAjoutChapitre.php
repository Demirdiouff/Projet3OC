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
				<li class="active"><a href="index.php?action=pageAjoutChapitre">Ajouter un chapitre<span class="sr-only">(current)</span></a></li>
				<li><a href="index.php?action=pageSupprimerChapitre">Supprimer un chapitre</a></li><br />
				<li><a href="index.php?action=pageCommentairesSignales">Commentaires signalés</a></li>
			</ul>
		</div>
		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<h2 class="sub-header">Publier un chapitre</h2>
			<form method="post" action="index.php?action=ajouterChapitre">
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
			<a href="index.php?action=ajouterChapitre" class="btn btn-success">
			<input type="submit" name="ajouterChapitre" value="Publier"><span class="glyphicon glyphicon-plus-sign"></span></a>
			</form>
<?php
if (!empty($msgErreurAjouterChapitre)) {
    echo $msgErreurAjouterChapitre;
}
if (!empty($msgValideAjouterChapitre)) {
    echo $msgValideAjouterChapitre;
}
?>
		</div>
	</div>
</div>