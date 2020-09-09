<?php
session_start();
require '../Fonction.php';

$bdd = getDatabase();
$pl_login = $_POST;

if(isset($bdd)){
    $_SESSION["erreur"] = null;
    if (isset($pl_login['mdp']) AND isset($pl_login['email'])){
        $password = htmlspecialchars($_POST['mdp']);
        $liste = getListe($bdd,'membres',Array("email" => $pl_login['email']),Array(),'mdp,id');
        if(!empty($liste)){
            if(count($liste)==1 && password_verify($password,$liste[0]->mdp)){
                $idClient = $liste[0]->id;
                $_SESSION['idClient'] = $idClient;
            } elseif (count($liste) > 1){
                $_SESSION['idClient'] = $idClient;
                //Erreur : Il existe plusieurs client avec la même adresse mail!! Grosse erreur d'identification!
                $_SESSION["erreur"] = 1;
            } else {
                //Erreur fréquente : le mot de passe ou l'email ne correspond pas
                $_SESSION["erreur"] = 2;
            }
        } else {
            //Erreur aussi fréquente : L'email n'est pas reconnu
            $_SESSION["erreur"] = 3;
        }
    }
}else {
    $_SESSION["erreur"] = 7;
}