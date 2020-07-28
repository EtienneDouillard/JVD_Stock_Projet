<?php
	include("../config/config.php");//On inclue le fichier qui permet la connexion à la bdd
	$pagename = "inscription";
?>
<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Ajout d'une nouvelle référence</title>
  </head>
  <body>
  <nav>
    <ul><!-- Nave barre -->
      <li><a id="currentLink1" href="v_recherche.php">Rechercher référence</a></li><!-- Current link pour mettre en blanc la page actuelle -->
      <li ><a href="v_stockage.php">Stocker référence</a></li>
      <li ><a id="currentLink3" href="v_nouvelle_ref.php">Ajouter une nouvelle référence </a></li>
    </ul>
 
  </nav>
  <h1>Ajouter une nouvelle référence dans le stock</h1>

  <form name="formulaire_recherche" action=""  method="GET">

    <section class="référence_stockée"><!-- Formulaire pour la référence stockée -->
        <h4> Nouvelle référence : <i class="fas fa-thermometer-quarter"></i> </h4>
        <div class="slidecontainer">
          <input type="text" placeholder="Référence produit" id="référence déposée" name="ref">                     
        </div>
      </section>

    <section class="référence_stockée"><!-- Formulaire pour le nouveau libellé à stocker -->
      <h4> Libellé du produit : <i class="fas fa-thermometer-quarter"></i> </h4>
      <div class="slidecontainer">
          <input type="text" placeholder="Libellé" id="nom" name="libelle">                      
      </div>
    </section>

   <section class="Quantité_stockée"><!-- Formulaire pour la quantitée stockée -->
      <h4> Quantitée initale : <i class="fas fa-thermometer-quarter"></i> </h4>
      <div class="slidecontainer">
        <input type="text" placeholder="Quantité" id="Quantite_déposée" name="qte">                    
       </div>
    </section>
    <!-- Formulaire pour l'emplacment ou est stocké la nouvelle palette -->
    <section class="emplacement de stockage">
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
/*
  if(isset($_POST['quantite']) AND !empty($_POST['quantite'])){
    $destockage = htmlspecialchars($_GET['quantite']);
    $destockage = $bdd->query('UPDATE qte FROM lot WHERE reference = );//Requête SQL
  }*/
  ?>
  </body>

</html>