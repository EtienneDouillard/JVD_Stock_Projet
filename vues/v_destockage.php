<?php
    if($destockage == -1){
        echo '<p class="msg_success">Le produit a bien été destocké</p>';
    }
    else{ 
        echo '<p class="msg_erreur">Pas assez de stock ! Veuillez saisir une quantité valide</p>';
?>
<form method="POST" action="index.php?uc=destockage&action=destocke">
    <div class="destock">
        <input name="id_lot" type="hidden" value="<?= $destockage ?>">
        <label for="quantite">Quantité à déstocker : </label><input type="number" name="quantite" id="quantite" min="1" required>            
    </div>
    <p class="btn">
        <input type="submit" name="soumettre" value="Soumettre"/>
        <input type="reset" value="Rénitialiser"/>
    </p>
</form>
<?php 
    }
?>