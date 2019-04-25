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
				<li><a href="index.php?action=pageAjoutRoman">Ajouter un article</a></li>
				<li class="active"><a href="index.php?action=pageModifierRoman">Modifier un article <span class="sr-only">(current)</span></a></li>
				<li><a href="index.php?action=pageSupprimerRoman">Supprimer un article</a></li>
			</ul>
		</div>
		<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
			<h2 class="sub-header">Modifier un chapitre</h2>
			<div class="table-responsive">
				<div class="form-group">
					<label for="usr">Auteur :</label> <input type="text"
						class="form-control" id="usr">
				</div>
				<div class="form-group">
					<label for="pwd">Titre du chapitre :</label> <input type="password"
						class="form-control" id="pwd">
				</div>
				<div class="form-group">
					<label for="comment">Contenu :</label>
					<textarea rows="" cols=""></textarea>
					<!-- <textarea>Next, get a free Tiny Cloud API key!</textarea> -->
				</div>
			</div>
			<a href="#" class="btn btn-warning"><span class="glyphicon glyphicon-download-alt"></span> Modifier</a>
		</div>
	</div>
</div>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
	<br>
	<h2 class="sub-header">Liste des articles publiés</h2>
	<div class="table-responsive">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>N°Billet :</th>
					<th>Auteur</th>
					<th>Titre</th>
					<th>Contenu</th>
					<th>Commentaires</th>
				</tr>
			</thead>
            <?php foreach ($posts as $post): ?>
            <tbody>
				<tr class="couleurLigneTableau"
					onclick="document.location='index.php?'">
					<td><?= $post->id() ?></td>
					<td>J. Forteroche</td>
					<td><?= $post->titrePost() ?></td>
					<td><?= substr($post->contenuPost(), 0, 30) ?>...</td>
					<td><?php if (isset($tableauNbCommentaire[$post->id()])) {
                                echo $tableauNbCommentaire[$post->id()];
                              } else {
                                echo '0';
                              } ?>
                    </td>
				</tr>
			</tbody>
			<?php endforeach; ?>
        </table>
	</div>
</div>