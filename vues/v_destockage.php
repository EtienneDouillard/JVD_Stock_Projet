



<?php
    if($res){
        echo "Déstockage effectué";
    }
    else
    {    
?>
<form method="POST" action="index.php?uc=destockage&action=destocke">
    <section class="Quantité_destockée"><!-- Formulaire pour la quantitée destockée -->
        <h4> Quantitée à destocker : <i class="fas fa-thermometer-quarter"></i> </h4>
        <div class="slidecontainer">
        <input id="number" type="number" name="quantite">    
        <input type="hidden" name="reference" value="<?php $refrence?>"/>
        <input type="hidden" name="numLot" value="<?php $numLot?>"/>            
        </div>
    </section>
    <br>
    <div id="button"><!-- Boutons soumettre et rénitialiser-->
        <input type="submit" name="Soumettre" value="Soumettre"/>
        <input type="reset" value="Rénitialiser"/>
    </div>
</form>
<?php
    }
?>    