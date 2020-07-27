<?php
	include("../config/config.php");
	$pagename = "inscription";
?>
<!doctype html>
<html>
    <head>
    <meta charset="UTF-8">
    <title>stockage</title>
    </head>
  <body>
  
<nav>
  <ul><!-- Nave barre -->
    <li><a  href="v_recherche.php">Rechercher référence</a></li><!-- Current link pour mettre en blanc la page actuelle -->
    <li ><a id="currentLink2"  href="v_stockage.php">Stocker référence</a></li>
  </ul>
</nav> 
  <h1>Stocker une référence</h1>
  <form name="formulaire_recherche" action=""  method="GET">

    <section class="référence_stockée"><!-- Formulaire pour la référence stockée -->
        <h4> Référence : <i class="fas fa-thermometer-quarter"></i> </h4>
        <div class="slidecontainer">
          <input type="text" placeholder="Référence produit" id="référence déposée" name="ref">                    
          
         </div>
      </section>

   <section class="Quantité_stockée"><!-- Formulaire pour la quantitée stockée -->
      <h4> Quantitée : <i class="fas fa-thermometer-quarter"></i> </h4>
      <div class="slidecontainer">
        <input type="text" placeholder="Quantité" id="Quantite_déposée" name="qteTotale">                    
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
  

    <?php
    //Envoie du formulaire dans base de donnée 
    
		if (isset($_GET['ref'])) {
			$mysqli = new mysqli('localhost', 'root', '');
			$mysqli->set_charset('utf8');
			$requete='INSERT INTO produit VALUES("'.$_GET['ref'].'","'.$_GET['qteTotale'].'")';
			$resultat = $mysqli->query($requete);
			if ($resultat)
				echo 'Le contact a été ajouté';
			else
				echo 'Erreur';
		  }
		?>
      </body>
</html>
