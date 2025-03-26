<?php require_once 'layouts/header.php'; ?>

<?php if (isset($listeUtilisateurs)) : ?>
  <h1> Liste des Utilisateurs </h1>
  <?php foreach ($listeUtilisateurs as $utilisateur) : ?>
    <p>Pseudo : <?= $utilisateur->getPseudo() ?>, Solde : <?= $utilisateur->getSolde() ?></p>
  <?php endforeach; ?>
<?php else : ?>
  <p>Aucun utilisateur, veuillez en créer un.</p>
<?php endif; ?>

<a href="index.php?action=creationUtilisateur">Nouvel utilisateur</a>

<?php require_once 'layouts/footer.php'; ?>