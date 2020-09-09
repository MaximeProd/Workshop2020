<?php
include_once("patern/Head.php");
?>
    <link rel="stylesheet" href="cssr.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://demo.voidcoders.com/htmldemo/fitgear/main-files/assets/css/animate.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <section class="contact-page-section">
     <div class="container">
         <div class="sec-title">
             <div class="title">Vos fenêtres</div>
               <h2>Rentrez votre fenêtre.</h2>
           </div>
           <div class="inner-container">
             <div class="row clearfix">

                   <div class="form-column col-md-8 col-sm-12 col-xs-12">
                     <div class="inner-column">

                           <div class="contact-form">
                               <form method="post" action="sendemail.php" id="contact-form">
                                   <div class="row clearfix">
                                       <div class="form-group col-md-6 col-sm-6 co-xs-12">
                                           <input type="text" name="name" value="" placeholder="Nom fenêtre" required>
                                       </div>
                                       <div class="form-group col-md-6 col-sm-6 co-xs-12">
                                           <input type="email" name="email" value="" placeholder="Endroit de la fenêtre" required>
                                       </div>
                                       <div class="form-group col-md-6 col-sm-6 co-xs-12">
                                           <input type="text" name="subject" value="" placeholder="Exposition" required>
                                       </div>
                                       <div class="form-group col-md-12 col-sm-12 co-xs-12">
                                           <textarea name="message" placeholder="Description"></textarea>
                                       </div>
                                       <div class="form-group col-md-12 col-sm-12 co-xs-12">
                                           <button type="submit" class="theme-btn btn-style-one">Ajouter</button>
                                       </div>
                                   </div>
                               </form>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </section>

  </body>
</html>
