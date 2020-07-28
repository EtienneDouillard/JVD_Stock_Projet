<?php
	include("../config/config.php");//On inclue le fichier qui permet la connexion à la bdd
	$pagename = "inscription";
?>
<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <link href="../CSS/recherche.css" rel="stylesheet" type="text/css"/>
    <title>Recherche</title>

  </head>
  <body>
  <nav>
    <ul><!-- Nave barre -->
      <li><a id="currentLink1" href="v_recherche.php">Rechercher référence</a></li><!-- Current link pour mettre en blanc la page actuelle -->
      <li ><a href="v_stockage.php">Stocker référence</a></li>
      <li ><a href="v_nouvelle_ref.php">Ajouter une nouvelle référence </a></li>
    </ul>

  
  </nav>
  
    <h2>Chercher une référence dans le stock</h2>
  <form method="GET">
    <input type="text" name="reference" placeholder= "recherche..." />
    <input type="submit" name="rechercher"/>
  </form>  
  <br>
    <?php
    if(isset($_GET['reference']) AND !empty($_GET['reference'])){//On vérifie que la variable existe cad qu'il y ai une recherche d'effectuée
      $reference = htmlspecialchars($_GET['reference']);
      $req = $bdd->query('SELECT reference,emplacement,qte FROM lot WHERE reference LIKE "'.$reference.'%"');//Requête SQL
      
      if($req->rowCount() > 0){//On vérifie que la requête à un résultat
     ?>   
        <table>
          <tr>
            <th>Sélection</th>
            <th>Référence</th>
            <th>Emplacement</th>
            <th>Quantité</th>
          </tr>
    <?php      
        while ($donnees = $req->fetch())//On affiche chaque entrée une à une
        {
    ?>  
<form method="POST" action= >    
    <tr>
      <td><input type="radio" name= "selection" value="selection"></td>
      <td><?= $donnees['reference'] ?></td>
      <td><?= $donnees['emplacement'] ?></td>
      <td><?= $donnees['qte'] ?></td>
    </tr>
  <?php } ?>
  </table>
  <?php  
      }
      else{//Si aucun résultat
        echo "Aucun résultat";
      } 
    }
  ?>  

  <section class="Quantité_destockée"><!-- Formulaire pour la quantitée destockée -->
    <h4> Quantitée déstockée : <i class="fas fa-thermometer-quarter"></i> </h4>
    <div class="slidecontainer">
      <input id="number" type="number" name="quantite">                
    </div>
  </section>
    <br>
  <div id="button"><!-- Boutons soumettre et rénitialiser-->
    <input type="submit" name="Soumettre"/>
<<<<<<< Updated upstream
  </div>
  <br>
  <div id="button">
=======
>>>>>>> Stashed changes
    <input type="reset" value="Rénitialiser"/>
  </div>
  <br>
  <p class="photo"><img src="../CSS/JVD-logo.png" alt=""></p>
</form>
<?php
  if(isset($_POST['quantite']) AND !empty($_POST['quantite'])){
    $destockage = htmlspecialchars($_GET['quantite']);
    $destockage = $bdd->query('UPDATE qte FROM lot WHERE reference = ');//Requête SQL
  }
  ?>
  </body>

</html>