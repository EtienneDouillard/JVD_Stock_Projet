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
    <li ><a href="v_nouvelle_ref.php">Ajouter une nouvelle référence </a></li>
  </ul>
</nav> 
  <h1>Ajouter une référence existante dans le stock</h1>
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
        <input type="text" placeholder="Quantité" id="Quantite_déposée" name="qte">                    
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
      $reference = $_POST['ref'];
      $emplacement = $_POST['nom_emplacement'];
      $qte = $_POST['qte'];

      if(isset($_GET['ref']) AND !empty($_GET['ref'])){
      //On vérifie que la variable existe cad qu'il y ai une recherche d'effectuée
          $reference = htmlspecialchars($_GET['ref']);
          //$req = $bdd->query('INSERT INTO  reference,emplacement,qte FROM lot WHERE reference LIKE "'.$reference.'%"');//Requête SQL
          $req = $bdd->query('SELECT reference FROM produit "'.$reference.'%"');//Requête SQL
          if ($req==$reference){
              $sql = "INSERT INTO `lot`(`reference`, `emplacement`,`qte`) VALUES (:ref,:nom_emplacement,:qte)";    // requet insertion SQL dans lot  
          }else{
              $sql = "INSERT INTO `produit`(`reference`, `qteTotale`) VALUES (:ref,:qte)";    // requet insertion SQL  dasn produit 
              $sql = "INSERT INTO `lot`(`reference`, `emplacement`,`qte`) VALUES (:ref,:nom_emplacement,:qte)";    // requet insertion SQL das, mot
          }
          $res = $pdo->prepare($sql);
          $exec = $res->execute(array(":ref"=>$reference,":nom_emplacement"=>$emplacement,":qte"=>$qte));
          // vérifier si la requête d'insertion a réussi
          if($exec){
            echo 'Données insérées';
          }else{
            echo "Échec de l'opération d'insertion";
          }
      }
    ?>
 


      </body>
</html>
