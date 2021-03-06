<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title>Météo</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="../css/infos_windo_blind.css">
</head>

<div>
<?php

require_once("patern/Head.php");

$bdd = getDataBase();

$user_id = $idClient;

$city_name = getCityById($bdd, $user_id);


if (isset($user_id)){
    $fenetres = getInfoUser($bdd, $user_id);

    if (isset($city_name)) {
    echo '<h1>
                <hr/>
                <font color="white">
                    <center>
                        Données météo à ' . $city_name . '
                    </center>
                </font>
                <hr/>
            </h1>';
    $url = "http://api.openweathermap.org/data/2.5/weather?q=" . $city_name . ",fr&APPID=3f8b1f92cd696a2ea09d9be4933ec416";

    $contents = file_get_contents($url);
    $clima = json_decode($contents);

    date_default_timezone_set('Europe/Paris');

    if (date_default_timezone_get()) {
        $date_r = strftime('%A %d %B %Y, %H:%M');
        $hour = strftime('%H');
        $time = strftime('%H:%M');
    }

    $temp = $clima->main->temp;
    $tempC = ($temp - 273.15);
    $icon = $clima->weather[0]->icon . ".png";
    $today = date("F j, Y, g:i a");
    $cityname = $clima->name;
    $sky = $clima->weather[0]->description;

    echo "<table border='1' table width='400' align='center'>
                    <tr>
    
                    </tr>";
    //Affichage données
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
    echo "</tr>";

    // ouvrir ou fermer les fenetres
    ?>

    <table border="solid" align='center' class="drt">
        <tr>
            <td>Nom fenêtre</td>
            <td>Exposition</td>
            <td>Que faire avec la fenêtre ?</td>
            <td>Que faire avec le volet ?</td>
            <td>Que faire avec la climatisation ?</td>
            <td>Que faire avec le chauffage ?</td>
        </tr>


        <?php
        $action_window = "";
        $action_blind = "";
        $action_clim = "";
        $action_chauf = "";

        if (!empty($bdd)) {
            foreach ($fenetres as $fenetre) {
                if ($sky == "clear sky") {
                    switch ($tempC) {

                        // température supérieure à 25°C
                        case $tempC > 25 :
                            //echo "Il est " . $hour . "h et il fait " . $tempC . "°C, fermer la fenêtre. ";
                            $action_window = "Fermer";
                            $action_clim = "Allumer";
                            $action_chauf = "Eteindre";

                            // ouvrir ou fermer les volets
                            switch ($hour) {
                                // température supérieure à 25°C et heure comprise entre minuit et 9h
                                case $hour >= 0 && $hour < 9:
                                    // vérification des cardinalités
                                    if ($fenetre->card_name == "est" || $fenetre->card_name == "nord-est" || $fenetre->card_name == "sud-est") {
                                        //echo "fermer les volets de la fenêtre " . $fenetre->w_name . ". Car exposition : " . $fenetre->card_name . '<br>';
                                        $action_blind = "Fermer";
                                    } else {
                                        //echo "ouvrir les volets de la fenêtre " . $fenetre->w_name . ". Car exposition : " . $fenetre->card_name . '<br>';
                                        $action_blind = "Ouvrir";
                                    }
                                    break;

                                // température supérieure à 25°C et heure comprise entre 9h et 18h
                                case $hour >= 9 && $hour < 18:
                                    if ($fenetre->card_name == "sud" || $fenetre->card_name == "sud-est" || $fenetre->card_name == "sud-ouest" || $fenetre->card_name == "ouest") {
                                        //echo "fermer les volets de la fenetre " . $fenetre->w_name . ". Car exposition : " . $fenetre->card_name . '<br>';
                                        $action_blind = "Fermer";
                                    } else {
                                        //echo "ouvrir les volets de la fenêtre " . $fenetre->w_name . ". Car exposition : " . $fenetre->card_name . '<br>';
                                        $action_blind = "Ouvrir";
                                    }
                                    break;

                                // température supérieure à 25°C et heure comprise entre 18h et minuit
                                case $hour >= 18 && $hour < 24:
                                    //echo "ouvrir les volets de la fenetre " . $fenetre->w_name . ". Car exposition : " . $fenetre->card_name . '<br>';
                                    $action_blind = "Ouvrir";
                                    break;
                            }
                            break;


                        // température inférieure à 18°C
                        case $tempC < 18 :
                            // température inférieur à 18°C
                            //echo "Il est " . $hour . "h et il fait " . $tempC . "°C, fermer la fenêtre. " . '<br>';
                            $action_window = "Fermer";
                            $action_clim = "Eteindre";
                            $action_chauf = "Allumer";
                            $action_blind = "Ouvrir";


                        // température comprise entre 25 et 18°C
                        case $tempC <= 25 && $tempC >= 18:
                            // température comprise entre 25 et 18°C
                            //echo "Il est " . $hour . "h et il fait " . $tempC . "°C, ouvrir la fenêtre. " . '<br>';
                            $action_window = "Ouvrir";
                            $action_blind = "Ouvrir";
                            $action_clim = "Eteindre";
                            $action_chauf = "Eteindre";
                            break;
                    } // end switch $tempC
                } // end if $sky == "clear sky"
                elseif ($sky == "light rain" || $sky == "rain" || $sky == "mist" || $sky == "drizzle" || $sky == "shower rain" || $sky == "thunderstorm" || $sky == "snow") {
                    //echo "Il est " . $hour . "h et il fait " . $tempC . "°C, mais il pleut, fermer la fenêtre en gardant les volets ouverts";
                    $action_window = "Fermer";
                    $action_blind = "Ouvrir";
                    switch ($tempC) {
                        case $tempC > 25 :
                            //echo "Il est " . $hour . "h et il fait " . $tempC . "°C, fermer la fenêtre. ";
                            $action_clim = "Allumer";
                            $action_chauf = "Eteindre";
                            break;

                        case $tempC < 18 :
                            // température inférieur à 18°C
                            //echo "Il est " . $hour . "h et il fait " . $tempC . "°C, fermer la fenêtre. ";
                            $action_clim = "Eteindre";
                            $action_chauf = "Allumer";
                            break;

                        case $tempC <= 25 && $tempC >= 18:
                            // température comprise entre 25 et 18°C
                            //echo "Il est " . $hour . "h et il fait " . $tempC . "°C, ouvrir la fenêtre. ";
                            $action_clim = "Eteindre";
                            $action_chauf = "Eteindre";
                            break;
                    }// fin switch break
                } // end else if $sky =="rain"

                else {
                    switch ($tempC) {
                        case $tempC > 25 :
                            //echo "Il est " . $hour . "h et il fait " . $tempC . "°C, fermer la fenêtre. ";
                            $action_window = "Fermer";
                            $action_blind = "Fermer";
                            $action_clim = "Allumer";
                            $action_chauf = "Eteindre";
                            break;

                        case $tempC < 18 :
                            // température inférieur à 18°C
                            //echo "Il est " . $hour . "h et il fait " . $tempC . "°C, fermer la fenêtre. ";
                            $action_window = "Fermer";
                            $action_blind = "Ouvrir";
                            $action_clim = "Eteindre";
                            $action_chauf = "Allumer";
                            break;

                        case $tempC <= 25 && $tempC >= 18:
                            // température comprise entre 25 et 18°C
                            //echo "Il est " . $hour . "h et il fait " . $tempC . "°C, ouvrir la fenêtre. ";
                            $action_window = "Ouvrir";
                            $action_blind = "Ouvrir";
                            $action_clim = "Eteindre";
                            $action_chauf = "Eteindre";
                            break;
                    }// end switch $tempC
                }// end else

                echo '<tr>
                            <td>' . $fenetre->w_name . '</td>
                            <td> ' . $fenetre->card_name . '</td>
                            <td> ' . $action_window . '</td>
                            <td> ' . $action_blind . '</td>
                            <td> ' . $action_clim . '</td>
                            <td> ' . $action_chauf . '</td>
                       </tr> ';
                } // fin foreach
            } // if not empty bdd
        } // if isset city name
        echo '</table>';
    } // if isset id client
    else {
        echo '<h1>
            <hr/>
            <font color="white">
                <center>
                    Données météo à Paris
                </center>
            </font>
            <hr/>
        </h1>';
        $url = "http://api.openweathermap.org/data/2.5/weather?q=Paris,fr&APPID=3f8b1f92cd696a2ea09d9be4933ec416";

        $contents = file_get_contents($url);
        $clima = json_decode($contents);

        date_default_timezone_set('Europe/Paris');

        if (date_default_timezone_get()) {
            $date_r = strftime('%A %d %B %Y, %H:%M');
            $hour = strftime('%H');
            $time = strftime('%H:%M');
        }

        $temp = $clima->main->temp;
        $tempC = ($temp - 273.15);
        $icon = $clima->weather[0]->icon . ".png";
        $today = date("F j, Y, g:i a");
        $cityname = $clima->name;
        $sky = $clima->weather[0]->description;

        echo "<table border='1' table width='400' align='center'>
                <tr>

                </tr>";
    //Affichage données
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
        echo "</tr>";

        echo "<table border='solid' align='center' class='drt' height='50px;' width='400px;'>
                <tr>
                    <td>Connectez vous pour obtenir des informations sur votre ville</td>
                </tr>
              </table>";

    }
        echo"    <div> <a href='pageWindow.php' type=\"button\" value=\"Ajouter une fenêtre\" class=\"fenetre\">Ajouter une fenêtre</a></div>";
        echo"    <div> <a href='suppWindow.php' type=\"button\" value=\"Supprimer une fenêtre\" class=\"supp_button\">Supprimer une fenêtre</a></div>";
    ?>

</body>
</html>
