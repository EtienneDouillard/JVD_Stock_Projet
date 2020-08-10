<html>
<?php  
    if(isset($stockage) AND $stockage == 1){
      echo '<p class="msg_success">Le produit numéro "' . $reference . '" a bien été initialisé !</p>'; 
    }
    else if(isset($stockage) AND $stockage == 0){
      echo '<p class="msg_success">Vous avez ajouté une quantité de ' . $quantite  .' à l\'emplacement ' . $emplacement . ' pour le produit numéro "' . $reference . '".</p>';
    }
    else if(isset($stockage) AND !$stockage){
      echo '<p class="msg_erreur">Veuillez remplir tous les champs</p>';
?>  
<div class="titre">
    <h3>Ajouter une référence dans le stock</h3>
</div>
<form method="POST" action="index.php?uc=stockage&action=stocke">
    <p>
    <label for="reference">Référence : </label><input type="text" name="reference" id="reference" required/>
    </p>
    <p>
    <label for="quantite">Quantité : </label><input type="number" name="quantite" id="quantite" min="0" required/>
    </p>
    <p>
    <label for="emplacement">Emplacement : </label><input type="text" name="emplacement" id="emplacement" required/>
    </p>
    <p>
    <input type="submit" name="submit" /> 
    </p>
</form>
<?php
  }
  else{
?>
<div class="titre">
    <h3>Ajouter une référence dans le stock</h3>
</div>
<form method="POST" action="index.php?uc=stockage&action=stocke">
    <p>
    <label for="reference">Référence : </label><input type="text" name="reference" id="reference" required/>
    </p>
    <p>
    <label for="quantite">Quantité : </label><input type="number" name="quantite" id="quantite" min="0" required/>
    </p>
    <p>
    <label for="emplacement">Emplacement : </label><input type="text" name="emplacement" id="emplacement" required/>
    </p>
    <p>
    <input type="submit" name="submit" /> 
    </p>
</form>
<?php
  }
?>
