<?php if (false) $post = new Post(); ?>
<?php if (false) $commentaires = new Commentaire(); ?>
<div class="container">
	<div class="blog-header">
		<a href="index.php?action=pageRoman">&larr; Revenir à la liste des romans</a>
		<br /><br />
		<h1 class="blog-title"><?= $post->titrePost(); ?></h1>
		<br />
	</div>
	<div class="row">
		<div class="col-sm-8 blog-main">
			<div class="blog-post">
				<p class="blog-post-meta"><?= $post->datePost(); ?> par <a href="index.php?action=pagePropos">Jean Forteroche</a></p>
				<p> <?= $post->contenuPost(); ?></p>
			</div>
			<hr />
			<header><h2 id="titreReponses">Commentaires à '<?= $post->titrePost(); ?>'</h2></header>
		  
		  <?php foreach ($commentaires as $commentaire): ?>
			<p id="txt" style=color:black><strong><?= $commentaire->auteurCommentaire() ?></strong> dit :</p>
			<p id="txtCommentaire"style=font-size:14px><?= $commentaire->contenuCommentaire() ?></p>
			<p style="font-size: 10px;"><a href="index.php?action=signalementCommentaire&idCommentaire=<?= $commentaire->id() ?>&idPost=<?= $post->id()?>&titrePost=<?= $post->titrePost()?>" onclick="return confirm('Etes-vous sûr de vouloir signaler ce commentaire ?');">Signaler</a></p>
			<hr id="hr-foreach">
            
		  <?php endforeach; ?>
		  
		  <?php if (isset($_SESSION['nomUtilisateur'])) {
		      // Affichage du formulaire de commentaire si l'utilisateur est connecté, sinon on affiche un msg par défaut, en l'invitant
		      // a se connecter avant de pouvoir poster un formulaire
		  ?>
		  <hr class="separationCommentaire">

		  <?php echo "Bon retour dans cette aventure, " . "<strong>" . $_SESSION['nomUtilisateur'] . "</strong>" . " vous pouvez commenter ci-dessous si vous le souhaitez."; ?> <br /><br />
		  
			<h3>Postez un commentaire</h3>
			<form method="post" action="index.php?action=commenter">
				<fieldset>
					<label for="nom">Nom <em>*</em></label>
					<input id="nom" name="auteurCommentaire" type="text" placeholder="<?= $_SESSION['nomUtilisateur'] ?>" required>
					<br /> 
				</fieldset>
				<fieldset>
					<br /> 
					<label for="comments">Votre commentaire <em>*</em></label>
					<textarea id="comments" name="contenuCommentaire" placeholder="Super le nouveau chapitre, bien joué !" required></textarea>
				</fieldset>
				<input type="hidden" name="idPost" value="<?= $post->id(); ?>" /> 
				<input type="hidden" name="titrePost" value="<?= $post->titrePost(); ?>" />
				<p><input type="submit" name="commenter" value="Commenter"></p>
			</form>
			<!-- /.blog-post -->
			<!--           <nav> -->
			<!--             <ul class="pager"> -->
			<!--               <li><a href="#">Previous</a></li> -->
			<!--               <li><a href="#">Next</a></li> -->
			<!--             </ul> -->
			<!--           </nav> -->
		</div>
		<!-- /.blog-main -->
	</div>
	<!-- /.row -->
</div>
<!-- /.container -->

<?php } else {
            echo 'Veuillez vous ' . '<a href="index.php?action=afficherPageConnexion">connecter</a>' . ' pour poster un commentaire';
}?> 