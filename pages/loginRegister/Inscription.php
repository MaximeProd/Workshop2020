<?php

require 'patern/Head.php';
//Partie code
//Gestion des erreurs

//Completion des listes pour les éviter les erreurs si elle sont vide
if (!isset($_SESSION['savePostRegister']) || empty($_SESSION['savePostRegister'])){
    $savePostRegister = array ("email"=>"","mdp"=>"","confirmMdp"=>"","nom"=>"","prenom"=>"","adresse"=>"","ville"=>"","codePostal"=>"");
} else {
    $savePostRegister = $_SESSION['savePostRegister'];
    unset($_SESSION['savePostRegister']);
}
if (!isset($_SESSION['savePostLogin']) || empty($_SESSION['savePostLogin'])){
    $savePostLogin = array ("email"=>"","mdp"=>"");
} else {
    $savePostLogin = $_SESSION['savePostLogin'];
    unset($_SESSION['savePostLogin']);
}

echo '<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>test</title>
    <link rel="stylesheet" href="test.css">
  </head>
  <body>
    </html>
    <div class="container right-panel-active">
      <!-- Sign Up -->
      <div class="container__form container--signup">
        <form action="#" class="form" id="form1">
          <h2 class="form__title">S\'inscrire</h2>
          <input type="text" placeholder="Nom" class="input" />
          <input type="text" placeholder="Prenom" class="input">
          <input type="text" placeholder="Ville" class="input">
          <input type="text" placeholder="Code postal" class="input">
          <input type="email" placeholder="Email" class="input" />
          <input type="password" placeholder="Mot de passe" class="input" />
          <input type="password" placeholder="Confirmer votre mot de passe" class="input" />
          <button class="btn">S\'inscrire</button>
        </form>
      </div>

      <!-- Sign In -->
      <div class="container__form container--signin">
        <form action="#" class="form" id="form2">
          <h2 class="form__title">Se connecter</h2>
          <input type="email" placeholder="Email" class="input" />
          <input type="password" placeholder="Mot de passe" class="input" />
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
    <script src="js.js" charset="utf-8"></script>

  </body>
';
