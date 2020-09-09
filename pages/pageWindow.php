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

            <input type="submit" name="button" class="bouton" value="Validez votre orientation">
        </form>
    </div>
  </body>
</html>

<?php
// TODO - modifier le input en mode hidden