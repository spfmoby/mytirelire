<?php

require_once '../layouts/header.php'; ?>
// Afficher la consultation du solde

$compte = $_SESSION['compte'];
$transactions = $_SESSION['transactions'];

?>

<h1>Consultation du solde et des transactions</h1>

<!-- Afficher le solde du compte -->
<p>Solde : <?= $compte->solde ?></p>

<!-- Afficher les 50 dernières transactions par ordre décroissant -->
<h2>Dernières transactions</h2>
<table>
  <tr>
    <th>Date</th>
    <th>Montant</th>
    <th>Type</th>
    <th>Action</th>
  </tr>
  <?php foreach ($transactions as $transaction) { ?>
  <tr>
    <td><?= $transaction->date ?></td>
    <td><?= $transaction->montant ?></td>
    <td><?= $transaction->type ?></td>
    <td><a href="modifier_transaction.php?id=<?= $transaction->id ?>&codePIN=<?= $_SESSION['compte']['codePIN'] ?>">Modifier</a> | <a href="supprimer_transaction.php?id=<?= $transaction->id ?>&codePIN=<?= $_SESSION['compte']['codePIN'] ?>">Supprimer</a></td>
  </tr>
  <?php } ?>
</table>

<h2>Pagination des transactions</h2>
<?php
$page = (int) $_GET['page'] ?? 1;
$transactions = $this->dao->paginationTransactions($compte->id, $page);
$totalPages = ceil(count($transactions[0]) / 50);

if ($totalPages > 1) {
    ?>
    <ul class="pagination">
        <?php
            if ($page > 1) { ?>
                <li><a href="?page=<?= $page - 1 ?>">Précédent</a></li>
            <?php }
            for ($i = 1; $i <= $totalPages; $i++) { ?>
                <li <?= $i == $page ? 'class="active"' : '' ?>>
                    <a href="?page=<?= $i ?>"><?= $i ?></a>
                </li>
            <?php } ?>
        <?php if ($page < $totalPages) { ?>
            <li><a href="?page=<?= $page + 1 ?>">Suivant</a></li>
        <?php } ?>
    </ul>
    <?php
} else {
    echo "Aucune pagination disponible.";
}
?>


<a href="?action=modificationCompte&id=<?= $_SESSION['compte']['id'] ?>">Modifier compte</a>

<?php require_once '../layouts/footer.php'; ?>