<?php require_once 'layouts/header.php'; ?>


  <form action="index.php?action=creationUtilisateur" method="post">
    Pseudo : <input type="text" name="pseudo"><br><br>
    Photo de profil : <input type="text" name="picto"><br><br>
    <input type="submit" value="Créer un nouvel utilisateur">
  </form>



<?php require_once 'layouts/footer.php'; ?>