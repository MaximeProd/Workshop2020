<?php
session_start();
require '../Fonction.php';

$bdd = getDatabase();
$pl_login = $_POST;

if(isset($bdd)){
    $_SESSION["erreur"] = null;
    if (isset($pl_login['u_password']) AND isset($pl_login['u_email'])){
        $password = htmlspecialchars($_POST['u_password']);
        $liste = getListe($bdd,'user',Array("u_email" => $pl_login['u_email']),Array(),'u_password,u_id');
        if(!empty($liste)){
            if(count($liste)==1 && password_verify($password,$liste[0]->u_password)){
                $idClient = $liste[0]->u_id;
                $_SESSION['idClient'] = $idClient;
                header('Location: ../index.php');
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
    header('Location: ../Inscription.php');
}

if ($_SESSION["erreur"] != null){

}
