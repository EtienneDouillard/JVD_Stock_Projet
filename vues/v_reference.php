<html>
<?php  
    if(isset($stockage) AND $stockage == 2){
      echo '<p class="msg_success">Le produit numéro "' . $reference . '" n\'existe pas, veuillez l\'enregistrer !</p>'; 
    }
?>    
<div class="titre">
    <h3>Créer une nouvelle référence</h3>
</div>
<form method="POST" action="index.php?uc=stockage&action=new_reference">
    <p>
    <label for="reference">Référence : </label><input type="text" name="reference" id="reference" value="<?php echo $reference; ?>"required/>
    </p>
    <p>
    <label for="libelle">Libellé : </label><input type="text" name="libelle" id="libelle" required/>
    </p>
    <p>
    <input type="submit" name="submit" /> 
    </p>
</form>    