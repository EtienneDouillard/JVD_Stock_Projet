
<html>
<?php  
  if(isset($stockage) AND $stockage){
    echo "Le produit a bien été enregistré !"; 
  }
  else if(isset($stockage) AND !$stockage){
    echo "Veuillez remplir tous les champs";
?>  
  <h3>Ajouter une référence dans le stock</h3>

  <form action="index.php?uc=stockage&action=stocke" method="POST">
    <br>
    Reférence :<input type="text" name="reference"/>
    </br>
    <br>
    Qantité :<input type="number" name="quantite"/>
    </br>
    <br>
    Emplacement :<input type="text" name="emplacement"/>
    </br>
    <br>
    <input type="submit" name="submit" /> 
    </br>
  </form>
</html>
<?php
  }
  else{
?>
  <h3>Ajouter une référence dans le stock</h3>

  <form action="index.php?uc=stockage&action=stocke" method="POST">
    <br>
    Reférence :<input type="text" name="reference"/>
    </br>
    <br>
    Qantité :<input type="number" name="quantite"/>
    </br>
    <br>
    Emplacement :<input type="text" name="emplacement"/>
    </br>
    <br>
    <input type="submit" name="submit" /> 
    </br>
  </form>
  </html>
<?php
  }
?>
