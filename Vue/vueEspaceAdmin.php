<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">Un billet pour l'Alaska</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><p class="affichageNom">Bienvenue <?= $_SESSION['nomUtilisateur'] ?> - <a href="index.php?action=deconnexion">Déconnexion</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="index.php?action=espaceAdmin">Accueil <span class="sr-only">(current)</span></a></li>
            <li><a href="index.php?action=pageAjoutChapitre">Ajouter un chapitre</a></li>
            <li><a href="index.php?action=pageSupprimerChapitre">Supprimer un chapitre</a></li><br />
            <li><a href="index.php?action=pageCommentairesSignales">Commentaires signalés</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Page d'Administration</h1>
			<br/>
		  <h2 class="sub-header">Vue globale</h2>
		    <br/>
          <h3 class="sub-header">Liste des chapitres publiés</h3>
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>N°Chapitre :</th>
                  <th>Auteur</th>
                  <th>Titre</th>
                  <th>Contenu</th>
                  <th>Commentaires</th>
                </tr>
              </thead>
              <?php foreach ($posts as $post): ?>
              <tbody>
                <tr class="couleurLigneTableau" onclick="document.location='index.php?'">
                  <td><?= $post->id() ?></td>
                  <td><?= $post->auteurPost() ?></td>
                  <td><?= $post->titrePost() ?></td>
                  <td><?= substr($post->contenuPost(), 0, 30) ?>...</td>
                  <td><?php if (isset($tableauNbCommentaire[$post->id()])) {
                        echo $tableauNbCommentaire[$post->id()];
                        } else {
                        echo '0';
                        }?></td>
                  <td><a href="index.php?action=pageModifierRoman&idPost=<?= $post->id()?>" class="btn btn-warning"><span class="glyphicon glyphicon-download-alt"></span> Modifier</a></td>
                </tr>
              </tbody>
			  <?php endforeach; ?>
            </table>
          </div>
        </div>
      </div>
    </div>