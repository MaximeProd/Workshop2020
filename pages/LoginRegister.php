<?php

if (!isset($_SESSION['savePostRegister']) || empty($_SESSION['savePostRegister'])){
    $savePostRegister = array ("u_email"=>"","u_mdp"=>"","confirmMdp"=>"","u_last_name"=>"","u_name"=>"","c_name"=>"","c_codePostal"=>"");
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
          <input type="text" value="'.$savePostLogin["Nom"].'" placeholder="Nom" name="Nom" class="input" />
          <input type="text" value="'.$savePostLogin["Prenom"].'" placeholder="Prenom" name="Prenom" class="input">
          <input type="text" value="'.$savePostLogin["Ville"].'" placeholder="Ville" name="Ville" class="input">
          <input type="text" value="'.$savePostLogin["codePostal"].'" placeholder="Code postal" name="Code postal" class="input">
          <input type="email" value="'.$savePostLogin["email"].'" placeholder="Email" name="Email" class="input" />
          <input type="password" value="'.$savePostLogin["mdp"].'" placeholder="Mot de passe" name="Mdp" class="input" />
          <input type="password" value="'.$savePostLogin["ComfirMdp"].'" placeholder="Confirmer votre mot de passe" name="comfirmdp" class="input" />
          <button class="btn">S\'inscrire</button>
        </form>
      </div>

      <!-- Sign In -->
      <div class="container__form container--signin">
        <form action="#" class="form" id="form2">
          <h2 class="form__title">Se connecter</h2>
          <input type="email" value="'.$savePostLogin["Email"].'" placeholder="Email" name="Email" class="input" />
          <input type="password" value="'.$savePostLogin["Mdp"].'" placeholder="Mot de passe" name="Mdp" class="input" />
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