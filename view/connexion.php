<?php

// Afficher le formulaire de connexion
?>
<h1>Connexion à votre compte</h1>
<form action="index.php?action=connexion" method="post">
  <label for="email">Adresse e-mail :</label>
  <input type="text" id="email" name="email"><br><br>
  <label for="password">Mot de passe :</label>
  <input type="password" id="password" name="password"><br><br>
  <input type="submit" value="Se connecter">
</form>