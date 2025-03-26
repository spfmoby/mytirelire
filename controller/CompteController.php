<?php

class CompteController {
  private $dao;

  public function __construct() {
    require_once 'model/CompteDAO.php';
    require_once 'model/Compte.php';

    $this->dao = new CompteDAO();
  }

  public function creerCompte() {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $email = $_POST['email'];
      $motdepasse = $_POST['motdepasse'];
      $codePIN = $_POST['codePIN'];

      // Créer un objet Compte avec les données du formulaire
      $compte = new Compte($email, $motdepasse, $codePIN);
      //var_dump($compte);
      // Insérer le compte en base de données
      $compteDao = new CompteDAO();
      $compteDao->insererCompte($compte);

      // Rediriger vers la page d'affichage du solde
      header('Location: index.php?action=listeUtilisateurs');
    }
  }


  public function connexionCompte() {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Vérification de l'email et du mot de passe
    if ($this->verifierCompte($email, $password)) {
      // Si la connexion est valide, stockez les informations de connexion dans une session
      $_SESSION['compte_id'] = $this->dao->getCompteIdByEmail($email);
      header('Location: index.php?action=listeUtilisateurs');
      exit();
    } else {
      // Si la connexion n'est pas valide, afficher un message d'erreur
      echo "Identifiants incorrects.";
      exit();
    }
  }

  public function verifierCompte($email, $password) {
    // Code pour vérifier l'email et le mot de passe dans la base de données
    $compteDao = new CompteDAO();
    return $compteDao->verifierCompte($email, $password);
  }

  public function estConnecte() {
    return isset($_SESSION['compte_id']);
  }

  public function listeUtilisateurs() {
    if ($this->estConnecte()) {
      $compteDAO = new CompteDAO();
        return $compteDAO->listeUtilisateurs($_SESSION['compte_id']);
    } else {
        header('Location: index.php?action=connexion');
        exit();
    }
  }
}
