<?php
class Utilisateur {
  private $pseudo;
  private $picto;
  private $solde;

  public function __construct(array $donnees) {
    $this->pseudo = $donnees['pseudo'];
    $this->picto = $donnees['picto'];
    $this->solde = $donnees['solde'];
  }

  public function getPseudo() {
    return $this->pseudo;
  }

  public function getPicto() {
    return $this->picto;
  }

  public function getSolde() {
    return $this->solde;
  }
}