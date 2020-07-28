
  <h2>Ajouter une référence existante dans le stock  </h2>

    <!-- <section class="référence_stockée">Formulaire pour la référence stockée
        <h4> Référence : <i class="fas fa-thermometer-quarter"></i> </h4>
        <div class="slidecontainer">
          <input type="text" name="ref">                    
          
         </div>
      </section>

   <section class="Quantité_stockée">Formulaire pour la quantitée stockée
      <h4> Quantitée : <i class="fas fa-thermometer-quarter"></i> </h4>
      <div class="slidecontainer">
        <input type="text" name="qte">                    
       </div>
    </section>
    
    <section class="emplacement de stockage">Formulaire pour la quantitée stockée
        <h4> Emplacement : <i class="fas fa-thermometer-quarter"></i> </h4>
        <div class="slidecontainer">
          <input type="text" name="nom_emplacement">                    
         </div>
      </section>
      <br>
     
      

      <div id="button">Boutons soumettre et rénitialiser
      <section class="submit_button">
        <input type="submit" value="Soumettre">
      </section>
      <br>
      <section class="reset_button">
        <input type="reset" value="Rénitialiser">
      </section>
    </div> -->

<form action="index.php?uc=stockage&action=stocke" method="POST">
    Ref :     <input type="text" name="reference" />
    </br>
    Qte :     <input type="text" name="quantite" />
    </br>
    Emplacement : <input type="text" name="emplacement" />
    </br>
    <input type="submit" name="submit" /> 
</form>
