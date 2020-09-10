<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title>Météo</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="../css/infos_windo_blind.css">
</head>

<body  >
<?php
    require_once("patern/Head.php");

    $bdd = getDataBase();

    $user_id = $idClient;

    $city_name = getCityById($bdd, $user_id);


    if (isset($user_id)){
        $fenetres = getInfoUser($bdd, $user_id);
        if (!empty($fenetres)){
            echo "<table border='1' table width='400' align='center'>";

            foreach ($fenetres as $fenetre) {
                echo "<tr>
                        <td><p align='center'>" . $fenetre->w_name . "</p></td>
                        <td><p align='center'>" . $fenetre->card_name . "</p></td>
                        <td><a href='suppressionWindow.php?w_name=" . $fenetre->w_name ."' style='text-decoration: underline;' class='del_name'>Supprimer</a></td>";
            }
            echo "";
        }
    } else {
        echo "Il y a eu une erreur";
    }





/*        //Affichage données
        echo "<tr>";
        echo "<td> <p align='center'>" . "Heure" . "</td>";
        echo "<td> <p align='center'>" . $time . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td> <p align='center'>" . "Température actuelle " . "</td>";
        echo "<td> <p align='center'>" . $tempC . "°C</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td> <p align='center'>" . "Ciel" . "</td>";
        echo "<td> <p align='center'>" . "<img src='http://openweathermap.org/img/w/" . $icon . "'/ >" . "</td>";
        echo "</tr>";*/




?>
</body>
