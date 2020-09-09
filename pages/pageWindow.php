<?php
include_once("patern/Head.php");

?>

    <link rel="stylesheet" href="../css/cssf.css">
    <h1>Choisissez votre orientation</h1>
    <div class="complet">
        <div class="boussole">
            <div class="aiguille"></div>
        </div>

        <label class="btn btn-nord">Nord</label>
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
                <input class="name" type="text" id="window_name" name="w_name" placeholder="Entrez le nom de la fenêtre">
            </div>
            <div>
                <input class="btn btn-nord" type="radio" id="Nord" name="card_name" value="nord" hidden>
            </div>
            <div>
                <input class="btn btn-nordo" type="radio" id="Nord-Ouest" name="card_name" value="nord-ouest" hidden>
            </div>
            <div>
                <input class="btn btn-est" type="radio" id="Est" name="card_name" value="est" hidden>
            </div>
            <div>
                <input class="btn btn-sud" type="radio" id="Sud" name="card_name" value="sud" hidden>
            </div>
            <div>
                <input class="btn btn-ouest" type="radio" id="Ouest" name="card_name" value="ouest" hidden>
            </div>
            <div>
                <input class="btn btn-norde" type="radio" id="Nord-Est" name="card_name" value="nord-est" hidden>
            </div>
            <div>
                <input class="btn btn-sude" type="radio" id="Sud-Est" name="card_name" value="sud-est" hidden>
            </div>
            <div>
                <input class="btn btn-sudo" type="radio" id="Sud-Ouest" name="card_name" value="sud-ouest" hidden>
            </div>
            <input type="submit" name="button" class="bouton" value="Validez votre orientation">
        </form>
    </div>
  </body>
</html>

<?php
// TODO - modifier le input en mode hidden