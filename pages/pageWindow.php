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
                <label class="btn btn-nord" for="Nord">Nord</label>
                <input type="radio" id="Nord" name="card_name" value="nord">
            </div>
            <div>
                <label class="btn btn-nordo" for="Nord-Ouest">Nord-Ouest</label>
                <input type="radio" id="Nord-Ouest" name="card_name" value="nord-ouest">
            </div>
            <div>
                <label class="btn btn-est" for="Est">Est</label>
                <input type="radio" id="Est" name="card_name" value="est">
            </div>
            <div>
                <label class="btn btn-sud" for="Sud">Sud</label>
                <input type="radio" id="Sud" name="card_name" value="sud">
            </div>
            <div>
                <label class="btn btn-ouest" for="Ouest">Ouest</label>
                <input type="radio" id="Ouest" name="card_name" value="ouest">
            </div>
            <div>
                <label class="btn btn-norde" for="Nord-Est">Nord-Est</label>
                <input type="radio" id="Nord-Est" name="card_name" value="nord-est">
            </div>
            <div>
                <label class="btn btn-sude" for="Sud-Est">Sud-Est</label>
                <input type="radio" id="Sud-Est" name="card_name" value="sud-est">
            </div>
            <div>
                <label class="btn btn-sudo" for="Sud-Ouest">Sud-Ouest</label>
                <input type="radio" id="Sud-Ouest" name="card_name" value="sud-ouest">
            </div>
            <input type="submit" name="button" class="bouton" value="Validez votre orientation">
        </form>
    </div>
  </body>
</html>

<?php
// TODO - modifier le input en mode hidden