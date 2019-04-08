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
            <li><a href="index.php">Déconnexion</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="landingAdminPage.php">Accueil <span class="sr-only">(current)</span></a></li>
            <li><a href="formAddPost.php">Ajouter un article</a></li>
            <li><a href="formModifyPost.php">Modifier un article</a></li>
            <li><a href="formDeletePost.php">Supprimer un article</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Page d'Administration</h1>
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
                <tr>
                  <td><?= $post['id'] ?></td>
                  <td>J. Forteroche</td>
                  <td><?= $post['titre'] ?></td>
                  <td><?= substr($post['contenu'], 0, 30) ?>...</td>
                  <td><?php if (isset($tableauNbCommentaire[$post['id']])) {
                        echo $tableauNbCommentaire[$post['id']];
                        } else {
                        echo '0';
                        }?></td>
                </tr>
              </tbody>
			  <?php endforeach; ?>
            </table>
          </div>
        </div>
      </div>
    </div>