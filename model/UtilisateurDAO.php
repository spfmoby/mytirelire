<?php

class UtilisateurDAO {
  private $conn;

  public function __construct() {
    global $conn;
    $this->conn = $conn;
  }

  public function insererUtilisateur($utilisateur) {

    $compte_id = $_SESSION['compte_id'];

    $stmt = $this->conn->prepare("INSERT INTO utilisateurs (pseudo, picto, compte_id)
            VALUES (:pseudo, :picto, :compte_id)");
    $stmt->bindParam(':pseudo', $utilisateur->getPseudo());
    $stmt->bindParam(':picto', $utilisateur->getPicto());
    $stmt->bindParam(':compte_id', $compte_id);
    return $stmt->execute();
  }

}