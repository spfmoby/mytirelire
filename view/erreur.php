<?php require_once '../layouts/header.php'; ?>

<h1>Erreur</h1>

<p><?= $_SESSION['message'] ?></p>

<a href="?action=index">Retour à l'accueil</a>

<?php require_once '../layouts/footer.php'; ?>