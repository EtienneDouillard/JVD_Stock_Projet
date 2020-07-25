<?php
    include("./config/config.php");
?>
<!doctype html>
<html>
    <head>
    <meta charset="UTF-8">
    <title>Recherche</title>
    </head>
  <body>
  </body>
<nav>
  <ul><!-- Nave barre -->
    <li><a id="currentLink1"  href="../HTML/Recherche.html">Rechercher référence</a></li><!-- Current link pour mettre en blanc la page actuelle -->
    <li ><a  href="../HTML/Stockage.html">Stocker</a></li>
  </ul>
</nav> 
  <h1>Chercher une référence dans le stock</h1>

<form name="formulaire" action="" target="_blank" method="GET">

    <input type="text" name="barre" id="barre" placeholder= "recherche..." />
 
    
    <section class="recherche">
       <input type="button" onclick="rechercher() " value="start" />
    </section>
 
    <hr>
  <div id="cache_clic">
    <div id="Quantité">
      <div class ="Quantité">
              <h4> Quantitée disponible: </h4> 
              <div class="Quantité_disponible"> <br> <!--  <?php echo file_get_contents(); ?>--> </div> 
      </div>
    </div>
    <div id="Emplacement">
       <div class ="Emplacement">
              <h4> Emplacement : </h4> 
              <div class="lieu_ou_trouver"> <br> <!--  <?php echo file_get_contents(); ?>--> </div> 
        </div>
    </div>
  </div>

  <hr>
    <section class="destocké_oui_non"><!-- formulaire pour savoir si on le destocke ou pas -->
      <h4>Destocké <i class="fas fa-home"></i> </h4>
        <P id="destockage">
              <input type="radio" name = "OUI" value="OUI">OUI
              <input type="radio" name = "NON" value="NON">NON
        </P>
    </section>

    <section class="Quantité_destockée"><!-- Formulaire pour la quantitée destockée -->
      <h4> Quantitée : <i class="fas fa-thermometer-quarter"></i> </h4>
      <div class="slidecontainer">
        <input type="text" placeholder="quantité" id="Quantite_prise" name="quantite">                    
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


  </div>


</html>