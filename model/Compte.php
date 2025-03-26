<?php
class Compte {
  private $email;
  private $motdepasse;
  private $codePIN;

  public function __construct($email, $motdepasse, $codePIN) {
    $this->email = $email;
    $this->motdepasse = $motdepasse;
    $this->codePIN = $codePIN;
  }

  public function getEmail() {
    return $this->email;
  }

  public function getMotdepasse() {
    return $this->motdepasse;
  }

  public function getCodePIN() {
    return $this->codePIN;
  }
}
