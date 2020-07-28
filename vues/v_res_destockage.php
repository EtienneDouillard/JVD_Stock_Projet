<?php
    if($bool){
        echo "Le produit a bien été destocké";
    }
    else{ 
?>
<h3> Veuillez saisir la quantité en fonction de la quantité restante</h3>
<form method="POST" action="">
    <section class="Quantité_destockée"><!-- Formulaire pour la quantitée destockée -->
        <h4> Quantitée : <i class="fas fa-thermometer-quarter"></i> </h4>
        <div class="slidecontainer">
        <input id="number" type="number" name="quantite">                
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