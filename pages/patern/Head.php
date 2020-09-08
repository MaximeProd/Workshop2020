<?php
session_start();
require '../Fonction.php';
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

echo '<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>test</title>
    <link rel="stylesheet" href="../../css/LoginRegister.css">
    
    
  </head>
';