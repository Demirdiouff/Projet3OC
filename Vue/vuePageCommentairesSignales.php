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
            <li><a href="index.php?action=espaceAdmin">Accueil</a></li>
            <li><a href="index.php?action=pageAjoutChapitre">Ajouter un chapitre</a></li>
            <li><a href="index.php?action=pageSupprimerRoman">Supprimer un chapitre</a></li><br />
            <li class="active"><a href="index.php?action=pageCommentairesSignales">Commentaires signalés<span class="sr-only">(current)</span></a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Page d'Administration</h1>
          <br/>
          <h2 class="sub-header">Vue globale</h2>
          <br/>
          <h3 class="sub-header">Liste des commentaires signalés</h3>
          <div class="table-responsive">
          <table class="table table-striped">
          <thead>
          <tr>
          <th>Auteur</th>
          <th>Contenu</th>
          <th>Signalé x fois</th>
          </tr>
          </thead>          	  
          <?php foreach ($commentairesSignales as $commentaire): ?>
              <tbody>
                <tr class="couleurLigneTableau">
                <?php // if (isset($tableauCommentaireSignales[$post->id()])) { ?>
                  <td><?= $commentaire->auteurCommentaire() ?></td>
                  <td><?= $commentaire->contenuCommentaire() ?></td>
                  <td><?= $commentaire->signalementCommentaire() ?></td>  
                  <td><a href="index.php?action=supprimerCommentaireSignale&idCommentaire=<?= $commentaire->id() ?>"class="btn btn-danger" onclick="return confirm('Etes-vous sûr de vouloir supprimer ce commentaire ?');"><span class="glyphicon glyphicon-minus-sign"></span> Supprimer</a></td>
                  <td><a href="index.php?action=autoriserCommentaireSignale&idCommentaire=<?= $commentaire->id() ?>"class="btn btn-success" onclick="return confirm('Etes-vous sûr de vouloir autoriser ce commentaire ?');"><span class="glyphicon glyphicon-plus-sign"></span> Autoriser</a></td>
                  <?php // } ?>
                </tr>
              </tbody>
			  <?php endforeach; ?>
            </table>
          </div>
        </div>
      </div>
    </div>