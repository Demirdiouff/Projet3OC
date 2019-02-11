<?php $titre = "Mon Blog - " . $billet['titre']; ?>

<article>
  <header>
    <h1 class="titreBillet"><?= $billet['titre'] ?></h1>
    <time><?= $billet['date'] ?></time>
  </header>
  <p><?= $billet['contenu'] ?></p>
</article>
<hr />
<header>
  <h1 id="titreReponses">Réponses à <?= $billet['titre'] ?></h1>
</header>
<?php foreach ($commentaires as $commentaire): ?>
  <p id="txt"><?= $commentaire['auteur'] ?> dit :</p>
  <p id="txtCommentaire"><?= $commentaire['contenu'] ?></p>
  <hr id="hr-foreach">
<?php endforeach; ?>
<form method="post" action="index.php?action=commenter">
	<input id="txt" name="auteur" type="text" placeholder="Votre pseudo" required /><br />
	<textarea id="txtCommentaire" name="contenu" rows="4" placeholder="Votre commentaire" required /></textarea><br />
	<input type="hidden" name="id" value="<?= $billet['id'] ?>" />
	<input id="bouton-default" type="submit" value="Commenter" />
</form>