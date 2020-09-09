<?php
require 'patern/Head.php';
//Partie code
//Gestion des erreurs

//Completion des listes pour les éviter les erreurs si elle sont vide


echo '
  <link rel="stylesheet" href="../css/LoginRegister.css"
    <div class="container right-panel-active">
      <!-- Sign Up -->
      <div class="container__form container--signup">
        <form action="loginRegister/Register.php" method ="post" class="form">
          <h2 class="form__title">S\'inscrire</h2>
          <input type="text" name="u_name" placeholder="Prenom" class="input" required>  
          <input type="text" name="u_last_name" placeholder="Nom" class="input" required>
          <input type="email" name="u_email" placeholder="Email" class="input" required>
          <input type="password" name="u_password" placeholder="Mot de passe" class="input" required>
          <input type="password" name="confirmMdp" placeholder="Confirmer votre mot de passe" class="input" required>
        <select name="c_id" class="input" required>
            <option >Sélectionner une ville</option>
';

            $cities = getListe($bdd, 'city', Array(), Array(), '*');
            foreach ($cities as $city) {

                echo '<option value="' . $city->c_id . '" >' . $city->c_name . '</option>';

            }
            echo '
        </select>
          
          <input type="submit" class="btn" value="S\'inscrire"/>
        </form>
      </div>

      <!-- Sign In -->
      <div class="container__form container--signin">
      <h2 class="form__title">Se connecter</h2>
        <form action="loginRegister/Login.php" method ="post" class="form" >
          
          <input type="email" name="u_email" placeholder="Email" class="input" required>
          <input type="password" name="u_password" placeholder="Mot de passe" class="input" required />
          <input type="submit" class="btn" value="Se connecter">
        </form>
      </div>

      <!-- Overlay -->
      <div class="container__overlay">
        <div class="overlay">
          <div class="overlay__panel overlay--left">
            <button class="btn" id="signIn">Se connecter</button>
          </div>
          <div class="overlay__panel overlay--right">
            <button class="btn" id="signUp">S\'inscrire</button>
          </div>
        </div>
      </div>
    </div>
   
    <script src="../Javascript/Js.js" charset="utf-8"></script>
     </body>
 </html>
';