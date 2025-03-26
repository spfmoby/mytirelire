<?php require_once 'layouts/header.php'; ?>

<h1>Créer un nouveau compte</h1>

<form action="?action=creationCompte" method="post">
 
  <label for="email">Email :</label>
  <input type="email" id="email" name="email"><br><br>

  <label for="motdepasse">Mot de passe :</label>
  <input type="password" id="motdepasse" name="motdepasse"><br><br>

  <label for="codePIN">Code PIN :</label>
  <input type="password" id="codePIN" name="codePIN"><br><br>

  <input type="submit" value="Créer compte">
</form>

<?php require_once 'layouts/footer.php'; ?>