<?php

// Configuration du fichier SQLite
define('DB_FILE', 'savings.db');

// Fonction pour se connecter au fichier SQLite
$filePath = DB_FILE;
try {
  $conn = new PDO('sqlite:' . $filePath);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
    // Créé la table comptes dans la base de données
    $stmt = $conn->prepare('CREATE TABLE IF NOT EXISTS comptes (
    compte_id INTEGER PRIMARY KEY AUTOINCREMENT,
    email TEXT NOT NULL,
    motdepasse TEXT NOT NULL,
    codePIN TEXT NOT NULL
  )');
  $stmt->execute();

   // Créé la table utilisateurs dans la base de données
   $stmt = $conn->prepare('CREATE TABLE IF NOT EXISTS utilisateurs (
    utilisateur_id INTEGER PRIMARY KEY AUTOINCREMENT,
    pseudo TEXT NOT NULL,
    picto TEXT NOT NULL,
    solde REAL DEFAULT 0.00,
    compte_id INTEGER NOT NULL,
    FOREIGN KEY (compte_id) REFERENCES comptes(compte_id)
  )');
  $stmt->execute();

  $stmt = $conn->prepare('CREATE TABLE IF NOT EXISTS transactions (
    transaction_id INTEGER PRIMARY KEY AUTOINCREMENT,
    utilisateur_id INTEGER NOT NULL,
    type TEXT NOT NULL,
    montant REAL NOT NULL,
    description TEXT NOT NULL,
    FOREIGN KEY (utilisateur_id) REFERENCES utilisateurs(utilisateur_id)
  )');
  $stmt->execute();
  
  return $conn;

  } catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
    die();
}
