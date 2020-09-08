<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title>Météo</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="robots" content="index,follow" />
    <link rel="stylesheet" type="text/css" href="styles.css" />
</head>

<body>
<h4>
    <?php

    require_once("Fonction.php");

    $bdd = getDataBase();
    $liste = getListe($bdd, "fenetre");

    $city_name = getCityById($bdd);

    $fenetres = getInfoUser($bdd, 1);



    if (isset($city_name)) {
        echo '<h1>
            <hr/>
            <font color="black">
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
        }

        $temp_max = $clima->main->temp_max;
        $temp_min = $clima->main->temp_min;
        $temp = $clima->main->temp;
        $tempC = ($temp - 273.15);
        $pression = $clima->main->pressure;
        $vitesse_vent = $clima->wind->speed;
        $direction = $clima->wind->deg;
        $vitesse_vent = $vitesse_vent * 3600 / 1000;
        $humidite = $clima->main->humidity;
        $icon = $clima->weather[0]->icon . ".png";
        $today = date("F j, Y, g:i a");
        $cityname = $clima->name;
        $sky = $clima->weather[0]->description;

        echo "<table border='1' table width='400' align='center'>
			<tr>
				
			</tr>";
        echo "<tr>";
        echo "<td> <p align='center'>" . "Date et heure" . "</td>";
        echo "<td> <p align='center'>" . $date_r . "</td>";
        echo "</tr>";
        echo "<tr>";
        echo "<td> <p align='center'>" . "Ciel" . "</td>";
        echo "<td> <p align='center'>" . "<img src='http://openweathermap.org/img/w/" . $icon . "'/ >" . "</td>";
        echo "</tr>";

        echo("<br>");


        // TODO lister toutes les fenêtres appartenant à l'utilisateur

        // ouvrir ou fermer les fenetres
        // TODO : prendre en compte les cardinalités



        if (!empty($bdd)) {
            foreach ($fenetres as $fenetre) {
                if ($sky == "clear sky") {
                    switch ($tempC) {

                        // température supérieure à 25°C
                        case $tempC > 25 :
                            echo "Il est " . $hour . "h et il fait " . $tempC . "°C, fermer la fenêtre. ";

                            // ouvrir ou fermer les volets
                            switch ($hour) {
                                // température supérieure à 25°C et heure comprise entre minuit et 9h
                                case $hour >= 0 && $hour < 9:
                                    // vérification des cardinalités
                                    if ($fenetre->card_name =="est" || $fenetre->card_name =="nord-est" || $fenetre->card_name =="sud-est") {
                                        echo "fermer les volets de la fenêtre " . $fenetre->w_name . ". Car exposition : " . $fenetre->card_name . '<br>';
                                    }
                                    else {
                                        echo "ouvrir les volets de la fenêtre " . $fenetre->w_name . ". Car exposition : " . $fenetre->card_name . '<br>';
                                    }
                                    break;

                                // température supérieure à 25°C et heure comprise entre 9h et 18h
                                case $hour >= 9 && $hour < 18:
                                    if ($fenetre->card_name =="sud" || $fenetre->card_name =="sud-est" || $fenetre->card_name =="sud-ouest" || $fenetre->card_name =="ouest") {
                                        echo "fermer les volets de la fenetre " . $fenetre->w_name . ". Car exposition : " . $fenetre->card_name . '<br>';
                                    }
                                    else {
                                        echo "ouvrir les volets de la fenêtre " . $fenetre->w_name . ". Car exposition : " . $fenetre->card_name . '<br>';
                                    }
                                    break;

                                // température supérieure à 25°C et heure comprise entre 18h et minuit
                                case $hour >= 18 && $hour < 24:
                                    echo "ouvrir les volets de la fenetre " . $fenetre->w_name . ". Car exposition : " . $fenetre->card_name . '<br>';
                                    break;
                            }
                            break;


                        // température inférieure à 18°C
                        case $tempC < 18 :
                            // température inférieur à 18°C
                            echo "Il est " . $hour . "h et il fait " . $tempC . "°C, fermer la fenêtre. " . '<br>';


                        // température comprise entre 25 et 18°C
                        case $tempC <= 25 && $tempC >= 18:
                            // température comprise entre 25 et 18°C
                            echo "Il est " . $hour . "h et il fait " . $tempC . "°C, ouvrir la fenêtre. " . '<br>';
                            break;
                    } // end switch $tempC
                } // end if $sky == "clear sky"
                elseif ($sky == "rain" || $sky == "mist" || $sky == "drizzle" || $sky == "shower rain" || $sky == "thunderstorm" || $sky == "snow") {
                    echo "Il est " . $hour . "h et il fait " . $tempC . "°C, mais il pleut, fermer la fenêtre en gardant les volets ouverts";
                } // end else if $sky =="rain"

                else {
                    switch ($tempC) {
                        case $tempC > 25 :
                            echo "Il est " . $hour . "h et il fait " . $tempC . "°C, fermer la fenêtre. ";
                            break;

                        case $tempC < 18 :
                            // température inférieur à 18°C
                            echo "Il est " . $hour . "h et il fait " . $tempC . "°C, fermer la fenêtre. ";
                            break;

                        case $tempC <= 25 && $tempC >= 18:
                            // température comprise entre 25 et 18°C
                            echo "Il est " . $hour . "h et il fait " . $tempC . "°C, ouvrir la fenêtre. ";
                            break;
                    }// end switch $tempC
                }// end else
            } // end if isset city_name
        } // fin foreach
    } // if not empty bdd

    ?>
</h4>
</body>
</html>
