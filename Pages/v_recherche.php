<!doctype html>
<html>
    <head>
    <meta charset="UTF-8">
    <title>Recherche</title>
    </head>
  <body>
<?php
   //include("./config/config.php");
    try
    {
      $bdd = new PDO('mysql:host=localhost;dbname=jvd', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    }
    catch (Exception $e)
    {
            die('Erreur : ' . $e->getMessage());
  // Si tout va bien, on peut continuer
    }

  // On récupère tout le contenu de la table jvd
  $reponse = $bdd->query('SELECT ref FROM produit');

   On affiche chaque entrée une à une
  
   while ($donnees = $reponse->fetch())
  {
      echo $donnees['ref'] . '<br />';
    }
    $reponse->closeCursor(); // Termine le traitement de la requête




  ?>

<nav>
  <ul><!-- Nave barre -->
    <li><a id="currentLink1" href="v_recherche.php">Rechercher référence</a></li><!-- Current link pour mettre en blanc la page actuelle -->
    <li ><a href="v_stockage.php">Stocker référence</a></li>
  </ul>
</nav> 
  <h1>Chercher une référence dans le stock</h1>

<form name="formulaire" action="" target="_blank" method="POST">

    <input type="text" name="barre" id="barre" placeholder= "recherche..." />
 
    
    <section class="recherche">
       <input type="button" onclick="rechercher() " value="start" />
    </section>
 
    <hr>

  <div id="cache_clic">
    <div class="Quantité">
      <h4> Quantitée disponible: </h4> 
      <div class="Quantité_disponible"> <br> 
        <?php 
          echo file_get_contents(); ?>
      </div> 
    </div>
    
    <div class ="Emplacement">
      <h4> Emplacement : </h4> 
        <div class="lieu_ou_trouver"> <br> 
          <?php echo file_get_contents(); ?>
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