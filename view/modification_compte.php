<?php require_once '../layouts/header.php'; ?>

<h1>Modification de compte</h1>

<form action="?action=consultationSolde" method="post">
  <label for="nom">Nom :</label>
  <input type="text" id="nom" name="nom" value="<?= $_SESSION['compte']['nom'] ?>"><br><br>
  <label for="prenom">Prénom :</label>
  <input type="text" id="prenom" name="prenom" value="<?= $_SESSION['compte']['prenom'] }}"><br><br>
  <label for="adresse">Adresse :</label>
  <input type="text" id="adresse" name="adresse" value="<?= $_SESSION['compte']['adresse'] ?>"><br><br>
  <label for="telephone">Téléphone :</label>
  <input type="text" id="telephone" name="telephone" value="<?= $_SESSION['compte']['telephone'] }}"><br><br>
  <label for="email">Email :</label>
  <input type="email" id="email" name="email" value="<?= $_SESSION['compte']['email'] ?>"><br><br>
  <label for="solde">Solde :</label>
  <input type="number" id="solde" name="solde" value="<?= $_SESSION['compte']['solde'] }}"><br><br>

  <input type="submit" value="Modifier compte">
</form>

<a href="?action=consultationSolde&id=<?= $_SESSION['compte']['id'] ?>">Retour à la consultation de solde</a>

<?php require_once '../layouts/footer.php'; ?>