<?php

// Afficher le formulaire d'ouverture de compte
?>
<h1>Ouvrir un nouveau compte</h1>
<form action="controller/CompteController.php?action=creerCompte" method="post">
  <label for="nom">Nom :</label>
  <input type="text" id="nom" name="nom"><br><br>
  <label for="prenom">Prénom :</label>
  <input type="text" id="prenom" name="prenom"><br><br>
  <label for="adresse">Adresse :</label>
  <input type="text" id="adresse" name="adresse"><br><br>
  <label for="telephone">Téléphone :</label>
  <input type="tel" id="telephone" name="telephone"><br><br>
  <label for="email">Email :</label>
  <input type="email" id="email" name="email"><br><br>
  <label for="solde_depart">Solde initial :</label>
  <input type="number" id="solde_depart" name="solde_depart"><br><br>
  <label for="code_PIN">Code PIN :</label>
  <input type="password" id="code_PIN" name="code_PIN"><br><br>
  <input type="submit" value="Créer un compte">
</form>