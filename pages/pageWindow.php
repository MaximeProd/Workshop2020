<?php
include_once("patern/Head.php");

?>

    <link rel="stylesheet" href="../css/cssf.css">
    <h1>Choisissez votre orientation</h1>
    <div class="complet">
        <div class="boussole">
            <div class="aiguille"></div>
        </div>


        <label class="btn btn-norde">Nord-Est</label>
        <label class="btn btn-nordo">Nord-Ouest</label>
        <label class="btn btn-est">Est</label>
        <label class="btn btn-sud">Sud</label>
        <label class="btn btn-sude">Sud-Est</label>
        <label class="btn btn-sudo">Sud-Ouest</label>
        <label class="btn btn-ouest">Ouest</label>
        <script src="../Javascript/jsf.js" charset="utf-8"></script>
        <form action="inter/ajoutwindow.html" method="get">
            <div>
                <label for="Nord">Nord</label>
                <input class="btn btn-nord" type="radio" id="Nord" name="card_name" value="nord">
            </div>
            <div>

                <input class="btn btn-nordo" type="radio" id="Nord-Ouest" name="card_name" value="nord-ouest">
            </div>
            <div>

                <input class="btn btn-est" type="radio" id="Est" name="card_name" value="est">
            </div>
            <div>

                <input class="btn btn-sud" type="radio" id="Sud" name="card_name" value="sud">
            </div>
            <div>
                <label  for="Ouest">Ouest</label>
                <input class="btn btn-ouest" type="radio"  name="card_name" value="ouest">
            </div>
            <div>
                <label  for="Nord-Est">Nord-Est</label>
                <input class="btn btn-norde" type="radio"  name="card_name" value="nord-est">
            </div>
            <div>
                <label  for="Sud-Est">Sud-Est</label>
                <input class="btn btn-sude" type="radio"  name="card_name" value="sud-est">
            </div>
            <div>
                <label  for="Sud-Ouest">Sud-Ouest</label>
                <input class="btn btn-sudo" type="radio" id="Sud-Ouest" name="card_name" value="sud-ouest">
            </div>
            <input type="submit" name="button" class="bouton" value="Validez votre orientation">
        </form>
    </div>
  </body>
</html>

<?php
// TODO - modifier le input en mode hidden