<?php require_once 'layouts/header.php'; ?>

<?php

// Afficher le formulaire d'ajout de transaction
?>
<h1>Ajout de transaction</h1>
<form action="" method="post">
  <label for="montant">Montant :</label>
  <input type="number" id="montant" name="montant"><br><br>
  <label for="type">Type :</label>
  <input type="number" id="montant" name="montant"><br><br>
  <label for="code_PIN">Code PIN :</label>
  <input type="password" id="code_PIN" name="code_PIN"><br><br>
  <input type="submit" value="Ajouter une transaction de dépôt">
</form>

<?php require_once 'layouts/footer.php'; ?>
