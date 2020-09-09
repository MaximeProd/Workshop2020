<?php
session_start();
require '../Fonction.php';

$bdd = getDataBase();
if (isset($bdd)){
    $insert = Array();
    //Partie vérification qu'il n'y est pas d'erreur dans l'enregistrement
    if (isset($_POST)){
        //Pas besoin de vérifier que le formulaire est plein -> déjà gérer par l'html
        //Vérification mdp
        if ($_POST['u_password'] == $_POST['confirmMdp']) {
            unset($_POST['confirmMdp']);
            //Vérification email unique
            $emails = getListe($bdd,'user',Array('u_email' => $_POST['u_email']),Array(),'u_email');
            if (!empty($emails)) {
                $_SESSION["erreur"] = 5;
            }
        } else {
            $_SESSION["erreur"] = 2;
        }
    }
    if (!isset($_SESSION["erreur"])) {
        //Cryptage mdp :
        $_POST['u_password'] = password_hash($_POST['u_password'],PASSWORD_DEFAULT);
        insertListe($bdd,'user',$_POST);
        $listeNewMembre = getListe($bdd,'user',Array("u_email" => $_POST['u_email']),Array(),'u_id');
        $listeNewMembre = $listeNewMembre[0];
        $_SESSION['idClient'] = $listeNewMembre->id;
        header('Location: ../MonCompte.php');
    } else {
        header('Location: ../Inscription.php');
    }
} else {
    $_SESSION["erreur"] = 7;
    header('Location: ../LoginRegister.php');
}