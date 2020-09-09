<?php
require 'patern/Head.php';
//Partie code
//Gestion des erreurs

//Completion des listes pour les éviter les erreurs si elle sont vide


echo' 
  <body>
    <div class="container right-panel-active">
      <!-- Sign Up -->
      <div class="container__form container--signup">
        <form action="#" class="form" id="form1">
          <h2 class="form__title">S\'inscrire</h2>
          <input type="text" name="u_last_name" placeholder="Nom" class="input" required="required" />
          <input type="text" name="u_name" placeholder="Prenom" class="input" required="required">
          <input type="text" name="u_city" placeholder="Ville" class="input" required="required">
          <input type="text" name="u_codePostal" placeholder="Code postal" class="input" required="required">
          <input type="email" name="u_email" placeholder="Email" class="input" required="required" />
          <input type="password" name="u_password" placeholder="Mot de passe" class="input" required="required" />
          <input type="password" name="comfirmdp" placeholder="Confirmer votre mot de passe" class="input" required="required" />
          <button class="btn">S\'inscrire</button>
        </form>
      </div>

      <!-- Sign In -->
      <div class="container__form container--signin">
        <form action="#" class="form" id="form2">
          <h2 class="form__title">Se connecter</h2>
          <input type="email" name="u_email" placeholder="Email" class="input" required="required" />
          <input type="password" name="mdp" placeholder="Mot de passe" class="input" required="required" />
          <a href="#" class="link">Mot de passe oublié?</a>
          <button class="btn">Se connecter</button>
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
    <script src="../../Javascript/Js.js" charset="utf-8"></script>

  </body>
 </html>
';