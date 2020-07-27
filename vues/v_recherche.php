<?php
	include("../config/config.php");
	$pagename = "inscription";
?>
<!doctype html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Recherche</title>
  </head>
  <body>
  <nav>
    <ul><!-- Nave barre -->
      <li><a id="currentLink1" href="v_recherche.php">Rechercher référence</a></li><!-- Current link pour mettre en blanc la page actuelle -->
      <li ><a href="v_stockage.php">Stocker référence</a></li>
    </ul>
  <h1>Chercher une référence dans le stock</h1>
  </nav>
  <form method="GET">
    <input type="text" name="reference" placeholder= "recherche..." />
    <input type="submit" name="rechercher"/>
  </form>  
  <br>
<?php
  if(isset($_GET['reference']) AND !empty($_GET['reference'])){//On vérifie que la variable existe cad qu'il y est une recherche d'effectuée
    $reference = htmlspecialchars($_GET['reference']);
    $req = $bdd->query('SELECT reference,emplacement,qte FROM lot WHERE reference LIKE "'.$reference.'%"');//Requête SQL
    
    if($req->rowCount() > 0){//On vérifie que la requête à un résultat
      while ($donnees = $req->fetch())//On affiche chaque entrée une à une
      {
?>  
<table>
    <tr>
      <th>Référence</th>
      <th>Emplacement</th>
      <th>Quantité</th>
    </tr>
    <tr>
      <td><?= $donnees['reference'] ?></td>
      <td><?= $donnees['emplacement'] ?></td>
      <td><?= $donnees['qte'] ?></td>
    </tr>
</table>
<?php  
      }
    }
    else{//Si aucun résultat
      echo "Aucun résultat";
    } 
  }
?>  
<!--
    <hr>

  <div id="cache_clic">
    <div class="Quantité">
      <h4> Quantitée disponible: </h4> 
      <div class="Quantité_disponible"> <br> 
        <?php /*
          echo file_get_contents(); ?>
      </div> 
    </div>
    
    <div class ="Emplacement">
      <h4> Emplacement : </h4> 
        <div class="lieu_ou_trouver"> <br> 
          <?php echo file_get_contents(); */?>
        </div> 
    </div>
    
  </div>
-->
<form method="POST" action= >
  <section class="destocké_oui_non"><!-- formulaire pour savoir si on le destocke ou pas -->
    <h4>Destocké <i class="fas fa-home"></i> </h4>
      <P id="destockage">
            <input type="radio" name= "OUI" value="OUI">OUI
            <input type="radio" name= "NON" value="NON">NON
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
    <input type="submit" name="Soumettre"/>
    <br>
    <input type="reset" value="Rénitialiser"/>
  </div>
</form>
  <?php 
    /* ******************
    Sinspirer de ça 
    ********************
    // On récupère les valeurs du formulaire
    $societe = $_POST ['societe'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];

    if(!empty($societe)) {
    echo 'Société est vide';
    } else{
    echo 'Société n\'est pas vide';}



    // a MODIFIER POUR NOUS 

    print("$societe, $nom, $prenom, $email, $telephone");


    $link=mysql_connect ($host,$user,$pass);
    if (!$link) {
    die ('Erreur de connection au serveur '.mysql_error() ) ;
    }

    $db=mysql_select_db('Stammtisch');
    if (!$db)
    {
    die ('Impossible de sélectionner la base de données : ' . mysql_error());
    }

    //Tables
    $table=mysql_query("insert into inscriptions (societe, nom, prenom, email, telephone) values ( '$societe' , '$nom' , '$prenom' , '$email' , '$telephone');");
    if (!$table)
    {
    die ('ERREUR'.mysql_error() ) ;
    }
    */
  ?>

  </div>
  </body>

</html>