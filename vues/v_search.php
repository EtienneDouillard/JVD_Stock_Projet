<!doctype html>
<html>
  <head>
    <link href="./CSS/lot.css" rel="stylesheet" type="text/css"/>
    <meta charset="UTF-8">
    <title>Recherche</title>
    
  </head>
  <body>
    <h3>Chercher une référence dans le stock</h3>
    <br>
    <form method="POST" action="index.php?uc=lot&action=afficherLots">
        <input type="text" name="reference" placeholder= "recherche..." />
        <input type="submit" name="rechercher" value="rechercher"/>
    </form>
    </br>    
</body>
</html>
