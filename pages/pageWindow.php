
<html>
  <body>
  <form action ="inter/ajoutwindow.php" method ="post">
      <div>
          <input type="radio" id="nord" name="card_name" value="nord"  checked>
          <label for="nord">nord</label>
      </div>

      <div>
          <input type="radio" id="sud" name="card_name" value="sud">
          <label for="sud">sud</label>
      </div>

      <div>
          <input type="radio" id="est" name="card_name" value="est">
          <label for="est">est</label>
      </div>
      <div>
          <input type="radio" id="ouest" name="card_name" value="ouest">
          <label for="ouest">ouest</label>
      </div>

      <label for="w_name">Nom de la fenêtre : </label>
      <input type="input" id="name" name="w_name" value="Fenêtre">
      <input type="hidden" id="name" name="u_id" value="1">

      <input type="submit" value="Envoyer">
  </form>

  </body>
</html>

<?php
// TODO - modifier le input en mode hidden