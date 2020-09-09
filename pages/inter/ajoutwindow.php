<?php
session_start();
require "../Fonction.php";



if(isset($_POST["card_name"]) && isset($_POST["w_name"]) && isset($_POST["u_id"])){
    $bdd = getDataBase();
    $id_card = getListe($bdd,"cardinalite",array("card_name"=>$_POST["card_name"]));
    unset($_POST["card_name"]);
    $id_card = $id_card[0];
    $id_card = $id_card->card_id;
    $_POST["card_id"] = $id_card;
    insertListe($bdd,'fenetre',$_POST);
} else {
    $_SESSION["erreur"] = "Une erreur s'est produite";
}
if($_SESSION["erreur"] != null){
    header('Location: ../infos_window_blind.php');
} else {
    header('Location: ../pageWindow.php');
}

