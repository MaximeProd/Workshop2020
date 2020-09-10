<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title>Météo</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="../css/infos_windo_blind.css">
</head>

<body >

<?php
require_once("patern/Head.php");

$name = $_GET['w_name'];



var_dump($_POST);

// Supprimer dans la table
$query = "DELETE FROM fenetre 
            WHERE w_name=:w_name;";

$statement = $bdd->prepare($query);
// Etape 2.2 : paramètres
$statement->bindParam(':w_name', $_GET['w_name']);
// Etape 2.3 : exécution
var_dump($statement->execute());
if ($statement->execute()) {
    // Rediriger vers la page de liste des chambres
    header('Location: suppWindow.php');
} else {
    echo "Essaye encore !";
}


































echo $name;
//deleteWindow($bdd, $idClient, $w_name);
?>

</body>
</html>
