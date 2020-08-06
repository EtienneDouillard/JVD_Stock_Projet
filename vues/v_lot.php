
<div class="titre">
    <h3>Chercher une référence dans le stock</h3>  
</div>
<form method="POST" action="index.php?uc=lot&action=afficherlots">
    <input type="text" name="reference" placeholder= "recherche..." />
    <input type="submit" name="rechercher" value="rechercher"/>
</form>
<?php
if(isset($lesLots) AND !empty($lesLots))
{
?>
<form method="POST" action="index.php?uc=destockage&action=destocke">
    <table>
        <tr>
            <th >Sélection</th>
            <th >Référence</th>
            <th >Emplacement</th>
            <th >Quantité</th>
        </tr>
    <?php      
        foreach ($lesLots as $unLot)//On affiche chaque entrée une à une
        {
            $idLot = $unLot['id_lot'];
            $reference = $unLot['reference'];
            $numLot = $unLot['numero'];
            $emplacement = $unLot['emplacement'];
            $qte = $unLot['qte'];
    ?>     
        <tr>
            <td><input type="radio" name= "id_lot" value="<?= $idLot?>" required/></td>
            <td><?php echo $reference ?></td>
            <td><?php echo $emplacement ?></td>
            <td><?php echo $qte ?></td>
        </tr>
    <?php   
        }  
    ?>
    </table>
    <div class="destock">
    <label  for="quantite">Quantité à déstocker</label> : <input type="number" name="quantite" id="quantite" min="1" required/>
    </div>            
    <p class="btn">
        <input type="submit" name="soumettre" value="Soumettre"/>
        <input type="reset" value="Rénitialiser"/>
    </p>
    
</form>
<?php        
}  
else{
    echo '<p class="msg_erreur">Aucun résultat</p>';
}
?> 



