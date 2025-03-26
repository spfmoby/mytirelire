<?php

// ...

$transaction = $_SESSION['transaction'];
$compte = $_SESSION['compte'];

?>

<h1>Modifier une transaction</h1>

<!-- Afficher les informations de la transaction -->
<p>ID : <?= $transaction->id ?></p>
<p>Date : <?= $transaction->date ?></p>
<p>Montant : <?= $transaction->montant ?></p>
<p>Type : <?= $transaction->type ?></p>

<!-- Formulaire pour modifier la transaction -->
<form action="controller/CompteController.php?action=modifier_transaction&id=<?= $_GET['id'] ?>&codePIN=<?= $_SESSION['compte']['codePIN'] ?>" method="post">
  <label for="date">Date :</label>
  <input type="date" id="date" name="date"><br><br>
  <label for="montant">Montant :</label>
  <input type="number" id="montant" name="montant"><br><br>
  <label for="type">Type :</label>
  <select id="type" name="type">
    <!-- ... -->
  </select>
  <input type="submit" value="Modifier la transaction">
</form>

<?php

// ...

?>