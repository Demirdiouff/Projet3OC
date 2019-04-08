<?php if (false) $posts = new Post(); 

?>

<!-- Main jumbotron for a primary marketing message or call to action -->
<div class="jumbotron">
	<div class="container">
		<h1>Bienvenu à toutes et à tous !</h1>
		<p>Je suis ravi que vous fassiez partie de cette nouvelle aventure en ma compagnie... J'espère pouvoir vous faire voyager, autant que moi je voyage lorsque j'écris ces chapitres.</p>
		<p>
			<!-- <a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a> -->
		</p>
	</div>
</div>
<?php
foreach ($posts as $post): ?>
<div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4">
          <h2><?= '[#' . $post->id() . '] ' . $post->titrePost() ?></h2>
          <p class="affichageDate"><?= $post->datePost() ?>
          <p><?= substr($post->contenuPost(), 0, 150)?> ... &#8618;</p>
          <p><a class="btn btn-default" href="<?= "index.php?action=billetRoman&idPost=" . $post->id()?>&titrePost=<?= $post->titrePost()?>" role="button">Lire plus &raquo;</a></p>
        </div>
        <?php endforeach; ?>
      </div>
    </div>