<?php
session_start();
require_once( 'Fonction.php');
$idClient = null;
$Compte = 'Se connecter/Inscription';
$lien = "LoginRegister.php";
if (isset($_SESSION['idClient'])){
    $idClient = $_SESSION['idClient'];
    $Compte = 'Mon Compte';
    $lien = "MonCompte.php";
}
//var_dump($idClient);

$bdd = getDataBase();
$pageAdmin = null;
$admin = false;

?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Smart Celsius</title>
    <link rel="stylesheet" href="../css/header.css">
  </head>
  <body>

<?php
    afficherErreur();
    var_dump($idClient);
    ?>
    <div class="containerHeader">
      <div class="menu">
        <div id="accueil"><a href="index.php"><span>ACCUEIL</span></a></div>
        <div id="exemple"><a href="infos_window_blind.php"><span>RENSEIGNEMENTS</span></a></div>
        <div id="boutique"><a href="contact.php"><span>CONTACT</span></a></div>
        <div id="propos"><a href="apropos.php"><span>A PROPOS</span></a></div>
          <?php
          if($idClient == null) {
              echo '<div id="contact"><a href="Inscription.php"><span>CONNEXION</span></a></div>';
          } else {
              echo '<div id="contact"><a href="loginRegister/logOut.php"><span>Se déconnecter</span></a></div>';
          }

          ?>
      </div>
