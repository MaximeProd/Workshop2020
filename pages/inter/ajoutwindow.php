<?php
session_start();
require "../Fonction.php";



if(isset($_POST["card_name"]) && isset($_POST["w_name"]) && isset($_POST["u_id"])){
    //On utilise la liste Post pour ensuite crée une nouvelle fenêtre à insérer
    $bdd = getDataBase();
    $id_card = getListe($bdd,"cardinalite",array("card_name"=>$_POST["card_name"]));
    unset($_POST["card_name"]); // On retire
    $id_card = $id_card[0];
    $id_card = $id_card->card_id;
    $_POST["card_id"] = $id_card;
    insertListe($bdd,'fenetre',$_POST);
} else {
    $_SESSION["erreur"] = "Le post est incorrect";
    echo "fail";
    var_dump($_POST);
}

