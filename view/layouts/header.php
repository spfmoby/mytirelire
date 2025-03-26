<html>
<h1><a href="index.php">MyTirelire</a></h1>
<menu>
    <ul>
        <?php 
        $compteCtrl = new CompteController(); // c'est bizarre de devoir le recréer là, mais il n'est pas passé globalement depuis l'index.
        if($compteCtrl->estConnecte()) {
            echo "<li><a href=\"index.php?action=deconnexion\">Déconnexion</a></li>";
        } ?>
    </ul>
</menu>