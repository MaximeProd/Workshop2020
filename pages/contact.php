<?php
require ('patern/Head.php');

echo '

<link rel="stylesheet" href="../css/gylipo.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<link rel="stylesheet" href="https://demo.voidcoders.com/htmldemo/fitgear/main-files/assets/css/animate.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
<body>
  <section class="contact-page-section">
     <div class="container">
         <div class="sec-title">
             <div class="title">Contactez Smart Celsius</div>
               <h2>Gardez un contact avec nous.</h2>
           </div>
           <div class="inner-container">
             <div class="row clearfix">

                 <!--Form Column-->
                   <div class="form-column col-md-8 col-sm-12 col-xs-12">
                     <div class="inner-column">

                           <!--Contact Form-->
                           <div class="contact-form">
                               <form method="post" action="#" id="contact-form">
                                   <div class="row clearfix">
                                       <div class="form-group col-md-6 col-sm-6 co-xs-12">
                                           <input type="text" name="Nom" value="" placeholder="Nom" required>
                                       </div>
                                       <div class="form-group col-md-6 col-sm-6 co-xs-12">
                                           <input type="email" name="email" value="" placeholder="Email" required>
                                       </div>
                                       <div class="form-group col-md-6 col-sm-6 co-xs-12">
                                           <input type="text" name="Thème" value="" placeholder="Thème" required>
                                       </div>
                                       <div class="form-group col-md-6 col-sm-6 co-xs-12">
                                           <input type="text" name="Téléphone" value="" placeholder="Téléphone" required>
                                       </div>
                                       <div class="form-group col-md-12 col-sm-12 co-xs-12">
                                           <textarea name="Message" placeholder="Message"></textarea>
                                       </div>
                                       <div class="form-group col-md-12 col-sm-12 co-xs-12">
                                           <button type="submit" class="theme-btn btn-style-one">Envoyez !</button>
                                       </div>
                                   </div>
                               </form>
                           </div>
                           <!--End Contact Form-->

                       </div>
                   </div>

                   <!--Info Column-->
                   <div class="info-column col-md-4 col-sm-12 col-xs-12">
                     <div class="inner-column">
                         <h2>Contact Info</h2>
                           <ul class="list-info">
                             <li><i class="fas fa-globe"></i>437 Avenue des Apothicaires, 34090 Montpellier</li>
                               <li><i class="far fa-envelope"></i>example@test</li>
                               <li><i class="fas fa-phone"></i>06 42 58 74 35 <br>04 56 90 73 25</li>
                           </ul>
                           <ul class="social-icon-four">
                               <li class="follow">Suivez nos réseaux sociaux: </li>
                               <li><a href="https://www.facebook.com/smart.celsius" target="_blank"><i class="fab fa-facebook"></i></a></li>
                               <li><a href="https://twitter.com/CelsiusSmart" target="_blank"><i class="fab fa-twitter"></i></a></li>
                               <li><a href="https://www.instagram.com/smart_celsius/?hl=fr" target="_blank"><i class="fab fa-instagram"></i></a></li>
                             </ul>
                       </div>
                   </div>
                 </div>
           </div>
       </div>
   </section>
</body>
</html>
';