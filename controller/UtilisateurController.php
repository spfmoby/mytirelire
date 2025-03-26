<?php

class UtilisateurController {
  private $dao;

  public function __construct() {
    require_once 'model/UtilisateurDAO.php';
    require_once 'model/Utilisateur.php';

    $this->dao = new UtilisateurDAO();
  }

  public function afficherFormCreerUtilisateur() {
    include('view/creation_utilisateur.php');
  }

  public function creerUtilisateur() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $pseudo = $_POST['pseudo'];
      $picto = $_POST['picto'];
      // Créer un objet Compte avec les données du formulaire
      $utilisateur = new Utilisateur(array(
        'pseudo' => $pseudo,
        'picto' => $picto,
        'solde' => 0
      ));
      // Insérer le compte en base de données
      $utilisateurDao = new UtilisateurDAO();
      $utilisateurDao->insererUtilisateur($utilisateur);

      // Rediriger vers la page d'affichage du solde
      header('Location: index.php?action=listeUtilisateurs');
    }
  }

}
