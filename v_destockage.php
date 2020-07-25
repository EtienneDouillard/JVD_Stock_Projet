<?php
    include("./config/config.php");
?>
<!doctype html>
<html>
    <head>
    <meta charset="UTF-8">
    <title>stockage</title>
    </head>
  <body>
  </body>
<nav>
  <ul><!-- Nave barre -->
    <li><a  href="v_recherche.php">Rechercher référence</a></li><!-- Current link pour mettre en blanc la page actuelle -->
    <li ><a id="currentLink2"  href="v_stockage.php">Stocker référence</a></li>
  </ul>
</nav> 
  <h1>Stocker une référence</h1>
  <form name="formulaire_recherche" action="" target="_blank" method="GET">

    <section class="référence_stockée"><!-- Formulaire pour la référence stockée -->
        <h4> Référence : <i class="fas fa-thermometer-quarter"></i> </h4>
        <div class="slidecontainer">
          <input type="text" placeholder="référence" id="référence déposée" name="référence">                    
         </div>
      </section>


   <section class="Quantité_stockée"><!-- Formulaire pour la quantitée stockée -->
      <h4> Quantitée : <i class="fas fa-thermometer-quarter"></i> </h4>
      <div class="slidecontainer">
        <input type="text" placeholder="quantité" id="Quantite_déposée" name="quantite">                    
       </div>
    </section>
    
    <section class="emplacement de stockage"><!-- Formulaire pour la quantitée stockée -->
        <h4> Emplacement : <i class="fas fa-thermometer-quarter"></i> </h4>
        <div class="slidecontainer">
          <input type="text" placeholder="emplacement" id="lieu" name="nom_emplacement">                    
         </div>
      </section>
      <br>
      <div id="button"><!-- Boutons soumettre et rénitialiser-->
      <section class="submit_button">
        <input type="submit" value="Soumettre">
      </section>
      <br>
      <section class="reset_button">
        <input type="reset" value="Rénitialiser">
      </section>
    </div>

  
  </form>
</html>
