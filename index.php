<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();


require_once 'db.php';
require_once 'controller/CompteController.php';
require_once 'controller/UtilisateurController.php';

$compteCtrl = new CompteController();
$utilisateurCtrl = new UtilisateurController();




// Afficher la page d'accueil par défaut
if (!isset($_GET['action'])) {
    $_GET['action'] = '';
}

// est-ce qu'on a une personne avec un compte connectée ?

switch ($_GET['action']) {
    case 'connexion':
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $compteCtrl->connexionCompte();
        } else {
            $compteCtrl->afficherFormConnexion();
        }
        break;
      case 'creationCompte':
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $compteCtrl->creerCompte();
        } else {
            $compteCtrl->afficherFormCreerCompte();
        }
        break;
    case 'listeUtilisateurs':
        $compteCtrl->afficherListeUtilisateurs();
        /*$listeUtilisateurs = $compteCtrl->listeUtilisateurs();
        include('view/liste_utilisateurs.php');
        */

        break;
    case 'creationUtilisateur':
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $utilisateurCtrl->creerutilisateur();
        } else {
            $utilisateurCtrl->afficherFormCreerUtilisateur();
        }
        break;
    case 'solde':
        $utilisateurCtrl->afficherSolde();
        break;
    default:
        include('view/accueil.php');
        break;
  }
?>