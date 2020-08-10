<?php
    if($destockage AND $quantite > 1){//message de succès pour une quantité superieur à 1
        echo '<p class="msg_success">' . $quantite . ' unités on été retirées du produit numéro "' . $reference . '" à l\'emplacement ' .$emplacement. '.</p>';
    }
    else if($destockage AND $quantite == 1){//message de succès pour une quantité égale à 1
        echo '<p class="msg_success">' . $quantite . ' unité a été retirée du produit numéro "' . $reference . '" à l\'emplacement ' .$emplacement. '.</p>';
    }
    else{
        echo '<p class="msg_erreur">Pas assez de stock ! Veuillez saisir une quantité valide</p>';
?>
<div class="titre">
    <h3>Déstockage du produit numéro "<?= $reference ?>" à l'emplacement <?= $emplacement ?></h3>  
</div>
<form method="POST" action="index.php?uc=destockage&action=destocke">
    <div class="destock">
        <input name="id_lot" type="hidden" value="<?= $idLot ?>">
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