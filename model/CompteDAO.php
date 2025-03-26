<?php

class CompteDAO {
  private $conn;

  public function __construct() {
    global $conn;
    $this->conn = $conn;
  }

  public function insererCompte($compte) {

    $stmt = $this->conn->prepare("INSERT INTO comptes (email, motdepasse, codePIN)
            VALUES (:email, :motdepasse, :codePIN)");
    $stmt->bindParam(':email', $compte->getEmail());
    $motdepasseHash = password_hash($compte->getMotdepasse(), PASSWORD_DEFAULT);
    $codePINHash = password_hash($compte->getCodePIN(), PASSWORD_DEFAULT);
    $stmt->bindParam(':motdepasse', $motdepasseHash);
    $stmt->bindParam(':codePIN', $codePINHash);

    return $stmt->execute();
  }

  public function verifierCompte($email, $motdepasse) {
    // Préparer la requête pour récupérer le compte avec l'email donné
    $stmt = $this->conn->prepare("SELECT motdepasse FROM comptes WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    // Récupérer le résultat
    $compte = $stmt->fetch(PDO::FETCH_ASSOC);

    // Vérifier si l'utilisateur existe et si le mot de passe est valide
    if ($compte && password_verify($motdepasse, $compte['motdepasse'])) {
        return true;
    }
    
    return false;
}

public function getCompteIdByEmail($email) {
  $stmt = $this->conn->prepare("SELECT compte_id FROM comptes WHERE email = :email");
  $stmt->bindParam(':email', $email);
  $stmt->execute();
  return $stmt->fetchColumn();
}


  public function mettreAJourCompte($compte) {
    // Mettre à jour le compte dans la base de données
    $stmt = $this->conn->prepare('UPDATE comptes SET email = :email, motdepasse = :motdepasse, codePIN = :codePIN  WHERE compte_id = :compte_id');
    $stmt->bindParam(':compte_id', $compte->getId());
    $stmt->bindParam(':email', $compte->getEmail());
    $motdepasseHash = password_hash($compte->getMotdepasse(), PASSWORD_DEFAULT);
    $codePINHash = password_hash($compte->getCodePIN(), PASSWORD_DEFAULT);
    $stmt->bindParam(':motdepasse', $motdepasseHash);
    $stmt->bindParam(':codePIN', $codePINHash);
    return $stmt->execute();
  }

  public function listeUtilisateurs($compte_id) {
    $stmt = $this->conn->prepare('SELECT * FROM utilisateurs WHERE compte_id = :compte_id');
    $stmt->bindParam(':compte_id', $compte_id);
    $utilisateurs = array();
    $stmt->execute();
    while ($donnees = $stmt->fetch()) {
      // Vous pouvez utiliser $donnees['pseudo'], $donnees['picto'] et $donnees['solde']
      $utilisateur = new Utilisateur(array(
        'pseudo' => $donnees['pseudo'],
        'picto' => $donnees['picto'],
        'solde' => $donnees['solde']
      ));
      array_push($utilisateurs, $utilisateur);
    }
    return $utilisateurs;
    }


  public function creerUtilisateur($pseudo, $picto, $solde = 0) {
    $stmt = $this->conn->prepare('INSERT INTO utilisateurs (pseudo, picto, solde) VALUES (:pseudo, :picto, :solde)');
    $stmt->bindParam(':pseudo', $pseudo);
    $stmt->bindParam(':picto', $picto);
    $stmt->bindParam(':solde', $solde);
    $stmt->execute();
  }



  
  public function paginationTransactions($utilisateur_id, $page) {
    // Charger les transactions pour la page sélectionnée
    $stmt = $this->conn->prepare('SELECT * FROM transactions WHERE utilisateur_id = :utilisateur_id ORDER BY date DESC LIMIT 50 OFFSET (:page - 1) * 50');
    $stmt->bindParam(':utilisateur_id', $utilisateur_id);
    $stmt->bindParam(':page', $page);
    return $stmt->execute()->fetchAll();
  }

  public function ajouterTransaction($utilisateur_id, $montant, $type) {
    // Ajouter une transaction
    $stmt = $this->conn->prepare('INSERT INTO transactions (utilisateur_id, montant, type) VALUES (:compte_id, :utilisateur_id, :montant, :type)');
    $stmt->bindParam(':utilisateur_id', $utilisateur_id);
    $stmt->bindParam(':montant', $montant);
    $stmt->bindParam(':type', $type);
    return $stmt->execute();
  }

}