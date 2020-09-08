<?php
require "../Fonction.php";
$bdd = getDataBase();

$exist = getListe($bdd,"cardinalite",array("card_name"=>"nord"),array(),'*');
var_dump($exist);