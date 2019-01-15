<?php

// Affichage des romans
foreach ($billets as $billet): ?>
	<article>
		<header>
			<a href="<?= "index.php?action=billetRoman&id=" . $billet['id'] ?>">
				<h1 class="titreBillet"><?= $billet ['titre'] ?></h1>
			</a>
			<time><?= $billet['date'] ?></time>
		</header>
		<p><?= $billet['contenu'] ?></p>
	</article>
	<hr />
 <?php endforeach; ?>
 
 
 
